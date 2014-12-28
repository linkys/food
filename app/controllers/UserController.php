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
        User::register($data);

        return Redirect::to('/');

    }

    public function validator()
    {
        if (Request::ajax() && !Auth::check()) {

            $data = Input::all();
            $validator = User::validate($data);

            if ($validator->fails())
            {
                $error = $validator->messages();
                $status = false;
            } else {
                $status = true;
                $error = null;
            }

            $ret = array(
                'error' => $error,
                'status' => $status
            );

            return $ret;

        }
    }

}
