<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanKomiteM extends Model
{
    use HasFactory;
     protected $table = 'pesan_komite';
    protected $primaryKey = 'id_pesan_komite';
    protected $guarded = [];
}

