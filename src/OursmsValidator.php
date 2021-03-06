<?php


namespace Khalidsheet\Oursms;


use Illuminate\Support\Str;
use Khalidsheet\Oursms\Exceptions\PhoneNumberException;

abstract class OursmsValidator
{

    /**
     * Transforms your user id to a valid one
     * for example you can't just pass the user id in your account like this "SP-0041"
     * You have to provide it as only "41" without the zeros or the letters
     *
     * @param $userId
     * @return string
     */
    protected function transformUserId($userId) {
        $transformedUserId = "";
        if (Str::startsWith($userId, "SP-")) {
            $transformedUserId = Str::replace("SP-", "", $userId);
            return ((int) $transformedUserId);
        }

        return $transformedUserId;
    }


    /**
     * Validates phone number
     *
     * @param $phoneNumber
     * @return string
     * @throws PhoneNumberException
     */
    protected function validatePhoneNumber($phoneNumber) {

        if (Str::startsWith($phoneNumber, "0")) {
            throw new PhoneNumberException();
        }

        return $phoneNumber;
    }

}
