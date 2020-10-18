<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = "bagian";

    public function surat(){
        return $this->belongsTo(Surat::class);
    }
}
