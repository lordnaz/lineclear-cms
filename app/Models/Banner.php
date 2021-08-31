<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banners';

    protected $fillable = [
        'sort_value',
        'image_path',
        'type',
        'updated_by',
        'active',
        'created_at',
        'updated_at',
    ];
}
