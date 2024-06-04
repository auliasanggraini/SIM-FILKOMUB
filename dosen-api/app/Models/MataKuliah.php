<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = ['kode_mata_kuliah', 'nama_mata_kuliah', 'jam_kuliah', 'kelas'];

    public function dosens()
    {
        return $this->hasMany(Dosen::class);
    }
}