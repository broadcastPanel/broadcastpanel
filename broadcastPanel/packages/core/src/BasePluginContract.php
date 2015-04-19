<?php namespace BroadcastPanel\Core;

/**
 * @author  Liam Symonds <liam@broadcastpanel.com>
 * @version 1.0.0
 *
 * The base plugin contract that all other plugins must
 * implement.
 **/
interface BasePluginContract
{
	/**
	 * Retrieves the navigation for the current plugin.
	 *
	 * @return array
	 **/
	public function getNavigation();
}