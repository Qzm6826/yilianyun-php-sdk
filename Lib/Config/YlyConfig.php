<?php


namespace App\Config;

use InvalidArgumentException;
class YlyConfig{

    private $clientId = '';
    private $clientSecret = '';
    private $requestUrl = "https://open-api.10ss.net";
    private $log;

    public function __construct($clientId, $clientSecret)
    {

        if ($clientId == null || $clientId == "") {
            throw new InvalidArgumentException("app_key is required");
        }

        if ($clientSecret == null || $clientSecret == "") {
            throw new InvalidArgumentException("app_secret is required");
        }

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function getClientId()
    {
        return $this->clientId;
    }


    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    public function setRequestUrl($requestUrl)
    {
        $this->requestUrl = $requestUrl;
    }

    public function getLog()
    {
        return $this->log;
    }

    public function setLog($log)
    {
        if (!method_exists($log, "info")) {
            throw new InvalidArgumentException("logger need have method 'info(\$message)'");
        }
        if (!method_exists($log, "error")) {
            throw new InvalidArgumentException("logger need have method 'error(\$message)'");
        }
        $this->log = $log;
    }

}
