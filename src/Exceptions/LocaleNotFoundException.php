<?php namespace Unnutz\PhpLcid\Exceptions;

use Exception;

/**
 * Class LocaleNotFoundException
 * @package Unnutz\PhpLcid\Exceptions
 */
class LocaleNotFoundException extends Exception
{
    function __construct($locale)
    {
        $this->message = sprintf('Invalid locale "%s"', $locale);
    }
}