<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Productlines extends Model
{
    use SoftDeletes;

    protected $table = "productlines";

    protected $primaryKey = 'productLine';
    
    protected $keyType = "string";
}
