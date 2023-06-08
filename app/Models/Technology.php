<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function projects(): BelongsToMany
    {

        return $this->belongsToMany(Project::class, '_project__technology');
    }
}
