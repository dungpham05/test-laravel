<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Blog class
 */
class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'content',
        'slug'
    ];
}
