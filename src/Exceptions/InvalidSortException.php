<?php namespace Unnutz\PhpLcid\Exceptions;

use Exception;

/**
 * Class InvalidSortException
 * @package Unnutz\PhpLcid\Exceptions
 */
class InvalidSortException extends Exception
{
    function __construct($language, $sort)
    {
        $this->message = sprintf('Invalid sort value %d for "%s" language', $sort, $language);
    }
}