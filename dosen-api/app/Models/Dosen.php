<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nip', 'nama_dosen', 'jenis_kelamin', 'tanggal_lahir', 'fakultas', 'departemen', 'mata_kuliah_id'];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}