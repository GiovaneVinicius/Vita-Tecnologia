<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $primaryKey = 'productCode';

    protected $keyType = "string";

    protected $fillable = [
        'productName',
        'productLine',
        'productScale',
        'productVendor',
        'productDescription',
        'quantityInStock',
        'buyPrice',
        'MSRP',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $numero = rand(1000, 9999); // gera um número aleatório entre 1000 e 9999
            $numero2 = rand(1000, 9999); // gera um número aleatório entre 1000 e 9999
            $model->productCode = "S{$numero}_{$numero2}"; // concatena a string constante com o número e o ano
        });
    }
}
