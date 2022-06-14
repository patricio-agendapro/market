<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Models\Search;
use App\Models\Country;

class SearchController extends Controller
{
    public function search(Request $request,$country){
        
        $country_obj = new Country();
        $country = $country_obj->get_country($country);
        if($country == NULL){
            abort(404);
        }

        $options = array(
            'q'=> ($request->has('q')) ? $request->input('q') : '',
            'location'=> ($request->has('location')) ? $request->input('location') : '',
            'category'=> ($request->has('category')) ? $request->input('category') : '',
            'page'=> ($request->has('page')) ? $request->input('page') : 1,
            'country' => $country
        );

        $results = $this->searcher($options);

        $meta = array(
            'title'=> 'Busqueda',
            'description'=> 'Busca entre miles de profesionales',
            'robots'=> 'noindex,nofollow',
            'bodyclass' => 'search'
        );

        return view('search', ['results' => $results, 'country' => $country, 'meta' => $meta, 'search_options' => $options]);
    }

    public function searcher($options)
    {
        $search_obj = new Search();
        $results = $search_obj->market_search($options);

        $out = array();
        
        for($i=0;$i<count($results['items']);$i++){

            $results['items'][$i]['economic_sectors'] = implode(" - ",json_decode($results['items'][$i]['economic_sectors']));


            $results['items'][$i]['categories'] = myTruncate(implode(" - ",array_slice(json_decode($results['items'][$i]['categories']),0,7)),90);
            $results['items'][$i]['web_address'] = 'https://'.$results['items'][$i]['web_address'].'.agendapro'.$options['country']->domain;
            if($results['items'][$i]['logo'] != ''){
                $results['items'][$i]['logo'] = config('app.ap_cdn').$results['items'][$i]['logo'];
            }else{
                $results['items'][$i]['logo'] = "https://dcx13p9dsx90t.cloudfront.net/assets/logo_vacio_new-6aa8dfd190ad63ab2acc8062432b7efb2fa748701447dd87c9fae9ade8f8744d.png";
            }
            
            

            $services_order = array();

            $services = json_decode($results['items'][$i]['services']);

            if($services){
                for($j=0;$j<count($services);$j++){
                
                    $service = $services[$j];
                    $service_info = explode(' :|: ',$service);
                    $arr1 = explode(" ",strtolower(eliminar_tildes($options['q'])));
                    $arr2 = explode(" ",strtolower(eliminar_tildes($service)));
                    $result = array_intersect($arr1 , $arr2 ); //matched elements
                    $num = count($result); //number of matches
                    similar_text(strtolower($options['q']),strtolower($service_info[0]),$percent);
                    $description = myTruncate(trim(ucfirst($service_info[1])),255);
                    if($description != ''){
                        $description = ': '.$description;
                    }
                    $services_order[] = array('service' => trim(ucfirst($service_info[0])), 'description' => $description,'score' => ($num+1)*($percent/100));
    
                }
                usort($services_order, function($x, $y) {
                    return $y['score'] <=> $x['score'];
                });
            }else{
                $services_order[] = array('service' => '', 'description' => '');
            }



            $results['items'][$i]['h3'] = array_slice($services_order, 1, 3);

            $results['items'][$i]['services'] = $services_order;

            $results['items'][$i]['locations_id'] = json_decode($results['items'][$i]['locations_id']);

            $results['items'][$i]['image_map'] = json_decode($results['items'][$i]['image_map']);

            $results['items'][$i]['location_times'] = json_decode($results['items'][$i]['location_times']);

            $results['items'][$i]['latlng'] = json_decode($results['items'][$i]['latlng']);


            $addresses = json_decode($results['items'][$i]['addresses'], true);
            $address_out = array();
            $address_order = array();

            for($j=0;$j<count($addresses);$j++){
                
                $address = $addresses[$j];
                //print_r($address);
                $address_array = array();
                
                $address_text = "";
                if(count($address) > 2){
                    $address_text = trim($address[1]["long_name"]." ".$address[0]["long_name"]);
                    for($k=2;$k<count($address);$k++){
                        if(($address[$k]["types"][0] != "postal_code") && ($address[$k]["types"][0] != "country")){
                            $address_array[] = $address[$k]["long_name"];
                        }
                    }
                }
                $address_text = $address_text.', '.implode(", ",array_unique($address_array));


                //print_r( $results['items'][$i]['location_times'][$j]);

                $days = explode("|",$results['items'][$i]['location_times'][$j]);
                foreach($days as $day){
                    $time = explode(",",$day);
                    if(array_key_exists(0,$time) && array_key_exists(1,$time)){
                        $shedule[$time[0]] = $time[1];
                    }
                    
                }

                if($options["location"] != ""){
                    $arr1 = explode(" ",strtolower(eliminar_tildes($options['location'])));
                    $arr2 = explode(" ",eliminar_tildes(strtolower(implode(" ",$address_array))));
                    $result = array_intersect($arr1 , $arr2 ); //matched elements
                    $num = count($result);

                    $address_out[] = array('address' => trim(ucfirst($address_text)),'latlng'=>$results['items'][$i]['latlng'][$j],'location_id'=>$results['items'][$i]['locations_id'][$j],'location_times'=>$shedule,'image_map'=>$results['items'][$i]['image_map'][$j],'score' => $num);
                    

                    usort($address_out, function($x, $y) {
                        return $y['score'] <=> $x['score'];
                    });
                }else{
                    $address_out[] = array('address' => trim(ucfirst($address_text)),'latlng'=>$results['items'][$i]['latlng'][$j],'location_id'=>$results['items'][$i]['locations_id'][$j],'location_times'=>$shedule,'image_map'=>$results['items'][$i]['image_map'][$j]);
                }

            }
            $results['items'][$i]['locations_out'] = array_slice($address_out, 0, 2);
        }
        $total = 0;
        foreach($results['info'] as $info){  
            if($info['Variable_name'] == 'total'){
                $total = (int)$info['Value'];
            }
        }

        $options_temp = $options;
        unset($options_temp['country']);
        unset($options_temp['page']);

        if(search_url_query_replacer($options_temp,'','') != ''){
            $url_base = url('/').'/'.$options['country']->id.'/market/search'.search_url_query_replacer($options_temp,'','').'&';
        }else{
            $url_base = url('/').'/'.$options['country']->id.'/market/search'.search_url_query_replacer($options_temp,'','').'?';
        }


        $pagination = make_span_html_mobile($url_base,$total,$options['page'], 12);

        $html = view('search_item', ['items' => $results['items']])->render();

        return(['results' => $html, 'pagination' => $pagination, 'total' => $total]);

    }

}
