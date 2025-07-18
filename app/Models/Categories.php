<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];
    public function posts(): HasMany
    {
        return $this->HasMany(Post::class);
    }
}
