<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VentasDetalle extends Model
{
    use SoftDeletes;
    protected $table = 'ventasdetalle';
}
