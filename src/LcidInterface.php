<?php namespace Unnutz\PhpLcid;

use Unnutz\PhpLcid\Enums;

/**
 * Interface Lcid
 * @package Unnutz\PhpLcid
 */
interface LcidInterface
{

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
    public function get($language, $region = null, $script = null, $variant = null, $sort = Enums\Sort::SORT_DEFAULT);

    /**
     * Returns LCID based on locale and sort combination
     *
     * @param $locale
     * @param int $sort
     * @return int
     * @throws \Unnutz\PhpLcid\Exceptions\InvalidSortException
     * @throws \Unnutz\PhpLcid\Exceptions\LocaleNotFoundException
     */
    public function getByLocale($locale, $sort = Enums\Sort::SORT_DEFAULT);

    /**
     * Returns locale based on LCID
     *
     * @param $lcid
     * @param bool $returnArray
     * @return array|mixed
     * @throws \Unnutz\PhpLcid\Exceptions\LocaleNotFoundException
     */
    public function findLocale($lcid, $returnArray = false);
}