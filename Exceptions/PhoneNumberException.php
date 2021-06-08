<?php


namespace Khalidsheet\Oursms;

class PhoneNumberException extends \HttpException
{

    public function __construct()
    {
        parent::__construct("Phone number must not starts with zero.", 422, null);
    }
}
