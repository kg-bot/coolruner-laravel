<?php

namespace Coolrunner\Model;

use Coolrunner\Util\Request;

class Model
{
    protected $request;
    protected $name;
    protected $url;
    protected $email;
    protected $token;

    public function __construct($name, $url, $email, $token)
    {
        $this->request = new Request($url);
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
        $this->token = $token;
    }

    public function create($data, $url = null)
    {
        $this->request->post($this->getUrl($url), $data, $this->getAuthorizationToken($this->email, $this->token));
    }

    public function find($id, $url = null)
    {
        $this->request->get($this->getUrl($url) . $id, $this->getAuthorizationToken($this->email, $this->token));
    }

    public function update($id, $data, $url = null)
    {
        $this->request->put($this->getUrl($url) . $id, $data, $this->getAuthorizationToken($this->email, $this->token));
    }

    public function delete($id, $url = null)
    {
        $this->request->delete($this->getUrl($url) . $id);
    }

    protected function createAuthorizationToken($email, $token)
    {
        $valueToEncode = $email . ':' . $token;
        return base64_encode($valueToEncode);
    }

    protected function getAuthorizationToken($email, $token)
    {
        return [
            'headers' => [
                'Authorization'  => 'Basic ' . $this->createAuthorizationToken($email, $token),
                'X-Developer-Id' => 'Rackbeat'
            ]
        ];
    }

    protected function getUrl($url)
    {
        if (is_null($url)) {
            return $this->url;
        } else {
            return $url;
        }
    }
}