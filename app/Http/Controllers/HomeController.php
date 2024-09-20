<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()){
        $userID = Auth::user()->id;
      }

      $pending = DB::table('orders')->where('destination_id', $userID)->where('status', 1)->count('id');
      $sent = DB::table('orders')->where('destination_id', $userID)->where('status', 2)->count('id');
      $ready = DB::table('orders')->where('destination_id', $userID)->where('status', 3)->count('id');
      $delivered  = DB::table('orders')->where('destination_id', $userID)->where('status', 4)->count('id');
      $userCount = DB::table('users')->count('id');
      return view('home', compact('pending', 'sent', 'ready', 'delivered', 'userCount'));
    }

}
