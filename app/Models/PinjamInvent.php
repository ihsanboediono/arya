<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamInvent extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_pinjam', 'peminjam',  'file_pinjam', 'status_kembali', 'tgl_kembali'];
}
