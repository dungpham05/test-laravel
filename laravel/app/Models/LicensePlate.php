<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * LicensePlate class
 */
class LicensePlate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'license_plates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'number_search',
        'number_find',
        'content'
    ];
}
