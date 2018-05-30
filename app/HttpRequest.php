<?php

namespace App;


class HttpRequest
{

    private $headers = [];

    private $body;



    public function addHeader(string $headerType, string $headerContent)
    {
        $this->headers[] = [$headerType => $headerContent];
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }
}
