<?php

namespace App\Models;

use App\Contracts\HasTagsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Car extends Model implements HasTagsContract
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'old_price',
        'body',
        'salon',
        'kpp',
        'year',
        'color',
        'is_new',

        'car_engine_id',
        'car_class_id',
        'car_body_id',
    ];

    public function carClass(): BelongsTo
    {
        return $this->belongsTo(CarClass::class, 'car_class_id');
    }

    public function carEngine(): BelongsTo
    {
        return $this->belongsTo(CarEngine::class, 'car_engine_id');
    }

    public function carBody(): BelongsTo
    {
        return $this->belongsTo(CarBody::class, 'car_body_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
