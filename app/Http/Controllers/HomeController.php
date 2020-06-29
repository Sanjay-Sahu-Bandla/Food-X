<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $path = storage_path().'/JSON/restaurants.json';

        $JSON_data = file_get_contents($path);
        $restaurants_data = json_decode($JSON_data,true);

        if(Auth::check()) {

            $user = Auth::user();

            return view('index')->with([
                'restaurant' => $restaurants_data,
                'user' => $user,
            ]);
        }

        return view('index')->with('restaurant',$restaurants_data);
    }
}
