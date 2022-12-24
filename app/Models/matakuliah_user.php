<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah_user extends Model
{
    use HasFactory;
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
