<?php namespace App\Http\Controllers;


/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 16/04/2015
 *
 * Controls all of the logic to do with accounts
 * in broadcastPanel.
 **/
class AccountController extends Controller 
{
    
    /**
     * Shows the login page to the user
     * of the application.
     *
     * @return A view to the user
     **/
    public function getLogin() 
    {
        return view('account.login');
    }
    
    /**
     * Acceps the login from the user and attempts
     * to log them in.
     *
     * @return A redirect to the dashboard screen.
     **/
    public function postLogin() 
    {
        
    }

}
