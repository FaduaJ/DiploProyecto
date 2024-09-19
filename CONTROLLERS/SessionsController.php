<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Sessión Exitosa', 'Bienvenido al Portal');
            return redirect()->intended('/portal');
        }

        return back()->withErrors([
            'message' => 'Datos Incorrectos, Intente de Nuevo!',
        ]);
    }

    public function destroy(){
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->intended('/');
    }

    public function forgot_password(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT 
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);

    }

    public function reset_password(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login.store')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);

    }

}
