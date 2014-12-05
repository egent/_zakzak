<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
	//public static $unguarded = true;
	protected $fillable = ['email','password'];
	
	
    public function role()
    {
       return $this->belongsToMany('Role');
    }
	
    public function item()
    {
       return $this->hasMany('Item');
    }	
		

	public static function login($data)
	{        
		
		try
		{
			Auth::attempt(
				['email' => $data['email'], 'password' => $data['password']], true
			);
		}
		catch(Exception $e)
		{
			return $e;
		}
		
		return Auth::user();		

	}
	
	
	public static function register($data)
	{

		try
		{
			$user = User::create(
				array(
					'email' => $data['email'],
					'password' => Hash::make($data['password']),
				)
			);	
		}
		catch(Exception $e)
		{
			return $e;
		}
		
		return $user;
		
	}	
	
}
