<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class Orders extends Model
{
    use CrudBase;

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'title',
        'total',
        'nombre',
        'telefono',
        'direccion',
        'envio',
        'pago',
        'estado',
        'description',

    ];
    protected $casts = [
        'envio' => 'string',
        'pago'=> 'string'

    ];
    public static function boot() {
        parent::boot();


    }

    public function items(){
        return $this->hasMany(OrderItems::class, 'order_id');
    }
}