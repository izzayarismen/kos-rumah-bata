<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'date',
        'is_pinned',
        'status',
        'sort_order'
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'date' => 'date'
    ];
}