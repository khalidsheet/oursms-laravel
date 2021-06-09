<?php


namespace Khalidsheet\Oursms\Exceptions;

class PhoneNumberException extends \Exception
{

    public function __construct()
    {
        parent::__construct("Phone number must not starts with zero.", 422, null);
    }
}
