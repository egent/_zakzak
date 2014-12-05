<?php

class UsersController extends \BaseController {
	
	
	public function handleLogin()
	{
	
		$data = Input::only(['email', 'password']);		
        
		$validator = Validator::make(
            $data,
            [
                'email' => 'required|email|min:8',
                'password' => 'required|min:5',
            ]
        );

        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }		
		
		$user = User::login($data);

		if (!$user) 
		{ 
			
			return Redirect::route('login')->withInput()->with('message', Lang::get('messages.error'));
			//Session::flash('message', Lang::get('messages.error'));
		}
		
        return Redirect::route('home');	
	}


	public function profile()
	{
		$user = Auth::User();
		$user_id = $user->id;
				
		return View::make('users.profile')->with(['user_id' => $user_id, 'user' => $user]);
	}


	public function login()
	{
		return View::make('users.login');
	}
	
	public function logout()
	{
		if(Auth::check())
		{
			Auth::logout();
		}
		return Redirect::route('login');
	}	


	public function register()
	{
		return View::make('users.create');
	}


	public function registratioin()
	{
		
		//return 'is store!';
		
		$data = Input::only(['password','email']);
		
		$validator = Validator::make(
			$data,
			[
				'email' => 'required|email|min:5|unique:users',
				'password' => 'required|min:5',				
			]
		);
		
		if($validator->fails()){
			return Redirect::route('register')->withErrors($validator)->withInput();
		}		


        $newUser = User::register($data); 	
		
		if($newUser)
		{
            Auth::login($newUser, true);			
            return Redirect::route('/profile');
        }

        return Redirect::route('user.create')->withInput();		
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}


}