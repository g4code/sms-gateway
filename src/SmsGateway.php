<?php

namespace G4\SmsGateway;


class SmsGateway
{

    /**
     * @var \G4\SmsGateway\Adapter\AdapterInterface
     */
    private $adapter;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $receiver;

    /**
     * @var string
     */
    private $sender;

    /**
     * @param \G4\SmsGateway\Adapter\AdapterInterface $adapter
     */
    public function __construct(\G4\SmsGateway\Adapter\AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param string $sender
     * @return \G4\SmsGateway\SmsGateway
     */
    public function from($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @param string $receiver
     * @return \G4\SmsGateway\SmsGateway
     */
    public function to($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @param string $body
     * @throws \Exception
     * @return \G4\SmsGateway\Message
     */
    public function send($body)
    {
        $this->body = trim($body);
        $this->validateDataForSend();
        try {
            $message = $this->adapter->send($this->sender, $this->receiver, $this->body);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
        return $message;
    }

    /**
     * @param string $id
     * @throws \Exception
     * @return \G4\SmsGateway\Message
     */
    public function view($id)
    {
        $this->id = trim($id);
        $this->validateDataForView();
        try {
            $message = $this->adapter->view($this->id);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
        return $message;
    }

    /**
     * @throws \Exception
     */
    private function validateDataForSend()
    {
        if (empty($this->sender)) {
            throw new \Exception('No sender number', 601);
        }
        if (empty($this->receiver)) {
            throw new \Exception('No receiver number', 602);
        }
        if (empty($this->body)) {
            throw new \Exception('No message body', 603);
        }
    }

    /**
     * @throws \Exception
     */
    private function validateDataForView()
    {
        if (empty($this->id)) {
            throw new \Exception('No message id', 604);
        }
    }
}