<?php namespace BroadcastPanel\Core\Controllers;

use \App\Http\Controllers\Controller;
use \BroadcastPanel\Core\Repositories\UserRepository;

use Request;
use Sentry;
use Redirect;
use Cookie;
use Hash;

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
     * The dependency injected user repository.
     **/
    private $userRepository;

    /**
     * Handles the injection of dependencies into this controller.
     *
     * @param $userRepository the injected user repository
     **/
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Shows the login page to the user
     * of the application.
     *
     * @return A view to the user
     **/
    public function getLogin() 
    {
        return view('core::login');
    }

    /**
     * Provides and returns the index view for
     * the settings.
     *
     * @return view
     **/
    public function getSettings()
    {
        $currentUser = Sentry::getUser();

        return view('core::settings')->with([
            'email'     => $currentUser->email,
            'firstName' => $currentUser->firstName,
            'lastName'  => $currentUser->lastName
        ]);  
    }

    /**
     * Logs the currently authenticated user out of the application and
     * redirects them back to the login.
     *
     * @return redirect
     **/
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::to('/account/login');
    }
    
    /**
     * Acceps the login from the user and attempts
     * to log them in.
     *
     * @return A redirect to the dashboard screen.
     **/
    public function postLogin() 
    {
        $this->middleware('csrf');

        try
        {
            $credentials = [

                'email'     => Request::input('email'),
                'password'  => Request::input('password')

            ];

            $user = Sentry::authenticate($credentials, false);

            $cookie = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim ( $user->email ) ) );

            return Redirect::to('\BroadcastPanel\Core\Controllers\DashboardController@getIndex')->withCookie(
                cookie('gravatar', $cookie));
        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getLogin')->with([
                'error' => 'You must enter an email address.',
                'class' => 'drop-20'
            ]);
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getLogin')->with([
                'error' => 'You must enter a password.',
                'class' => 'drop-20'
            ]);
        }
        catch (\Exception $e)
        {
            // If we receive any other type of validation error we always want to
            // return the same info to prevent account enumeration.
            return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getLogin')->with([
                'error' => 'Invalid credentials.',
                'class' => 'drop-20'
            ]);
        }
    }

    /**
     * Updates the user's settings if they have the correct credentials
     * and have changed anything at all.
     *
     * @return Redirect back to the dashboard screen.
     **/
    public function postSettings()
    {
        $this->middleware('csrf');

        try
        {
            $currentUser = Sentry::getUser();

            // Credentials to change
            $emailToChange = Request::input('email');
            $passwordToChange = Request::input('password');
            $firstNameToChange = Request::input('firstName');
            $lastNameToChange = Request::input('lastName');

            if ($emailToChange == '' && $passwordToChange == '') {
                return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getSettings')->with([
                    'error' => 'You must enter a setting to change.',
                    'class' => ''
                ]);
            }

            // Change the user's email if it is different.
            if ($emailToChange != $currentUser->email) {
                $currentUser->email = $emailToChange;
            }

            // Assume they are changing their password if it is
            // not blank.
            if ($passwordToChange != '') {
                $currentUser->password = $passwordToChange;
            }

            // Change their first name if it is different.
            if ($firstNameToChange != $currentUser->firstName) {
                $currentUser->firstName = $firstNameToChange;
            }

            // And change their last name if it is different
            if ($lastNameToChange != $currentUser->lastName) {
                $currentUser->lastName = $lastNameToChange;
            }

            $currentUser->save();

            return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getSettings')->with([
                'success'   => 'Successfully changed your settings.',
                'class'     => ''
            ]);
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getSettings')->with([
                'error' => 'Unable to change your settings. Please try again later.',
                'class' => ''
            ]);
        }
        catch (\Exception $e)
        {
            return Redirect::action('\BroadcastPanel\Core\Controllers\AccountController@getSettings')->with([
                'error' => 'An unknown error has occurred. Please try again later.',
                'class' => ''
            ]);
        }

    }

}
