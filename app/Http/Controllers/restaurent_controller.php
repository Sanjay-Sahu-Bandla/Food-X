<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class restaurent_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all_restaurents()

    {

        $path = storage_path().'/JSON/restaurants.json';

        $JSON_data = file_get_contents($path);
        $restaurants_data = json_decode($JSON_data,true);

        if(Auth::check()) {

            $user = Auth::user();

            return view('search_restaurent')->with([
                'restaurant' => $restaurants_data,
                'user' => $user,
            ]);
        }

        return view('search_restaurent')->with('restaurant',$restaurants_data);

    }

    public function index()
    {
        return view('restaurent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // restaurants data

        $path = storage_path().'/JSON/restaurants.json';

        $JSON_data = file_get_contents($path);
        $restaurants_data = json_decode($JSON_data,true);

        // food data

        $food_path = storage_path().'/JSON/food.json';

        $JSON_data_food = file_get_contents($food_path);
        $food_data = json_decode($JSON_data_food,true);




        for($i=0; $i < count($restaurants_data); $i++) {

            if($restaurants_data[$i]['id'] == $id) {

                $restaurant_data = $restaurants_data[$i];

                return view('restaurent')->with([
                    'restaurant' => $restaurant_data,
                    'food_data' => $food_data
                ]);
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
