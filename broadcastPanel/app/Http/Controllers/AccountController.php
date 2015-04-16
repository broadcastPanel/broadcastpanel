<?php namespace App\Http\Controllers;

use Request;
use Sentry;

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
        return view( 'account.login' );
    }
    
    /**
     * Acceps the login from the user and attempts
     * to log them in.
     *
     * @return A redirect to the dashboard screen.
     **/
    public function postLogin() 
    {
        try
        {
            $credentials = array (

                'email'     => Request::input('email'),
                'password'  => Request::input('password')

            );

            $user = Sentry::authenticate($credentials, false);        
        }
        catch ( \Cartalyst\Sentry\Users\LoginRequiredException $e )
        {
            echo 'login required'; 
        }
        catch ( \Cartalyst\Sentry\Users\PasswordRequiredException $e )
        {
            echo 'password required';
        }
        catch ( \Exception $e )
        {
            // If we receive any other type of validation error we always want to
            // return the same info to prevent account enumeration.
            echo 'invalid credentials';
        }
    }

}
