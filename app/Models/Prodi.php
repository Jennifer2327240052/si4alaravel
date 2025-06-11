<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodis'; // pastikan ini

    protected $fillable = [
        'nama',
        'singkatan',
        'kaprodi',
        'sekretaris',
        'fakultas_id',
    ];
    
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
