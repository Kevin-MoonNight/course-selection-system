<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory, HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'credit',
    ];

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }
}
