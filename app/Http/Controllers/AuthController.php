<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login/main', [
            'theme' => 'light',
            'page_name' => 'auth-login',
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            switch ((int) Auth::guard('admin')->user()->role_id) {
                case 3:
                    return redirect()->route('accountant.index');
                    break;
                case 4:
                    return redirect()->route('deliverer.index');
                    break;
                case 5:
                    return redirect()->route('dashboard');
                    break;
                case 6:
                    return redirect()->route('dashboard');
                    break;
            }
        } else return Redirect::back()->with('error', 'Email ou mot de passe incorrect!');
    }

    public function profile() {
        return view('profile');
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('staff/login');
    }
}
