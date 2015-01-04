<?php

class AccountController extends BaseController
{
    /**
    * Instantiate a new AccountController instance
    */
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
    * Show login page
    */
    public function getLogin()
    {
        return View::make('account.login');
    }

    /**
    * Post login
    */
    public function postLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
                return Redirect::to('')->with('success', '로그인 되었습니다.');
            } else {
                Input::flashOnly('username');
                return Redirect::to('login')->with('error', '아이디 또는 비밀번호가 잘못되었습니다.');
            }
        }

        return Redirect::to('login')->withErrors($validator);
    }

    /**
    * Show register page
    */
    public function getRegister()
    {
        return View::make('account/register');
    }

    /**
    * Post register page
    */
    public function postRegister()
    {

        $rules = [
          'username'  => 'required|unique:users,username|min:5|max:20',
          'password'  => 'required|min:5|max:20',
          'email'     => 'required|email|unique:users',
          'nickname'  => 'required|unique:users,nickname|min:2|max:10'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $user = new User;
            $user->username   = Input::get('username');
            $user->email      = Input::get('email');
            $user->password   = Hash::make(Input::get('password'));
            $user->nickname   = Input::get('nickname');
            $user->save();

            $user->roles()->attach(3, [
              'created_at'  => Carbon::now(),
              'updated_at'  => Carbon::now()
            ]);

            return Redirect::to('')->with('success', '회원가입이 되었습니다.');
        }

        return Redirect::to('register')->withInput(Input::all())->withErrors($validator);
    }


    /**
    * Show edit page
    */
    public function getEdit()
    {
        return View::make('account.edit')->with('header', '수정')->with('user', Auth::user());
    }


    /**
    * Post edit page
    */
    public function postEdit()
    {

        $user = Auth::user();

        $rules = [
            'nickname'  => 'required|unique:users,nickname,' . $user->id . '|min:2|max:10',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'about'     => 'max:100',
            'password'  => 'min:5|max:20'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $user->nickname   = Input::get('nickname');
            $user->email   = Input::get('email');
            $user->about   = Input::get('about');

            if(Input::has('password')) {
                $user->password = Hash::make(Input::get('password'));
            }

            $user->save();

            return Redirect::to('account/edit')->with('success', '회원정보가 수정 되었습니다.');
        }

        return Redirect::to('account/edit')->withInput(Input::all())->withErrors($validator);
    }

    /**
    * Logout
    */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/')->with('success', '로그아웃 되었습니다.');
    }

    /**
    * Delete
    */
    public function getDelete()
    {
        return View::make('account.delete')->with('header', '탈퇴')->with('user', Auth::user());
    }

    /**
    * Delete
    */
    public function postDelete()
    {
        $user= Auth::user();
        $user->posts()->delete();
        $user->delete();
        Auth::logout();
        return Redirect::to('/')->with('success', '탈퇴 되었습니다.');
    }
}
