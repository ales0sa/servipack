<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class TextosCart extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'textos_cart';

    protected $fillable = [
        'id',
        'retirolocal',
        'caba',
        'expreso',
        'datos_bancarios',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
}