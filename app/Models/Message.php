<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'from',
        'to',
        'text'
    ];

    public function from(): hasMany
    {
        return $this->hasMany(User::class, 'id', 'from');
    }

    public function to(): hasMany
    {
        return $this->hasMany(User::class, 'id', 'to');
    }

    public function fromContact() {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
