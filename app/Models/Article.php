<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'published_at',
        'slug' //Временное решение
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $slug = Str::slug($article->title);

            $count = Article::where('slug', $slug)
                ->orWhere('slug', 'like', $slug . '_%')
                ->where('id', '!=', $article->id ?? null)
                ->count();
            
            if ($count > 0) {
                $slug .= '_' . ($count + 1);
            }

            $article->slug = $slug;
        });
    }
}
