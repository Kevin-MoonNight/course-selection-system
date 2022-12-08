<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory, HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'chair',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
