<?php

/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 16/04/2015
 *
 * Tests the functionality of the dashboard controller and
 * its calls in order to ensure that we get the most
 * reliable data possible. 
 **/
class DashboardTest extends TestCase
{
    
    /**
     * Sets up the current user by registering them (activated)
     * and then authenticating them for use within the service.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        Sentry::register([
            'email'     => 'test@tester.com.com',
            'password'  => 'test'
        ], true);

        Sentry::authenticate([
            'email'     => 'test@tester.com',
            'password'  => 'test'
        ]);
    }

    /**
     * Tests whether the dashboard view can
     * be retrieved or not and if the status
     * URL is status: OK.
     *
     * @return void
     **/
    public function testCanGetDashboard()
    {
        $this->call('GET', '/dashboard/index');

        $this->assertResponseOk();
    }

    /**
     * Tears down this set of tests and deletes the user we
     * are testing with to prevent any collisions in the future.
     *
     * @return void;
     **/
    public function tearDown()
    {
        Mockery::close();
        
        $user = Sentry::findUserByLogin('test@tester.com');

        $user->delete();

        parent::tearDown();
    }

} 

