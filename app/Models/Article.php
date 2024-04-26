<?php

namespace App\Models;

use App\Contracts\HasTagsContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Article extends Model implements HasTagsContract
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'published_at',

        'image_id',
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

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image?->url ?: '/assets/images/no_image.png');
    }
}
