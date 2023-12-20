<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    use HasFactory;
    protected $fillable = ['id_matakuliah', 'nama_matakuliah', 'sks', 'semester'];
    protected $table = 'matakuliah';
    public $timestamps = false;
}
