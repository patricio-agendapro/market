<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Landing extends Model
{
    public function get_landing($country,$slug)
    {
        $value = Cache::get('landing_'.$country.'_'.$slug, function() use ($slug,$country) {
            $landing = DB::table('landings')->where('id_country', $country)->where('slug', $slug)->first();
            Cache::store('octane')->put('landing_'.$country.'_'.$slug, $landing, 3600); // 10 Minutes
            return($landing);
        });
        return($value);
    }
}
