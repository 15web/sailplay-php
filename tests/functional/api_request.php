<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = new Studio15\SailPlay\SDK\Http\PsrClientAdapter(
    /**
     * todo: разобраться с сертификатом
     * @see https://docs.guzzlephp.org/en/stable/request-options.html#verify-option
     * @see https://github.com/guzzle/guzzle/issues/1935
     * @see https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-problem-unable-to-get-local-issuer-certificate
     */
    new GuzzleHttp\Client(['verify' => false]),
    new Studio15\SailPlay\SDK\Http\DefaultServerRequestFactory()
);

/** @noinspection ForgottenDebugOutputInspection */
var_dump(
    (new Studio15\SailPlay\SDK\Api\Login($client))()->getBody()->getContents()
);
