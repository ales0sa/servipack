<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class Empresa extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'empresa';

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
}