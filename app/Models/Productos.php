<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;

use Auth;

class Productos extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'productos';

    protected $fillable = [
        'id',
        'input_1',
        'input_2',
        'input_3',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
    public function GetClientPriceAttribute(){


        if(!$this->price){
            return 0;
        }
        



        if(Auth::check()){

            $userid = Auth::user()->id;
            $user    = \Ales0sa\Laradash\Models\User::with('roles')->find($userid);
            //dd($u);
            if($user->hasRole(['mayorista'])){


                return $this->price_bc;
                
            }else{
                
                return $this->price;
            }
        
        }


        
        return 1;

    }

    public function GetCattitleAttribute(){
        
        $sc = Subcategories::find($this->idcategoria);
        $pc = Categorias::find($sc->category_id);
        return $pc->title;
    }
    public function GetScattitleAttribute(){
        
        $sc = Subcategories::find($this->idcategoria);
       
        return $sc->name;
    }
    public function GetPcatIdAttribute(){
        
        $sc = Subcategories::find($this->idcategoria);
        return $sc->category_id;
    }
}