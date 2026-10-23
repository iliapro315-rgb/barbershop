<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'duration',
        'master_id',
        'is_available',
        'cover',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];

    public function master()
    {
        return $this->belongsTo(Master::class);
    }

    // Поиск
    public function scopeSearch($query, ?string $term)
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%");
        });
    }

    // Только доступные
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }
}