<?php

namespace G4\SmsGateway;

use G4\SmsGateway\Consts\Status;

class Message
{

    /**
     * @var int
     */
    private $createdOn;

    /**
     * @var int
     */
    private $errorCode;

    /**
     * @var string
     */
    private $errorMessage;

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $sentOn;

    /**
     * @var string
     */
    private $status;


    /**
     * @return int
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSentOn()
    {
        return $this->sentOn;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return boolean
     */
    public function hasErrors()
    {
        return $this->getErrorCode() !== null
            && $this->getErrorMessage() !== null;
    }

    /**
     * @return boolean
     */
    public function isDelivered()
    {
        return $this->getStatus() === Status::DELIVERED;
    }

    /**
     * @return boolean
     */
    public function isFailed()
    {
        return $this->getStatus() === Status::FAILED;
    }

    /**
     * @return boolean
     */
    public function isQueued()
    {
        return $this->getStatus() === Status::QUEUED;
    }

    /**
     * @return boolean
     */
    public function isSending()
    {
        return $this->getStatus() === Status::SENDING;
    }

    /**
     * @return boolean
     */
    public function isSent()
    {
        return $this->getStatus() === Status::SENT;
    }

    /**
     * @return boolean
     */
    public function isUndelivered()
    {
        return $this->getStatus() === Status::UNDELIVERED;
    }

    /**
     * @param int $value
     * @return \G4\SmsGateway\Message
     */
    public function setCreatedOn($value)
    {
        $this->createdOn = $value;
        return $this;
    }

    /**
     * @param int $value
     * @return \G4\SmsGateway\Message
     */
    public function setErrorCode($value)
    {
        $this->errorCode = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return \G4\SmsGateway\Message
     */
    public function setErrorMessage($value)
    {
        $this->errorMessage = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return \G4\SmsGateway\Message
     */
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @param int $value
     * @return \G4\SmsGateway\Message
     */
    public function setSentOn($value)
    {
        $this->sentOn = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return \G4\SmsGateway\Message
     */
    public function setStatus($value)
    {
        $this->status = $value;
        return $this;
    }
}
