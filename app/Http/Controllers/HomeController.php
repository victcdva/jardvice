<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Chart;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $leveldata = DB::table('jardevices')->pluck('level')->last();
        $createdat = DB::table('jardevices')->pluck('created_at');
        $jardata = DB::table('jardevices')->select('level')->orderBy('id', 'DESC')->take(1)->get();
        return view('dashboard')->with(compact('leveldata','createdat', 'jardata'));
    }
}
