<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class Novedades extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'novedades';

    protected $fillable = [
        'id',
        'input_2',
        'input_1',
        'input_3',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
}