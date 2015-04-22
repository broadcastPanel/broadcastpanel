<?php namespace BroadcastPanel\Core\Repositories;

/**
 * @author Liam Symonds
 * @version 1.0.0
 *
 * Encompasses the functionality for all user related queries
 * including but not limited to creation, deletion and updating
 * of the user itself.
 * 
 * Repositories are used to aid in the testing of the application
 * and make it easy to test the core functionality without 
 * running off to the database.
 **/
class UserRepository
{

	/**
	 * Finds the user by their email and returns them if they exist.
	 * Otherwise, it will throw a not found exception that the user
	 * should handle.
	 *
	 * @return User
	 **/
	public function get($userEmail)
	{
		$user = Sentry::findUserByLogin($userEmail);

		return $user;
	}

	/**
	 * Creates a new user in the application.
	 *
	 * @return boolean
	 **/
	public function create(array $userCredentials)
	{
		if (! array_key_exists('email', $credentials) || ! array_key_exists('password', $credentials))
		{
			throw new \Exception("Email or password not in credential array.");
		}

		Sentry::register([
            'email'     => $credentials['email'],
            'password'  => $credentials['password']
        ], true);
	}

}