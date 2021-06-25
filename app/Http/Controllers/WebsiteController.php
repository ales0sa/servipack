<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Categorias, Productos, Novedades, Subcategories, User, Orders, OrderItems};
use Auth;
use \MercadoPago\SDK;
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

        $featuredPosts = \App\Models\Novedades::all();
        $posts         = \App\Models\Novedades::paginate();
        $tags          = ['tag1', 'tag2', 'tag3'];

        return view('novedades', ['featuredPosts' => $featuredPosts, 'posts' => $posts, 'tags' => $tags]);
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

    public function createPreference(Request $request){


        $carrito       = json_decode($request->cart);

        $total         = 0;
        $mp            = 0;

        $orden         = new Orders;
        //$orden->nombre = Auth::user()->name;
        $orden->pago   = $request->fde;
        $orden->envio  = $request->fdp;

        $orden->save();


        foreach($carrito as $item){
            if($item->itemId){
                
                $tprod = Productos::find($item->itemId);
                $oi = new OrderItems;
                $oi->order_id = $orden->id;
                $oi->title = $tprod->name;
                $oi->quantity = $item->qty;
                $oi->total = $tprod->client_price * $item->qty;
                $oi->save();

            }
      
        }

        if($request->fdp == 2){


            \MercadoPago\SDK::initialize();

            $mpconfig = \MercadoPago\SDK::config();

            $mpconfig->set('CLIENT_SECRET', "SsCHoz6C9ak8ldwUFGThfyQWoHKAqfFd");
            $mpconfig->set('CLIENT_ID', "3567431617030046");
            $mpconfig->set('ACCESS_TOKEN', 'APP_USR-3567431617030046-102815-1c5c87a31d448a05bc00ea02b06ed910-321314813');
            $mpconfig->set('sandbox_mode', "false");
           
            $preference = new \MercadoPago\Preference();


            foreach($carrito as $item){
                if($item->itemId){
                    $tprod = Productos::find($item->itemId);

                    $oi = new OrderItems;
                    $oi->order_id = $orden->id;
                    $oi->title = $tprod->name;
                    $oi->quantity = $item->qty;
                    $oi->total = $tprod->client_price * $item->qty;
                    $oi->save();
            
                    $total += $oi->total;
            
                    $pfo[] = [
                        'id' => $tprod->id,
                        'category_id' =>  'factory',
                        'title' => $tprod->name,
                        'description' => $tprod->short_desc,//$item['instrucciones'],
                        'quantity' => $item->qty,
                        'currency_id' => 'ARS',
                        'unit_price' =>  intval($tprod->client_price * $item->qty)
                    ];
                }
              }


              $preference->items = $pfo; 
              $preference->external_reference = $orden->id;
              $preference->notification_url = 'https://servipack.osolelaravel.com/hook';
              $preference->save(); 
              $orden->total = $total;
              $orden->save();
      
              return ['status' => 'success', 'oc' => $orden, 'mp' => $preference->init_point ]; 
        }
    

        return ['status' => 'success', 'oc' => $orden ]; 

    }

}
