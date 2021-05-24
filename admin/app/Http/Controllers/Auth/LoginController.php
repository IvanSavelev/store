<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

use App\Http\Helpers\Page\Page;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('loginOut');
  }




  public function login(Request $request)
  {
    $this->validateLogin($request);
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      return redirect()->route('dashboard');
    }

    $error_text = 'Неправильный пароль или нет такого пользователя.';
    $collection = new MessageBag();
    $collection->add('password', $error_text);
    $request->session()->flash('errors', $collection);

    return redirect()->back();
  }


  /**
   * Show the application's login form.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   * @throws \Exception
   */
  public function loginForm()
  {
    $page = new Page($this);
    $page->setType('empty');
    return $this->viewPage('pages.auth.login_form', $page);
  }



  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function loginOut(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    if ($response = $this->loggedOut($request)) {
      return $response;
    }

    return $request->wantsJson()
      ? new Response('', 204)
      : redirect('/');
  }


  /**
   * Get the guard to be used during authentication.
   *
   * @return \Illuminate\Contracts\Auth\StatefulGuard
   */
  protected function guard()
  {
    return Auth::guard();
  }
}
