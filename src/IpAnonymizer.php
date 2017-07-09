<?php

namespace TobyMaxham\IpAnonymizer;

/**
 * Class IpAnonymizer
 * @package TobyMaxham\IpAnonymizer
 */
class IpAnonymizer
{
    public function anonymize($ipAddress, $simple = true)
    {
        if ($simple) {
            return preg_replace('/(?!\d{1,3}\.\d{1,3}\.)\d/', '0', $ipAddress);
        }

        // we do not want to get a php waring.
        set_error_handler(function ($errno, $errstr, $errfile, $errline, array $errcontext) {
            // error was suppressed with the @-operator
            if (0 === error_reporting()) {
                return false;
            }

            throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
        });

        restore_error_handler();
        return inet_ntop(inet_pton($ipAddress) & inet_pton('255.255.255.0'));
    }
}
