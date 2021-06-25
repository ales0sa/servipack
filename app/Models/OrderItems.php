<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class OrderItems extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'order_items';

    protected $fillable = [
        'id',
        'order_id',
        'title',
        'total',
        'quantity',
        'input_5',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
}