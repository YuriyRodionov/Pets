<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalType extends Model
{
    use HasFactory;

    protected $table = 'animal_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $guarded = [
        'name',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'animal_type_id', 'id');
    }

    public $timestamps = false;
}
