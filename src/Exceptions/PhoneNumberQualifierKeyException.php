<?php


namespace Khalidsheet\Oursms\Exceptions;


class PhoneNumberQualifierKeyException extends \Exception
{

    public function __construct()
    {
        parent::__construct("Phone Number Qualifier Key Not Defined", 422, null);
    }

}
