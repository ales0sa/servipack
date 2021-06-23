<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Categorias, Productos, Novedades, Subcategories, User};
use Auth;

use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    //
    public function productos(){

        $data = \App\Models\Categorias::all();

        return view('categorias', ['data' => $data]);
    }
    public function clientes(){

        $data = \App\Models\Clientes::all();

        return view('clientes', ['data' => $data]);
    }
    public function novedades(){

        $data = \App\Models\Novedades::all();

        return view('novedades', ['data' => $data]);
    }
    public function empresa(){

        $data = \App\Models\Empresa::find(1);

        return view('empresa', ['data' => $data, 'active' => 'empresa']);
    }
    public function cart(){

        $data = \App\Models\Empresa::find(1);

        return view('cart', ['data' => $data]);
    }

    public function contacto(){

        $data = \App\Models\Empresa::find(1);

        return view('contacto', ['data' => $data]);
    }

    public function grupo($id) {
        $categoria = Categorias::find($id);
        
        $categorias = Categorias::all();
        return view('productos', [
            'selcat'     => $id,
            'categoria' => $categoria,
            'categorias' => $categorias
        ]);
    }

    public function subgrupo($id){

        
        $sc = Subcategories::find($id);
        //dd($sc);

        $categorias = Categorias::all();
        $productos  = Productos::where('idcategoria', $id)->get();
        return view('subcat', [
            'sc'     => $id,
            'subcat' => $sc,
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

    public function clientarea(){

        return view('clientarea');

    }


    public function vuelogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
          $user                  = Auth::user();
          $username = $user->name;
          return response()->json([
            'status'   => 'success',
            'user' => $username,
          ]); 
        } else { 
          return response()->json([
            'status' => 'error',
            'user'   => 'Unauthorized Access'
          ]); 
        } 
    }

    public function vuereg(Request $request){

        $v = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->name   = $request->name;
        $user->username = $request->email;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return response()->json(['status' => 'success'], 200);

    }

    public function cartData(Request $request){


        //dd($request->all());
        $exp = explode(',', $request->ids);

        $data = Productos::whereIn('id', $exp)->get(['id', 'image', 'price', 'price_bc', 'name', 'unit']);

        $data->each->append('client_price');

        return $data;

    }

}
