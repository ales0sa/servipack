<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class Categorias extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'categorias';

    protected $fillable = [
        'id',
        'title',
        'image',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }

    public function productos(){
        return $this->hasMany(Productos::class, 'idcategoria');
    }

    public function subcategorias(){
        return $this->hasMany(Subcategories::class, 'category_id');
    }

}