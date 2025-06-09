<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkas_ktp_istriM extends Model
{
    use HasFactory;
        protected $table = "berkas_ktp_istri";
    protected $primaryKey = "id_berkas_ktp_istri";
    protected $guarded = [];
}
