<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}