<?php namespace Unnutz\PhpLcid;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Class PhpLcidServiceProvider
 * @package Unnutz\PhpLcid
 */
class PhpLcidServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerLcid();
	}

    /**
     *
     */
    protected function registerLcid()
    {
        $this->app->bindShared(LcidInterface::class, function(Application $app) {

            return $app->make(Lcid::class);
        });
    }
}
