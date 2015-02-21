<?php namespace Unnutz\PhpLcid\Facades;

use Unnutz\PhpLcid\Enums;
use Unnutz\PhpLcid\Lcid;
use Unnutz\PhpLcid\LcidInterface;

/**
 * Class LcidFacade
 * @package Unnutz\PhpLcid\Facades
 */
class LcidFacade
{
    /**
     * @var LcidInterface
     */
    protected static $lcid;

    /**
     * @return LcidInterface
     */
    protected static function getLcid()
    {
        if (!isset(static::$lcid))
            static::$lcid = new Lcid();

        return static::$lcid;
    }

    /**
     * Returns LCID based on language, region, script, variant and sort combination
     *
     * @param $language
     * @param null $region
     * @param null $script
     * @param null $variant
     * @param int $sort
     * @return int
     * @throws \Unnutz\PhpLcid\Exceptions\InvalidSortException
     * @throws \Unnutz\PhpLcid\Exceptions\LocaleNotFoundException
     */
    public static function get($language, $region = null, $script = null, $variant = null, $sort = Enums\Sort::SORT_DEFAULT)
    {
        return static::getLcid()->get($language, $region, $script, $variant, $sort);
    }

    /**
     * Returns LCID based on locale and sort combination
     *
     * @param $locale
     * @param int $sort
     * @return int
     * @throws \Unnutz\PhpLcid\Exceptions\InvalidSortException
     * @throws \Unnutz\PhpLcid\Exceptions\LocaleNotFoundException
     */
    public static function getByLocale($locale, $sort = Enums\Sort::SORT_DEFAULT)
    {
        return static::getLcid()->getByLocale($locale, $sort);
    }

    /**
     * Returns locale based on LCID
     *
     * @param $lcid
     * @param bool $returnArray
     * @return array|mixed
     * @throws \Unnutz\PhpLcid\Exceptions\InvalidSortException
     */
    public static function findLocale($lcid, $returnArray = false)
    {
        return static::getLcid()->findLocale($lcid, $returnArray);
    }
}