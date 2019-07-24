<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Property;
use App\Contact;
use App\Message;

use DB;
use Redirect;
use Auth;
//use Hash;
use Validator;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DB::table('users')
        ->join('properties', 'users.id', '=', 'properties.user_id')
        ->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();
        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/blank', [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }
}
