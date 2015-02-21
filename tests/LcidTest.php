<?php namespace Unnutz\PhpLcid\Tests;

use PHPUnit_Framework_TestCase;
use Unnutz\PhpLcid\Enums\Sort;
use Unnutz\PhpLcid\Facades\LcidFacade;
use Unnutz\PhpLcid\Lcid;
use Unnutz\PhpLcid\LcidInterface;

/**
 * Class LcidTest
 * @package Unnutz\PhpLcid\Tests
 */
class LcidTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var LcidInterface
     */
    protected $lcid;

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();

        $this->lcid = new Lcid();
    }

    /**
     *
     */
    public function testLcid()
    {
        $this->assertEquals(1064, $this->lcid->get('tg', 'tj', 'cYrl'));
        $this->assertEquals(66567, $this->lcid->get('de', 'de', null, null, Sort::SORT_GERMAN_PHONE_BOOK));
        $this->assertEquals(66567, $this->lcid->getByLocale('de_DE', Sort::SORT_GERMAN_PHONE_BOOK));
    }

    /**
     *
     */
    public function testLcidFacade()
    {
        $this->assertEquals(1064, LcidFacade::get('tg', 'tj', 'cYrl'));
        $this->assertEquals(66567, LcidFacade::get('de', 'de', null, null, Sort::SORT_GERMAN_PHONE_BOOK));
        $this->assertEquals(66567, LcidFacade::getByLocale('de_DE', Sort::SORT_GERMAN_PHONE_BOOK));
    }
}