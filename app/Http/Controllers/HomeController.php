<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Organizacione;
use App\Models\Vehiculo;

use Illuminate\Support\Facades\DB;

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
    {    $users = DB::table('users')->count();

        $organizacione = Organizacione::count();
        $vehic = Vehiculo::count();

       /*  return dd($organizacione); */
        return view('home', compact( 'organizacione','users','vehic'));
    }
}
