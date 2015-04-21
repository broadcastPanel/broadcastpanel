<?php

/**
 * @author Liam Symonds
 * @version 1.0.0
 *
 * Contains all of the tests for the settings controller.
 * Ensures that all of the key components of the settings
 * function and run as they should.
 **/
class SettingsTest extends TestCase
{
	
	/**
	 * Set up the authenticated user 
	 * within the application.
	 *
	 * @return void
	 **/
	public function setUp()
	{
		parent::setUp();
		
		Sentry::register([
            'email'     => 'test@tester.com',
            'password'  => 'test'
        ], true);

        Sentry::authenticate([
            'email'     => 'test@tester.com',
            'password'  => 'test'
        ]);
	}

	/**
	 * Calls the settings page and checks to see 
	 * if we can actually load the settings or not.
	 *
	 * @return void
	 **/
	public function testCanLoadSettings()
	{
		$this->call('GET', '/account/settings');

		$this->assertResponseOk();
	}

	/**
	 * Checks to see if the settings we'd expect to see
	 * are returned with the page.
	 *
	 * @return void
	 **/
	public function testExistingSettingsAreLoadedWithPage()
	{
		$this->call('GET', '/account/settings');

		$this->assertResponseOk();
		$this->assertViewHas('email', 'test@tester.com');
	}

	/** 
	 * Closes all of the mockery mocks, deletes the
	 * user and calls the parent tearDown method.
	 * 
	 * @return void
	 **/
	public function tearDown()
	{
		Mockery::close();

		$user = Sentry::findUserByLogin('test@tester.com');

        $user->delete();

		parent::tearDown();
	}

}