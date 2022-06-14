<?php

namespace App\Models;

use Foolz\SphinxQL\SphinxQL;
use Foolz\SphinxQL\Helper;
use Foolz\SphinxQL\Drivers\Mysqli\Connection;


class Search
{
    public function market_search($options){
        

        // sql_field_string	= categories
        // sql_field_string	= economic_sectors
        // sql_field_string	= addresses
        // sql_field_string	= services
    
        // sql_attr_string	= name
        // sql_attr_string	= web_address
        // sql_attr_string	= logo
        // sql_attr_string	= latlang
        // sql_attr_string	= location_times
        // sql_attr_uint	= country_id


        $sphinxconn = new Connection();
        $sphinxconn->setParams(array('host' => '127.0.0.1', 'port' => 9306));

        $query = (new SphinxQL($sphinxconn))

        ->select('*')
		->from('market')
        ->where('country_id', $options['country']->ap_id);

        if($options['q'] != ''){
            $query->match(array('services'), SphinxQL::expr('"'.$options['q'].'"/2'));
        }
		if($options['location'] != ''){
            $query->match('addresses', SphinxQL::expr('"'.$options['location'].'"/1'));
        }
        if($options['category'] != ''){
            $query->match('economic_sectors', SphinxQL::expr('"'.$options['category'].'"/1'));
        }
        
        $query->limit(((int)$options['page']-1)*12, 12);
    
        $query->option('max_matches', 500000);

        $query = $query->enqueue((new Helper($sphinxconn))->showMeta());
        $query = $query->enqueue();


        $sphinxRes = $query->executeBatch();
		
		//resultados
		$result['items'] = $sphinxRes->getNext()->fetchAllAssoc();
		//total de resultados
		$result['info'] = $sphinxRes->getNext()->fetchAllAssoc();


        

        return(array('items'=>$result['items'],'info'=>$result['info']));

    }
}
