<?php

namespace App\Http\Controllers;
/*Importante "A" UpperCase? */
//use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use App\Service;


class AdminController extends Controller{

    public function __construct(){
    $this->middleware('auth');
    }

    public function welcome(){

        $services=Service::all();
        return View::make('admin',['services'=>$services]);
    }

    public function getData(){
        $services=Service::all();

        return $services;

    }

    public function insertData(Request $request){
         try{

            $service=new Service;
            $service->title= $request->input('title');
            $service->description= $request->input('description');
            $service->address= $request->input('address');
            $service->city= $request->input('city');
            $service->zip_code= $request->input('zip_code');
            $service->geo_lat= $request->input('latitude');
            $service->geo_long= $request->input('longitude');
            $service->save();

        }catch(\Illuminate\Database\QueryException $ex){

            Log::info('EN CATCH');
             Log::info($ex);
        }


    }

    public function deleteRow(Request $request){

        $deletedRows=Service::where('id',$request->input('id'))->delete();
        Log::info($deletedRows+"<-Deleted rows");
    }

    public function updateRow(Request $request){
        $service=Service::find($request->input('id'));

        $service->title= $request->input('title');
        $service->description= $request->input('description');
        $service->address= $request->input('address');
        $service->city= $request->input('city');
        $service->zip_code= $request->input('zip_code');
        $service->geo_lat= $request->input('latitude');
        $service->geo_long= $request->input('longitude');
        $service->save();

    }
}

?>
