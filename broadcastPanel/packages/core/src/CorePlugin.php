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

			// The application headered navigation box.
			'Application' => [
				
				'Links' => [
					'Home' 		=> '\BroadcastPanel\Core\Controllers\DashboardController@getIndex',
					'Settings'	=> '\BroadcastPanel\Core\Controllers\AccountController@getSettings',
					'Logout'	=> '\BroadcastPanel\Core\Controllers\AccountController@getLogout'	
				],

				'Claim' => [

				]
				
			],

			// The messaging headered navigation box.
			'Messaging' => [

				'Links' => [
					'View Inbox' => '\BroadcastPanel\Core\Controllers\DashboardController@getIndex'
				],

				'Claim' => [

				]

			]
		];
	}
	
}