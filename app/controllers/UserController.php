<?php

class UserController extends BaseController {

	public function login()
    {
        $data = Input::all();

        return User::login($data);
    }

    public static function logout()
    {
        if (!Auth::check()){
            return Redirect::to('/');
        }
        Auth::logout();
        return Redirect::to('/');
    }

	public function register()
    {
        $data = Input::all();
        $validator = User::validate($data);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator, 'register');
        }

        User::register($data);

        return Redirect::to('/');

    }

}
