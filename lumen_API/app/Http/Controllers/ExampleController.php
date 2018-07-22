<?php

namespace App\Http\Controllers;
use DB;
class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function Index(){
        if(DB::connection()->getDatabaseName())
        {
            echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
        }

    }
    //
}
