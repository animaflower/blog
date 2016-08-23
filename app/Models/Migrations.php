<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migrations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'migrations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['migration', 'batch'];
}
