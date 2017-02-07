<?php
namespace Common;

use SoapClient;
use SoapFault;

abstract class BaseClient
{
    const WSDL_URL = '';

    abstract public function run();

    protected function process($request)
    {
        if (static::WSDL_URL === '') {
            throw new \Exception('Переопределите константу WSDL_URL');
        }

        try {

            $client = new SoapClient(static::WSDL_URL, [
                "trace" => 1,
                "exceptions" => 1
            ]);
            $client->process($request);

        } catch (SoapFault $fault) {
            echo $fault->getMessage();
        }

        header("Content-Type: text/xml\r\n");
        echo $client->__getLastResponse();
    }
}