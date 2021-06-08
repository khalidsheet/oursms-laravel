<?php


namespace Khalidsheet\Oursms;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;


class Oursms extends OursmsValidator
{
    /**
     * User id
     * The Identifier of your oursms.app account
     * @var string
     */
    private $userId;

    /**
     * Key
     * Private key of your oursms.app account
     * @var string
     */
    private $key;


    /**
     * Endpoint Host
     * @var string
     */
    private $host = "https://oursms.app";


    public function __construct()
    {
        dd($this->transformUserId("SP-0041"));

        $this->userId = $this->transformUserId(config('oursms.userId'));
        $this->key = config('oursms.key');
    }


    /**
     * @param $to
     * @param $message
     * @throws GuzzleException
     */
    public function sendMessage($to, $message)
    {
        return $this->sendHttpRequest("api/v1/SMS/Add/SendOneSms", "POST", [
            "phoneNumber" => $to,
            "message" => $message
        ]);
    }


    /**
     * @param $to
     * @param $otp
     * @throws GuzzleException
     */
    public function sendOtp($to, $otp)
    {
        return $this->sendHttpRequest("api/v1/SMS/Add/SendOtpSms", "POST", [
            "phoneNumber" => $to,
            "otp" => $otp
        ]);
    }

    /**
     * @param $messageId
     * @throws GuzzleException
     */
    public function getSmsStatus($messageId)
    {
        return $this->sendHttpRequest("api/v1/SMS/Get/GetStatus/{$messageId}", "GET", []);
    }


    /**
     * @param string $url
     * @param string $method
     * @throws GuzzleException
     */
    private function sendHttpRequest(string $url, string $method, $body)
    {

        $client = new Client([
            'base_uri' => $this->host,
        ]);

        try {
            $response = $client->request($method, $url, [
               'json' => [
                   "userId" => $this->userId,
                   "key" => $this->key,
                   "phoneNumber" => $body["phoneNumber"] ?? null,
                   "otp" => $body["otp"] ?? null,
                   "message" => $body["message"] ?? null,
               ],
                'headers' => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ]
            ]);

            return $response->getBody();

        } catch (GuzzleException $exception) {
            return response()->json([
                's' => $exception->getMessage()
            ]);
        }
    }
}
