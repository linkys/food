<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.2
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public static function validate($data)
    {
        return Validator::make($data, [
            'login' => 'required|min:4|max:100|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:100|same:password_r',
            'password_r' => 'required|min:6|max:100'
        ]);
    }

    public static function register($data)
    {
        $user = new User();

        $user->login = $data['login'];
        $user->email = mb_strtolower($data['email']);
        $user->password = Hash::make($data['password']);

        $user->save();

        Auth::login($user, true);
    }

    public static function login($data)
    {
        if ( Auth::attempt([ 'login' => $data['login'], 'password' => $data['password'] ], true) ) {
            return Redirect::to('/');
        }else {
            return Redirect::back()->withErrors([ 'message' => 'Неправильные данные' ], 'login');
        }
    }

}
