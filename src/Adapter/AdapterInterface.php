<?php

namespace G4\SmsGateway\Adapter;


interface AdapterInterface
{
    public function send($from, $to, $body);

    public function view($id);
}