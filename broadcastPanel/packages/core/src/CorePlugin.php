<?php namespace BroadcastPanel\Core;

/**
 * @author Liam Symonds
 * @version 1.0.0
 *
 * Sets up the core plugin.
 **/
class CorePlugin implements BasePluginContract
{
	/**
	 * Retrieves the navigation for this plugin.
	 * 
	 * @return array
	 **/
	public function getNavigation()
	{
		return [

			'Application' => [
				
				'Links' => [
					'Home' 		=> '\BroadcastPanel\Core\Controllers\DashboardController@getIndex',
					'Logout'	=> '\BroadcastPanel\Core\Controllers\AccountController@getLogout'	
				],

				'Claim' => [

				]
				
			]
		];
	}
}