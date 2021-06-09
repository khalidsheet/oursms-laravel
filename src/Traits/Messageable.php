<?php


namespace Khalidsheet\Oursms\Traits;


use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Khalidsheet\Oursms\Oursms;
use Khalidsheet\Oursms\Exceptions\PhoneNumberQualifierKeyException;
use Psr\Http\Message\StreamInterface;

trait Messageable
{

    /**
     * Send SMS Message to a user
     *
     * @param string $message
     * @return StreamInterface
     * @throws GuzzleException
     * @throws PhoneNumberQualifierKeyException
     */
    public function sendMessage(string $message): StreamInterface
    {
        $to = $this->{$this->getPhoneNumberKey()};

        if ($to == null) {
            throw new PhoneNumberQualifierKeyException();
        }


        return $this->createClient()->sendMessage($to, $message);
    }

    /**
     * Send Otp or One time password message to a user
     *
     * @param string $otp
     * @throws GuzzleException
     * @throws PhoneNumberQualifierKeyException
     */
    public function sendOtp(string $otp): StreamInterface
    {
        $to = $this->{$this->getPhoneNumberKey()};

        if ($to == null) {
            throw new PhoneNumberQualifierKeyException();
        }

        return $this->createClient()->sendOtp($to, $otp);
    }





    /**
     * Creates a fresh instance of Oursms Client
     * @return Oursms
     */
    private function createClient(): Oursms
    {
        return new Oursms();
    }


    /**
     * Determine the phone number key in the database
     *
     * @return Repository|Application|mixed
     */
    private function getPhoneNumberKey() {
        return config('oursms.phoneNumberKey');
    }
}
