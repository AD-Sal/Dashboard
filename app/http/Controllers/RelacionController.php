<?php


namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Pelicula;



use Illuminate\Http\Request;

class RelacionController extends Controller
{
    public function web (){
        
        $productos = Director::all();
        return view('welcome',compact('productos'));
    }
}

