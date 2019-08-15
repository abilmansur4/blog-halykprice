<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Follower;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'fullname' => ['required', 'string', 'max:255'],
            'sponsorname' => ['required','string','max:255', 'exists:followers,id'],
            'ssi' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'fullname' => $data['fullname'],
            'sponsorname' => $data['sponsorname'],
            'ssi' => $data['ssi'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40)
        ]);

        $thisUser = User::findOrFail($user->id);
        $this->sendMail($thisUser);
        $sponsor = ['name' => $data['name']];  
        $parent = Follower::find($data['sponsorname']);
        Follower::create($sponsor, $parent);    
        return $user;
    }

    public function sendMail($thisUser) {
        Mail::to('noizy202@gmail.com')->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst() {
        return view('email.verifyEmailFirst');
    }

    public function sendEmailDone($name, $verifyToken) {
        $user = User::where(['name' => $name, 'verifyToken' => $verifyToken]) -> first();
        if ($user) {
            return user::where(['name' => $name, 'verifyToken' => $verifyToken]) -> update(['status' => '1', 'verifyToken' => NULL]);
        } else {
            return 'user not found';
        }
    }

    
}
