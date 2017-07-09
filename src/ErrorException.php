<?php

namespace TobyMaxham\IpAnonymizer;

/**
 * Class ErrorException
 * @package TobyMaxham\IpAnonymizer
 */
class ErrorException extends \Exception
{
    public function __construct($errstr, $errno, $errfile, $errline)
    {
        parent::__construct($errstr, $errno);
    }
}
