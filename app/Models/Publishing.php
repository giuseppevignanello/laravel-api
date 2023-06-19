<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Publishing extends Model
{
    use HasFactory;

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    protected $fillable = ['name', 'slug', 'image', 'start_date', 'location', 'type'];
}
