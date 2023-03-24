<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use SoftDeletes;

    protected $table = "orderdetails";

    protected $primaryKey = 'orderNumber';
}
