<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $with = ['author', 'category'];
    protected $fillable = [
        'title',
        'slug',
        'author',
        'content'
    ];
    public function author(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
    public function scopeFilter(Builder $query): void
    {
        if (request('keyword')) {
            $query->where('title', 'like', '%' . request('keyword') . '%');
        }
    }
}
  //     if (request('keyword')) {
            //     $posts->where('title', 'like', '%' . request('keyword') . '%');
            // }