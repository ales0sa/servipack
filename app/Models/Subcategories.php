<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ales0sa\Laradash\Models\CrudBase;



class Subcategories extends Model
{
    use SoftDeletes;
    use CrudBase;

    protected $table = 'subcategories';

    protected $fillable = [
        'id',
        'order',
        'name',
        'category_id',

    ];
    protected $casts = [

    ];
    public static function boot() {
        parent::boot();


    }
}