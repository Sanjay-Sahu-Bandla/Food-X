<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;

class profile_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::check()) {
            return redirect('/home')->with('registrantion','needed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect()->route('home');
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
        //
        if (!Auth::check()) {
            return redirect('/home')->with('registrantion','needed');
        }

        $user = Auth::user();
        
        $path = storage_path().'/JSON/Users/'.$user->id.'.json';

        $JSON_data = file_get_contents($path);
        $orders = json_decode($JSON_data,true);

        $orders = array_reverse($orders);

        $restaurant = array();
        $food_name = array();
        $food_price = array();
        $food_quantities = array();
        $timestamp = array();

        for ($i=0; $i < count($orders); $i++) {

            $restaurant[] = $orders[$i]['restaurant'];
            $food_name[] = $orders[$i]['food_name'];
            $food_price[] = $orders[$i]['food_price'];
            $food_quantities[] = $orders[$i]['food_quantities'];
            $timestamp[] = $orders[$i]['timestamp'];
        }

        return view('profile',[

            'food_name' => $food_name,
            'restaurant' => $restaurant,
            'timestamp' => $timestamp,
            'food_price' => $food_price,
            'food_quantities' => $food_quantities,
            'user' => $user
        ]);
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

        $user = Auth::user();

        return view('auth.update_profile')->with('user',$user);
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
        // $users = DB::table('users')->get();
        DB::update('update users set name = ? , location = ? , email = ? where id = ?',[
            $request->get('name'),
            $request->get('location'),
            $request->get('email'),$id
        ]);

        return back()->with('update','Updated Successfully !');

        // $users->where('id',$id)->update([

        //     'name' => $request->get('name'),
        //     'location' => $request->get('location'),
        //     'email' => $request->get('email')
        // ]);
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
