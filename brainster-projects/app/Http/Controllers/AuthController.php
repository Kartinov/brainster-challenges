<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('projects.index')->withSuccess('Успешна најава');
        }

        return back()->withErrors([
            'credentials' => 'Внесените креденцијали не се совпаѓаат со нашите записи.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return to_route('auth.login');
    }
}
