<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with(['error' => 'You have successfully logged out']);
    }
}
