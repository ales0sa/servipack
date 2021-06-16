<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function productos(){

        $data = \App\Models\Categorias::all();

        return view('categorias', ['data' => $data]);
    }

    public function empresa(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data]);
    }
    public function cart(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data]);
    }

    public function contacto(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data]);
    }
}
