<?php

namespace G4\SmsGateway\Factory;

class Twilio
{

    /**
     * @var \G4\SmsGateway\Message
     */
    private $message;


    public function __construct()
    {
        $this->message = new \G4\SmsGateway\Message();
    }

    /**
     * @param \Services_Twilio_Rest_Message $rawMessage
     * @return \G4\SmsGateway\Message
     */
    public function create(\Services_Twilio_Rest_Message $rawMessage)
    {
        return $this->message
            ->setCreatedOn($this->getTimestamp($rawMessage->date_created))
            ->setErrorCode($rawMessage->error_code)
            ->setErrorMessage($rawMessage->error_message)
            ->setId($rawMessage->sid)
            ->setSentOn($this->getTimestamp($rawMessage->date_sent))
            ->setStatus($rawMessage->status);
    }

    /**
     * @param string $date
     * @return int
     */
    private function getTimestamp($date)
    {
        $date = new \DateTime($date);
        return $date->getTimestamp();
    }
}