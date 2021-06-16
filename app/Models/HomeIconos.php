<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class HomeIconos extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'home_iconos';

    protected $fillable = [
        'id',
        'titulo',
        'subtitulo',
        'foto',
        'id_home',
        'color',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
}