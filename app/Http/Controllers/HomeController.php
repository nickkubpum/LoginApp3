<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;

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
    public function index()
    {

        $name = Auth::user()->name;

        $data = DB::table('users')
            ->join('department', 'users.name', '=', 'department.id_dep')
            ->where('users.name', '=', $name)
            ->select('department.id_dep','department.name')
            ->get();

        // foreach ($data as $data) 
        // {
        //     echo $data->name;
        // }
            
            return view('home', ['data' => $data]);

        // return view('home');
    }
}
