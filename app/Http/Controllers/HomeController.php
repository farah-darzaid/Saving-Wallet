<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function redirect()
    {
        if (Auth::user()) {
            return redirect('/home');
        }else {
            return view('auth.login');
        }
    }


    public function getDashboard()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case 'admin':
                return redirect( '/admin');
                break;

            default:
                return redirect('/user');
                break;
        }
    }
}
