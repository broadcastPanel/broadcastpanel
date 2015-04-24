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

		Session::start();

		try
		{
			Sentry::register([
	            'email'     => 'test@tester.com',
	            'password'  => 'test'
	        ], true);
		}
		catch (\Exception $e)
		{
			// Crappy catch all.
		}

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
	 * Ensures that the user can change their email.
	 *
	 * @return void
	 **/
	public function testCanChangeEmail()
	{
		// Create the mocks
		Sentry::shouldReceive('save')->once()->andReturn(true);

		$updateCredentials = [
			'email'           	=> 'test@tester.com',
            '_token'  		 	=> csrf_token()
		];

		$this->call('POST', '/account/settings', $updateCredentials);

		$this->assertRedirectedTo('/account/settings');
		$this->assertSessionHas('success');
	}

	public function testCanChangePassword()
	{

	}

	public function testInvalidConfirmPasswordFails()
	{

	}

	/** 
	 * Closes all of the mockery mocks, deletes the
	 * user and calls the parent tearDown method.s
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