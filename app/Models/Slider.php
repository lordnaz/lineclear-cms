<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    protected $fillable = [
        'sort_value',
        'image_path_desktop',
        'image_path_mobile',
        'external_link',
        'updated_by',
        'active',
        'created_at',
        'updated_at',
    ];
}
