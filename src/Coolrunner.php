<?php

namespace Coolrunner;

use Coolrunner\Model\Shipment;

class Coolrunner
{
    public $shipments;

    public function __construct($name, $url, $email, $token)
    {
        $this->shipments = new Shipment($name, $url, $email, $token);
    }
}