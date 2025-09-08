<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
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
     * 
     */
    //verificar el rol del usuario
    public function index(): View|RedirectResponse
{
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('cliente')) {
            return redirect()->route('cliente.dashboard');
        }
        return view('home');
    }
    return redirect('/login');
}


    public function adminDashboard(){
        return view('admin.dashboard');
    }
    public function clienteDashboard(){
        return view('cliente.dashboard');
    }
    }

