<?php namespace BroadcastPanel\Core\Controllers;

use \App\Http\Controllers\Controller;
use Request;
use Sentry;
use Redirect;
use Cookie;

/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 20/04/2015
 *
 * Handles the settings controller to complete
 * and save the user's settings.
 *
 **/
class SettingsController extends Controller 
{
    
    /**
     * Requires the Sentry authentication middleware to
     * check if the user is logged in or not.
     * 
     * @return void
     **/
    public function __construct()
    {
        $this->middleware('sentryauth');
    }

    /**
     * Provides and returns the index view for
     * the dashboards.
     *
     * @return view
     **/
    public function getIndex()
    {
        return view('core::settings');
    }

}

