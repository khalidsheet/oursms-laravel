# Oursms laravel client

[https://oursms.app](https://oursms.app) client library that allows you to send SMS

## Installation

Install oursms client with composer

```bash 
  composer require khalidsheet/oursms
```

**Skip this if you are running laravel version 5.5 or later**
The package will be auto-discovered

Otherwise run this command

**Step 1** - Publish the package config file under `config/oursms.php`
```bash
  php artisan vendor:publish --provider="Khalidsheet\Oursms\OursmsServiceProvider" --tag="config"
``` 

**Step 2** - Go to the application `.env` and paste these variables in the end of the file.
```bash
OURSMS_USER_ID=""
OURSMS_KEY=""
```
## Usage/Examples

Import the package
```php
use Khalidsheet\Oursms\Oursms
```
In your controller instantiate a new instance from ```Oursms Client```
```php
$oursmsClient = new Oursms();
```

If you wish to send a single message
```php
$oursmsClient->sendMessage(string $to, string $message);
```

If you wish to send Otp message
```php
$oursmsClient->sendOtp(string $to, string $otp);
```

If you wish to check the status of your message
```php
$oursmsClient->getSmsStatus(string $messageId);
```
**Notice:** ``to`` is the phone number, ``message`` is the actuall mesasge that will be send to the user.

## Authors
-  [@khalidsheet](https://www.github.com/khalidsheet)

## License
[MIT](https://choosealicense.com/licenses/mit/)
