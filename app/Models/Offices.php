<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    use SoftDeletes;

    protected $table = "offices";

    protected $primaryKey = 'officeCode';
}
