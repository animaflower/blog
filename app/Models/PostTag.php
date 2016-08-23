<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_tag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'tag_id', 'created_at', 'updated_at'];
}
