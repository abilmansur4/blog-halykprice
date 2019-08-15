<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Auth;

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
    public function index() {
        return view('home');
    }

    public function profile() {
        return view('profile');
    }

    public function getChildren() {
        $name = Auth::user()->name;
        $data = User::where(['sponsorname' => $name])->get();
        return view('treeview', ['data' => $data]);
    }
    
}
