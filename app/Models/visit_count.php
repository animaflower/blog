<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visit_count extends Model
{
    protected $table='visit_count';
    protected $fillable=['ip'];
}
