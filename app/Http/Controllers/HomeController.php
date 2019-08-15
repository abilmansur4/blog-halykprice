<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Follower;
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
        $result = Follower::descendantsOf(Auth::user()->id);
        return view('home', ['users' => $result]);
    }

    public function getFollowerById() {
        $result = Follower::descendantsOf(Auth::user()->id);
        return view('home', ['users' => $result]);
    }

    public function profile() {
        return view('profile');
    }
    
}
