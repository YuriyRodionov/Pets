<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'user_id',
        'address',
        'description',
        'animal_type_id',
        'price',
        'status'
    ];

    public function user(): hasMany
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function animalType(): hasMany
    {
        return $this->hasMany(AnimalType::class, 'id', 'animal_type_id');
    }
}
