<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Categorias, Productos, Novedades};

class WebsiteController extends Controller
{
    //
    public function productos(){

        $data = \App\Models\Categorias::all();

        return view('categorias', ['data' => $data]);
    }

    public function empresa(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data, 'active' => 'empresa']);
    }
    public function cart(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data]);
    }

    public function contacto(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data]);
    }

    public function grupo($id) {
        $categoria = Categorias::find($id);
        $categorias = Categorias::all();
        $appends    = [];
        if (request()->has('s')) {
            $appends['s'] = request()->s;
            $productos  = Productos::where(function ($query) {
                $query->orWhere('id',       'like', '%' . request()->s . '%');
                $query->orWhere('busqueda', 'like', '%' . request()->s . '%');
                $query->orWhere('name',     'like', '%' . request()->s . '%');
                $query->orWhere('codigo',   'like', '%' . request()->s . '%');
            });
        } else {
            $productos  = Productos::whereIn('idcategoria', $categorias->pluck('id'));
            /*$productos = $productos->where(function ($query) {
                $query->orWhere('set', -1);
                $query->orWhere('set', 0);
            });*/
        }
        $productos = $productos->orderBy('name')->paginate(15);
        $productos->appends($appends);
        //View::share('active', 'website.productos');
        return view('productos', [
            'selprod'     => '0',
            'categoria' => $categoria,
            'categorias' => $categorias,
            'productos'  => $productos
        ]);
    }

    public function producto($id){

        $categorias = Categorias::all();
        $producto = Productos::find($id);
        $categoria = Categorias::find($producto->idcategoria);
        
        return view('producto', [
            'selprod'     => $id,
            'categoria' => $categoria,
            'categorias' => $categorias,
            'producto'  => $producto
        ]);
    }
}
