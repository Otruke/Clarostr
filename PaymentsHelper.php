<?php

namespace Arnold\Rave\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

/**
 * F4B test
 * @author Arnold Bayema <bayema.arnold@flutterwavego.com>
 * @version 1
 **/
class Payments
{

    protected $publicKey;
    protected $secretKey;
    protected $baseUrl;

    /**
     * Construct
     */
    function __construct(String $publicKey, String $secretKey, String $baseUrl)
    {

        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
        $this->baseUrl = $baseUrl;
    }


    /**
     * Verify payment ID
     * @param $idtransaction
     * @return object
     */
     public function verifyId($idtransaction){
        $result = Http::withToken($this->secretKey)->get(
            $this->baseUrl . '/transactions/'. $idtransaction . '/verify')->json();

            return $result;
     }
}