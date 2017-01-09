<?php

namespace App\Http\Controllers;
/*Importante "A" UpperCase? */
//use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use App\Service;


class AdminController extends Controller{

    public function welcome(){

        $services=Service::all();
        return View::make('admin',['services'=>$services]);
    }

    public function insertData(){

        $service=new Service;
        $service->title="peluqueria";
        $service->description="para cortar barba";
        $service->address="Callao 123";
        $service->city="CABA";
        $service->zip_code="12143";
        $service->geo_lat=1234.12;
        $service->geo_long=4321.21;
        $service->save();
    }
}

?>
