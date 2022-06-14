<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Country extends Model
{
    public function get_country($id_country)
    {
        $value = Cache::get('country_'.$id_country, function() use ($id_country) {
            $country = DB::table('countries')->where('id', $id_country)->first();
            Cache::store('octane')->put('country_'.$id_country, $country, 3600);
            return($country);
        });
        return($value);

    }
}
