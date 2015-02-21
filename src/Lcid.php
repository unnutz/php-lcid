<?php namespace Unnutz\PhpLcid;

use Locale;
use Unnutz\PhpLcid\Enums;
use Unnutz\PhpLcid\Exceptions\InvalidSortException;
use Unnutz\PhpLcid\Exceptions\LocaleNotFoundException;

/**
 * Class Lcid
 * @package Unnutz\PhpLcid
 */
class Lcid implements LcidInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     *
     */
    function __construct()
    {
        $this->data = require __DIR__ . '/data/languages.php';
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
    public function get($language, $region = null, $script = null, $variant = null, $sort = Enums\Sort::SORT_DEFAULT)
    {
        $tags = [];

        $tags[Locale::LANG_TAG] = $language;

        is_null($region) ?: $tags[Locale::REGION_TAG] = $region;
        is_null($script) ?: $tags[Locale::SCRIPT_TAG] = $script;
        is_null($variant) ?: $tags['variant0'] = $variant;

        return $this->getByLocale(Locale::composeLocale($tags), $sort);
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
    public function getByLocale($locale, $sort = Enums\Sort::SORT_DEFAULT)
    {
        $locale = Locale::canonicalize($locale);

        if (!array_key_exists($locale, $this->data)) {
            throw new LocaleNotFoundException($locale);
        }

        $tags = Locale::parseLocale($locale);
        if (!array_key_exists(Locale::LANG_TAG, $tags))
            throw new LocaleNotFoundException($locale);

        $this->validateSort($tags[Locale::LANG_TAG], $sort);

        return $sort + $this->data[$locale];
    }

    /**
     * Returns locale based on LCID
     *
     * @param $lcid
     * @param bool $returnArray
     * @return array|mixed
     * @throws \Unnutz\PhpLcid\Exceptions\LocaleNotFoundException
     */
    public function findLocale($lcid, $returnArray = false)
    {
        $locale = array_search($lcid, $this->data, true);

        if (false === $locale) {
            throw new LocaleNotFoundException($lcid);
        }

        return $returnArray ? Locale::parseLocale($locale) : $locale;
    }

    /**
     * @param $language
     * @param $sort
     * @throws \Unnutz\PhpLcid\Exceptions\InvalidSortException
     */
    protected function validateSort($language, $sort)
    {
        switch ($sort) {

            case 0x00000000:

                break;

            case 0x00010000:

                if (!in_array($language, ['zh', 'ka', 'de', 'hu', 'ja', 'ko']))
                    throw new InvalidSortException($language, $sort);

                break;

            case 0x00020000:
            case 0x00030000:

                if (!in_array($language, ['zh']))
                    throw new InvalidSortException($language, $sort);

                break;

            case 0x00040000:

                if (!in_array($language, ['zh', 'ja']))
                    throw new InvalidSortException($language, $sort);

                break;

            default:
                throw new InvalidSortException($language, $sort);
        }

        return;
    }
}