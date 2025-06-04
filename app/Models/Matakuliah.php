<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $fillable = ['nama', 'kode_mk', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}
