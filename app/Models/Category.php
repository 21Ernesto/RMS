<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'key',
        'menu_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
