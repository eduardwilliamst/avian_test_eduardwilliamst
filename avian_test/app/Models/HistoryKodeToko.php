<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryKodeToko extends Model
{
    use HasFactory;
    
    protected $table = 'table_a';
    public $timestamps = false;
    protected $primaryKey = 'kode_toko_baru';

    protected $fillable = [
        'kode_toko_baru',
        'kode_toko_lama',
    ];
}
