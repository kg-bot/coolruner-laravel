<?php

namespace Coolrunner\Model;

class Shipment extends Model
{
    public function __construct($name, $url, $email, $token)
    {
        parent::__construct($name, $url, $email, $token);
    }

    public function create($data, $url = null)
    {
        $response = $this->request->post($this->url . 'shipment/create', $data, $this->getAuthorizationToken($this->email, $this->token));
        return $response;
    }

    public function createBulk($data, $url = null)
    {
        $response = $this->request->post( $this->url . 'shipment/pricebulk', $data, $this->getAuthorizationToken($this->email, $this->token));
        return $response;
    }

    public function shipmentPrice($data, $url = null)
    {
        $response = $this->request->post($this->url . 'shipment/price', $data, $this->getAuthorizationToken($this->email, $this->token));
        return $response;
    }
}