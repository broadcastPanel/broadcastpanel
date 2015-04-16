<?php namespace App\Http\Controllers;

/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 16/04/2015
 *
 * Contains the logic to do with the dashboard views
 * and actions.
 *
 **/
class DashboardController extends Controller 
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
     * @return dashboard view
     **/
    public function getIndex()
    {
        return view('dashboard.index');
    }

}

