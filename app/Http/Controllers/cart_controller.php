<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cookie;
use Auth;
// use Illuminate\HttpFoundation\Cookie;

class cart_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check()) {

            $user = Auth::user();
        }
        else {
            $user = 'Invalid';
        }

        $restaurant = $request->cookie('restaurant');

        if($restaurant == null) {
            return view('cart')->with('user',$user);
        }


         // restaurants data

        $path = storage_path().'/JSON/restaurants.json';

        $JSON_data = file_get_contents($path);
        $restaurants_data = json_decode($JSON_data,true);

        // food data

        $food_path = storage_path().'/JSON/food.json';

        $JSON_data_food = file_get_contents($food_path);
        $food_data = json_decode($JSON_data_food,true);



        // loop for food

        $food_quantities = array();
        $food_ids = array();

        for($i=1; $i<=22; $i++) {

            $food_id_exist = $request->cookie('food_'.$i);

            if($food_id_exist != null) {

                $food_quantities[] = Cookie::get('food_'.$i);

                $food_ids[] = $i;
            }

        }

        $food_name = array();
        $food_price = array();


        // get food name & food price

        for($i=0; $i < count($food_data); $i++) {

            foreach ($food_ids as $key => $value) {

                if($food_data[$i]['id'] == $value) {

                    $food_name[] = $food_data[$i]['name'];
                    $food_price[] = $food_data[$i]['price'];

                }

            }

            
        }


        // get total price

        $total = 0;

        for ($i=0; $i < count($food_name); $i++) { 

            $total += ($food_price[$i] * $food_quantities[$i]);
        }

        // print_r($food_name);
        // print_r($food_price);
        // print_r($food_quantities);


        // loop for restaurants

        $restaurant = explode('/',$restaurant);
        $restaurant_id = ($restaurant)[4];


        for($i=0; $i < count($restaurants_data); $i++) {


            if($restaurants_data[$i]['id'] == $restaurant_id) {

                $restaurant_name = $restaurants_data[$i]['name'];


                // create sessions

                $request->session()->put('restaurant',$restaurant_name);
                $request->session()->put('food_name',$food_name);
                $request->session()->put('food_price',$food_price);
                $request->session()->put('food_quantities',$food_quantities);
                $request->session()->put('total',$total);

                // return to cart page

                return view('cart')->with([
                    'restaurant' => $restaurant_name,
                    'food_name' => $food_name,
                    'food_price' => $food_price,
                    'food_quantities' => $food_quantities,
                    'total' => number_format($total),
                    'user' => $user
                ]);
            }
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
        }
        else {
            $id = 'invalid';
        }

        $path = storage_path().'/JSON/Users/'.$id.'.json';

        $JSON_data = file_get_contents($path);
        $orders = json_decode($JSON_data,true);

        $orders[] = array(

            'order_id' => uniqid(),
            'user_id' => $id,
            'restaurant' => $request->session()->get('restaurant'),
            'food_name' => $request->session()->get('food_name'),
            'food_price' => $request->session()->get('food_price'),
            'food_quantities' => $request->session()->get('food_quantities'),
            'total' => $request->session()->get('total'),
            'reciever_name' => $request->input('name'),                
            'phone' => $request->input('phone'),                
            'address' => $request->input('address'),                
            'name_on_card' => $request->input('name_on_card'),                
            'debit_card_no' => $request->input('debit_card_no'),              
            'expire' => $request->input('expire'),                
            'cvv' => $request->input('cvv'),
            'timestamp' => date("F j, Y, g:i a")
        );


        if(file_put_contents($path, json_encode($orders,JSON_PRETTY_PRINT))) {
            

            // remove sessions

            $request->session()->forget('restaurant');
            $request->session()->forget('food_name');
            $request->session()->forget('food_price');
            $request->session()->forget('food_quantities');
            $request->session()->forget('total');


            // remove cookies

            for ($i=1; $i <= 22 ; $i++) { 

                Cookie::queue(Cookie::Forget('food_'.$i));
            }

            Cookie::queue(Cookie::Forget('restaurant'));


            // return to profile page

            return redirect('profile/'.$id)->with('order','success');
        }

        else {
            return view('index',['error','Something went wrong !']);
        }

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

        for ($i=1; $i <= 22 ; $i++) { 

            Cookie::queue(Cookie::Forget('food_'.$i));
        }

        Cookie::queue(Cookie::Forget('restaurant'));

        return redirect('/home');
    }
}
