<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class SlidersEmpresa extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'sliders_empresa';

    protected $fillable = [
        'id',
        'orden',
        'image',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
}