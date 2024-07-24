<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSales extends Model
{
    use HasFactory;
    
    protected $table = 'table_d';
    public $timestamps = false;
    protected $primaryKey = 'kode_sales';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_sales',
        'nama_sales',
    ];
}
