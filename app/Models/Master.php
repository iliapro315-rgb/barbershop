<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Master extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialization', 'experience_years', 'bio', 'photo'];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}