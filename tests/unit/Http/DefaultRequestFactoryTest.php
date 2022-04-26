<?php

namespace Studio15\SailPlay\SDK\Test\Unit\Http;

use Studio15\SailPlay\SDK\Http\DefaultServerRequestFactory;
use PHPUnit\Framework\TestCase;

class DefaultRequestFactoryTest extends TestCase
{

    public function testCreateRequest(): void
    {
        $defaultRequestFactory = new DefaultServerRequestFactory('https://test.ru/api/v2/');

        $request = $defaultRequestFactory->createServerRequest('GET', 'test');
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('https://test.ru/api/v2/test/', (string) $request->getUri());
        $this->assertCount(0, $request->getHeader('Content-Type'));

        $request = $defaultRequestFactory->createServerRequest('POST', 'test');
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('https://test.ru/api/v2/test/', (string) $request->getUri());
        $this->assertCount(1, $request->getHeader('Content-Type'));
        $this->assertEquals('x-www-form-urlencoded', $request->getHeader('Content-Type')[0]);
    }
}
