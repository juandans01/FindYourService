<?php

namespace app\Http\Controllers;
/*Importante "A" UpperCase? */
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Service;

class IndexController extends Controller{


    public function getSelectedData(Request $request){
        $filter_title=$request->input('title');
        $filter_lat=-$request->input('latitude');
        $filter_lat_two=$request->input('latitude');
        $filter_long=$request->input('longitude');
        $max_distance=$request->input('max_distance');


        $services=DB::select(
            DB::raw("select *, (6371 * acos(cos(radians(:filter_lat) )
				* cos(radians(geo_lat) )
				* cos(radians(geo_long)
				- radians(:filter_long))
				+ sin(radians(:filter_lat_two))
				* sin(radians(geo_lat)) ) )
				AS distance
                from services
                where title=:filter_title
                having distance <:max_distance
                order by distance; ")
            ,array('filter_lat' => $filter_lat, 'filter_long' => $filter_long, 'max_distance' => $max_distance, 'filter_title' => $filter_title, 'filter_lat_two' => $filter_lat_two )
        );


        Log::info($services);


        return $services;
    }




}
?>
