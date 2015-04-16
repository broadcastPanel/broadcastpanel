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
        $credentials = [
            'email'    => 'test@test.com',
            'password' => 'password'
        ];

        $response = $this->call('POST', '/account/login', $credentials);        

//        $this->assertResponseOk();
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
    }  
}
