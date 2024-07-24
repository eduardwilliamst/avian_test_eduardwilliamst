<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    use HasFactory;

    protected $fillable = ['toko_id', 'doc_number', 'received', 'received_date', 'failed_reason'];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
