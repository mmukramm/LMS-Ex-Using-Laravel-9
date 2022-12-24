<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'kelas_users', 'kelas_id', 'user_id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
