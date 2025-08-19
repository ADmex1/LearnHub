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
        'author_id',
        'category_id',
        'content',
        'postimage'
    ];
    public function author(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ??  false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        });
        $query->when($filters['category'] ??  false, function ($query, $category) {
            $query->whereHas(
                'category',
                fn(Builder $query) => $query->where('slug', $category)
            );
        });
        $query->when($filters['author'] ??  false, function ($query, $author) {
            $query->whereHas(
                'author',
                fn(Builder $query) => $query->where('username', $author)
            );
        });
    }
}
  //     if (request('keyword')) {
            //     $posts->where('title', 'like', '%' . request('keyword') . '%');
            // }