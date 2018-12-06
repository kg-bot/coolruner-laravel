<?php

namespace Coolrunner\Util;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Request
{
    protected $client;
    protected $url;

    public function __construct($url)
    {
        $this->client = new Client();
        $this->url = $url;
    }
    
    public function get($url, $headers = null)
    {
        return $this->client->get($this->url . $url, $headers);
    }

    public function post($url, $data, $headers = null)
    {
        $readyHeaders = $this->getProperHeaders($headers);
        return $this->client->post( $url, array_merge([RequestOptions::JSON => $data], $readyHeaders));
    }

    public function put($url, $data, $headers = null)
    {
        $readyHeaders = $this->getProperHeaders($headers);
        return $this->client->put( $url, array_merge([RequestOptions::JSON => $data], $readyHeaders));
    }

    public function delete($url, $headers = null)
    {
        $this->client->delete( $url, $headers);
    }

    private function getProperHeaders($headers)
    {
        if (is_null($headers)) {
            return [];
        } else {
            return $headers;
        }
    }
}