<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Red;
use Illuminate\Http\Request;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Socio;
use App\Models\Formato;
use PDF;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index(){

/////////Tabla_1
        $num_peliculas = Pelicula::all()->count();
        $num_alquileres = Alquiler::all()->count();
        $num_generos = Genero::all()->count();
		$num_usuarios = Socio::all()->count();
        $num_actores = Actor::all()->count();
        $num_directores = Director::all()->count();
        $num_formatos = Formato::all()->count();

        /*Tabla=1*/
        $directores = Director::all();
        $data = [];
        foreach( $directores as $directores){
            $data['label'][] = $directores->dir_nombre;
            $data['data'][] = Pelicula::all()->where('dir_id',$directores->id)->count();
        }
        $data['data'] = json_encode($data);

     
        return view('admin.index', $data,[
            'num_peliculas'=>$num_peliculas,
            'num_alquileres'=>$num_alquileres,
            'num_generos'=>$num_generos,
            'num_actores'=>$num_actores,
			'num_usuarios'=>$num_usuarios,
			'num_directores'=>$num_directores,
            'num_formatos'=>$num_formatos,
        ]);
           
        $genero = Genero::all();
        $input = [];
        foreach( $genero as $genero){
            $input['label'][] = $genero->gen_nombre;
            $input['data'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
        }
        $input['data'] = json_encode($input);
    
        return view('admin.index', $input,[
            'num_peliculas'=>$num_peliculas,
            'num_alquileres'=>$num_alquileres,
            'num_generos'=>$num_generos,
            'num_actores'=>$num_actores,
			'num_usuarios'=>$num_usuarios,
			'num_directores'=>$num_directores,
            'num_formatos'=>$num_formatos,
        ]);
     

    }
    public function pdf()
    {
        $libro
    }
}