<?php namespace BroadcastPanel\Core;

use \Illuminate\Support\ServiceProvider; 
use \BroadcastPanel\Base;

/**
 * @author  Liam Symonds
 * @version 1.0.0
 *p
 * Extends the base service provider to perform the implementations
 * required to get this plugin to work.
 **/
class CoreServiceProvider extends ServiceProvider
{
	/**
	 * Loads all of the views and publishes the 
	 * assets, when required, to their relevant
	 * directories.
	 *
	 * @return void
	 **/
	public function boot() 
	{
		// Load the views from our views directory
		$this->loadViewsFrom(__DIR__.'/views/', 'core');

		// Publish the assets
		$this->publishes([
			__DIR__.'/../assets/js/'   => public_path('/assets/js'),
			__DIR__.'/../assets/css'   => public_path('/assets/css'),
			__DIR__.'/../assets/imgs'  => public_path('/assets/imgs'),
			__DIR__.'/../assets/fonts' => public_path('/assets/fonts')
		]);

		// Publish the migrations
		$this->publishes([
			__DIR__.'/../migrations' => $this->app->databasePath().'/migrations'
		]);

		// Include our routes
		include __DIR__.'/routes.php';
	}

	/**
	 * Registers all of the container bindings for this current
	 * application.
	 * 
	 * @return void
	 **/
	public function register()
	{
		$this->app->singleton('BroadcastPanel\Core\CorePlugin', function($app)
		{
			return new CorePlugin();
		});
	}
}