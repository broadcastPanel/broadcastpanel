<?php namespace BroadcastPanel\Core\Controllers;

use \App\Http\Controllers\Controller;
use \BroadcastPanel\Core\Repositories\UserRepository;

use Request;
use Sentry;
use Redirect;
use Cookie;

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
        return view('core::settings')->with([
            'email' => Sentry::getUser()->email
        ]);  
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
            $credentials = [

                'email'     => Request::input('email'),
                'password'  => Request::input('password')

            ];

            $user = Sentry::authenticate($credentials, false);

            $cookie = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim ( $user->email ) ) );

            return Redirect::to('/dashboard/index')->withCookie(cookie('gravatar', $cookie));
        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Redirect::back()->with([
                'error' => 'You must enter an email address.',
                'class' => 'drop-20'
            ]);
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Redirect::back()->with([
                'error' => 'You must enter a password.',
                'class' => 'drop-20'
            ]);
        }
        catch (\Exception $e)
        {
            // If we receive any other type of validation error we always want to
            // return the same info to prevent account enumeration.
            return Redirect::back()->with([
                'error' => 'Invalid credentials.',
                'class' => 'drop-20'
            ]);
        }
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

}
