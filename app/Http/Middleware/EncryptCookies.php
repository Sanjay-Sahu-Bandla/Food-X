<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */

    // public function __construct() {
    // 	$food = 'food_1';

    // 	for($i=0; $i<22; $i++) {
    // 	// $food[] = 'food_'.$i;
    // 	}
    // }


    protected $except = [
    	'restaurant',
    	'food_1',
    	'food_2',
    	'food_3',
    	'food_4',
    	'food_5',
    	'food_6',
    	'food_7',
    	'food_8',
    	'food_9',
    	'food_10',
    	'food_11',
    	'food_12',
    	'food_13',
    	'food_14',
    	'food_15',
    	'food_16',
    	'food_17',
    	'food_18',
    	'food_19',
    	'food_20',
    	'food_21',
    	'food_22',
    ];
}
