<?php namespace Unnutz\PhpLcid\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LcidLaravel
 * @package Unnutz\PhpLcid\Facades
 */
class LcidLaravel extends Facade
{
    /**
     *
     */
    const ACCESSOR = 'lcid';

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return static::ACCESSOR;
    }
}