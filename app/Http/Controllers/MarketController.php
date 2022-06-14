<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Country;

class MarketController extends Controller
{
    public function home($country)
    {

        $country_obj = new Country();
        $country = $country_obj->get_country($country);



        $meta = array(
            'title'=> 'home',
            'description'=> 'description',
            'robots'=> 'index,follow',
            'bodyclass' => 'home'
        );

        return view('homemarket', ['country' => $country, 'meta' => $meta]);

    }


}
