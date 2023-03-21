<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sk extends Model
{
    use HasFactory;
    protected $table = "sk";
    protected $fillable = ['tgl_sk', 'no_sk', 'tujuan', 'perihal_sk', 'ket_sk', 'file_sk'];
}
