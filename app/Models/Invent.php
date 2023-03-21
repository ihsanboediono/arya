<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invent extends Model
{
    use HasFactory;
    protected $table = "Invent";
    protected $fillable = ['nama_barang', 'jml_barang', 'kondisi_barang'];
}
