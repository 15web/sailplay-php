<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Test\Unit\Http;

use GuzzleHttp\Exception\InvalidArgumentException;
use GuzzleHttp\Middleware;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use Studio15\SailPlay\SDK\Http\PsrClientAdapter;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Studio15\SailPlay\SDK\Http\DefaultServerRequestFactory;

class PsrClientAdapterTest extends TestCase
{
    public function testMethodsReturnsValidResponse(): void
    {
        $guzzleHttpClientMock = $this->createGuzzleHttpClientMock(['responses' => [
            new Response(200, [], 'expectedBody'),
            static function(RequestInterface $request) {
                return new Response(200, [], $request->getBody());
            },
        ]]);

        $psrClientAdapter = new PsrClientAdapter(
            $guzzleHttpClientMock,
            new DefaultServerRequestFactory()
        );

        $response = $psrClientAdapter->get('test');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('expectedBody', $response->getBody());

        $response = $psrClientAdapter->post('test', 'expectedPassedBody');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('expectedPassedBody', (string) $response->getBody());
    }

    public function testMethodsSendValidRequest(): void
    {
        $container = [];
        $history = Middleware::history($container);

        $guzzleHttpClientMock = $this->createGuzzleHttpClientMock([
            'middleware' => $history,
            'responses' => [new Response(), new Response()]
        ]);

        $psrClientAdapter = new PsrClientAdapter(
            $guzzleHttpClientMock,
            new DefaultServerRequestFactory()
        );

        $psrClientAdapter->get('test');
        /**
         * @var $sentGetRequest RequestInterface
         */
        $sentGetRequest = $container[0]['request'];
        $this->assertEquals('GET', $sentGetRequest->getMethod());
        $this->assertEquals('https://sailplay.ru/api/v2/test/', (string) $sentGetRequest->getUri());
        $this->assertCount(0, $sentGetRequest->getHeader('Content-Type'));

        $psrClientAdapter->post('test');
        /**
         * @var $sentPostRequest RequestInterface
         */
        $sentPostRequest = $container[1]['request'];
        $this->assertEquals('POST', $sentPostRequest->getMethod());
        $this->assertEquals('https://sailplay.ru/api/v2/test/', (string) $sentPostRequest->getUri());

        $this->assertCount(1, $sentPostRequest->getHeader('Content-Type'));
        $this->assertEquals('x-www-form-urlencoded', $sentPostRequest->getHeader('Content-Type')[0]);
    }

    public function testExceptionHandling(): void
    {
        $guzzleHttpClientMock = $this->createGuzzleHttpClientMock([
            'responses' => [new InvalidArgumentException('Error Communicating with Server')]
        ]);

        $loggerMock = $this->createMock(LoggerInterface::class);
        $loggerMock->expects($this->once())
            ->method('critical');

        $psrClientAdapter = new PsrClientAdapter(
            $guzzleHttpClientMock,
            new DefaultServerRequestFactory(),
            $loggerMock
        );

        $this->expectException(ClientExceptionInterface::class);

        $psrClientAdapter->get('test');
    }

    private function createGuzzleHttpClientMock(array $config): Client
    {
        $responses = $config['responses'] ?? [new Response()];
        $middleware = $config['middleware'] ?? null;

        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);

        if ($middleware !== null) {
            $handlerStack->push($middleware);
        }

        return new Client(['handler' => $handlerStack]);
    }
}
