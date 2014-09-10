<?php

/**
 * Class Browser
 *
 * Get info about user browser and user IP address
 *
 * @author Vojta Svoboda <vojtasvoboda.cz@gmail.com>
 */
class Browser
{

    /** @var $userAgent */
    private $userAgent;

    /** @var $ipAddress */
    private $ipAddress;

    /**
     * Constructor
     *
     * @param null $userAgent
     * @param null $ipAddress
     */
    public function __construct($userAgent = null, $ipAddress = null)
    {
        $this->userAgent = ($userAgent) ? $userAgent : $_SERVER['HTTP_USER_AGENT'];
        $this->ipAddress = ($userAgent) ? $userAgent : $_SERVER['REMOTE_ADDR'];
    }

    public function getBrowser()
    {
        return array();
    }

    public function getPlatform()
    {

    }

    /**
     * Return IP address
     *
     * @return mixed
     */
    public function getIpAddress(){
        return $this->ipAddress;
    }

    /**
     * Set IP address
     *
     * @param $ipAddress
     *
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Set UserAgent
     *
     * @param $userAgent
     *
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get UserAgent
     *
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

}
