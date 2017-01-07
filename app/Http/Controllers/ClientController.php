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

class ClientController extends Controller{


    public function getSelectedData(Request $request){
        $title=$request->input('title');
        Log::info($title);

        $services=Service::where('title',$title)->get();
        Log::info($services);

        return $services;
    }




}
?>
