sms-gateway
======

> sms-gateway - [php](http://php.net) library

## Install
Via Composer

```sh
composer require g4/sms-gateway
```

## Usage

### Send Message

```php
require_once  'vendor/autoload.php';

// Twilio
$account_sid = '[AccountSid]';
$auth_token  = '[AuthToken]';
$driver      = new \G4\SmsGateway\Adapter\Twilio($account_sid, $auth_token);
$smsGateway  = new \G4\SmsGateway\SmsGateway($driver);

// \G4\SmsGateway\Message
$message = $smsGateway
    ->from('+00000000000')
    ->to('+00000000000')
    ->send('Hello world!');

```

### View Message

```php
require_once  __DIR__ . '/../../vendor/autoload.php';

// Twilio
$account_sid = 'xxx';
$auth_token = 'xxx';

$driver = new \G4\SmsGateway\Adapter\Twilio($account_sid, $auth_token);
$smsGateway = new \G4\SmsGateway\SmsGateway($driver);

// \G4\SmsGateway\Message
$message = $smsGateway->view('SMxxxxxxxxxxxxx');

```

## Development

### Install dependencies

    $ make install

### Run tests

    $ make test

## License

(The MIT License)
see LICENSE file for details...
