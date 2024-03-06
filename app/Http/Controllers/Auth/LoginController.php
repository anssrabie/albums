<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::first();
        return view('auth.login',compact('user'));
    }

    public function postLogin(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('web')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->intended(route('albums.index'))->with(['success' => 'You have been logged in successfully']);
        }
        return redirect()->back()->with(['error' => 'Invalid email or password'])->withInput();
    }


}
