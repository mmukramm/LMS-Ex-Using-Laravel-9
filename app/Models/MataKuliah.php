<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'matakuliah_users', 'matakuliah_id', 'user_id');
    }
}
