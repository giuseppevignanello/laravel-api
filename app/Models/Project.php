<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'duration', 'start_date', 'end_date', 'slug', 'repo_link', 'view_link', 'type_id', 'image'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies(): BelongsToMany
    {

        return $this->belongsToMany(Technology::class, '_project__technology');
    }
}