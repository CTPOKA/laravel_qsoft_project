<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }

    public function count(): Attribute
    {
        return Attribute::get(fn () => $this->cars()->withPivot('count')->sum('count'));
    }

    public function totalCost(): Attribute
    {
        return Attribute::get(fn () => $this->cars()->withPivot(['cost', 'count'])->sum(DB::raw('cost * count')));
    }

    public function scopeUnpaid(Builder $query): Builder
    {
        return $query->where('status', '!=', 'Оплачен');
    }
}
