<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    public function hadiahs()
    {
        return $this->hasMany(Hadiah::class);
    }
}
