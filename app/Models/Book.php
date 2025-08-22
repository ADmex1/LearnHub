<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $with = ['author', 'category'];
    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'description',
        'category_id',
        'file_path',
    ];
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

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //     if (request('keyword')) {
    //     $posts->where('title', 'like', '%' . request('keyword') . '%');
    // }
}
