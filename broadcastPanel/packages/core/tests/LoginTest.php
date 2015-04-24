<?php

/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 16/04/2015
 *
 * Tests all instances around the login functionality
 * of the application. If tests fail - there is a
 * good chance the users aren't going to be able to 
 * do anything.
 **/
class LoginTest extends TestCase 
{
    
    /**
     * Sets up the testing class and begins
     * the session to use within the environment.
     *
     * @return void
     **/
    public function setUp()
    {
        parent::setUp();

        Session::start();
    }

    /**
     * Ensure that the login page can be accessed and
     * that there is content on the page (i.e. a Login label).
     *
     * @return void
     **/
    public function testCanGetLoginPage()
    {   
        $response = $this->call('GET', '/account/login');

        $this->assertResponseOk();
    }
    
    /**
     * Tests to see if we can log a valid user in to
     * the application or not. 
     *
     * If everything works correctly - the user should
     * be redirected to the dashboard page through the
     * use of the Javascript. 
     *
     * @return void
     **/ 
    public function testCanLogTheUserIn()
    {
        // Mocks Sentry and prevents it from throwing an exception of the new, fake user
        // cannot be found.
        Sentry::shouldReceive('authenticate')->once();

        $credentials = [
            'email'    => 'test@test.com',
            'password' => 'password',
            '_token'  => csrf_token()
        ];

        $user = new Cartalyst\Sentry\Users\Eloquent\User();
        $user->email = 'test@test.com';
        $user->password = 'test'; 

        $response = $this->call('POST', '/account/login', $credentials);

        $this->assertRedirectedTo('/dashboard/index');
    }
    
    /**
     * If an invalid username/password is supplied the application
     * should refuse to log the user in and should return
     * an error indicating this. 
     *
     * @return void
     **/
    public function testCannotLoginWithInvalidUsernameOrPassword()
    {
        Sentry::shouldReceive('authenticate')->once()->andThrow(new Cartalyst\Sentry\Users\WrongPasswordException);

        $credentials = [
            'email'    => 'test@test.com',
            'password' => 'password',
            '_token'   => csrf_token()
        ];

        $response = $this->call('POST', '/account/login', $credentials);  

        $this->assertSessionHas('error', 'Invalid credentials.');
    }

    /**
     * If an invalid log in should occur we should provide the
     * same credentials whether it is an invalid username
     * or and invalid password.
     *
     * This is to prevent account enumaration (google).
     *
     * @return void
     **/
    public function testInvalidLoginDoesNotGiveAwayInformation()
    {
        Sentry::shouldReceive('authenticate')->once()->andThrow(new Cartalyst\Sentry\Users\WrongPasswordException);

        $credentials = [
            'email'    => 'test@test.com',
            'password' => 'password',
            '_token'   => csrf_token()
        ];

        $response = $this->call('POST', '/account/login', $credentials);  

        $this->assertSessionHas('error', 'Invalid credentials.');
    } 

    /**
     * Test that a user can get logged out and redirected to the correct page
     * (login) if they choose to do so.
     *
     * @return void
     **/
    public function testCanLogOut()
    {
        Sentry::shouldReceive('logout')->times(1);

        $response = $this->call('GET', '/account/logout');

        $this->assertRedirectedTo('/account/login');
    } 

    /**
     * Closes down these tests and ensures that mockery
     * is fully closed and will run its assertions.
     */
    public function tearDown()
    {
        Mockery::close();
    }

}
