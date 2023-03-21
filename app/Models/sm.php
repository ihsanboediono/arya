<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sm extends Model
{
    use HasFactory;
    protected $table = "sm";
    protected $fillable = ['tgl_sm', 'no_sm', 'pengirim', 'perihal', 'ket_sm', 'file_sm'];
}
