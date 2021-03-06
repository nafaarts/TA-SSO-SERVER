<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return [
            $this->username() => request($this->username()),
            'password' => $request->password,
            'is_active' => 1
        ];
    }

    public function username()
    {
        $login = request('nomor_induk');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
            request()->merge([$field => $login]);
        } else {
            $field = 'nomor_induk';
        }

        // dd($login, filter_var($login, FILTER_VALIDATE_EMAIL), $field, request());

        return $field;
    }
}
