<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentItem extends Model
{
    protected $fillable = [
        'section',
        'locale',
        'title',
        'description',
        'image',
        'sort_order',
    ];
}
