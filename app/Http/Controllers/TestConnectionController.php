<?php

namespace app\Http\Controllers;

/*Importante "A" UpperCase? */
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Database\QueryException;

class TestConnectionController extends Controller{

    public function testConnection(){

        if(DB::connection()->getDatabaseName())
        {
            Log::info("connected successfully to database ".DB::connection()->getDatabaseName());
        }else{
            Log::info("no me conecte a la base de datos");
        }


        try{
            //$title = DB::table('services')->where('title', 'bicicleteria')->value('title');
            //return View::make('test', ['title'=>$title]);
            $rows=DB::select('select * from services');
            return View::make('test', ['rows'=>$rows]);

        }catch(\Illuminate\Database\QueryException $ex){

            Log::info('EN CATCH');

        }


    }
}
