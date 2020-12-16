<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = "surat";

    protected $fillable = [
        'id_pengirim',
        'tujuan_surat',
        'tujuan_instansi',
        'tanggal_surat',
        'kode_surat',
        'perihal_surat',
        'created_at',
        'updated_at'
    ];

    public function bagian(){
        return $this->belongsTo(Bagian::class,'id_pengirim', 'id');
    }
}
