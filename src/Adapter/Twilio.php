<?php

namespace G4\SmsGateway\Adapter;


class Twilio implements AdapterInterface
{

    /**
     * @var \Services_Twilio
     */
    private $client;

    /**
     * @var \G4\SmsGateway\Factory\Twilio
     */
    private $factory;


    /**
     * @param string $sid
     * @param string $token
     */
    public function __construct($sid, $token)
    {
        $this->client  = new \Services_Twilio($sid, $token);
        $this->factory = new \G4\SmsGateway\Factory\Twilio();
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $body
     * @return \G4\SmsGateway\Message
     */
    public function send($from, $to, $body)
    {
        return $this->factory->create($this->client->account->messages->sendMessage($from, $to, $body));
    }

    /**
     * @param string $id
     * @return \G4\SmsGateway\Message
     */
    public function view($id)
    {
        return $this->factory->create($this->client->account->messages->get($id));
    }

}