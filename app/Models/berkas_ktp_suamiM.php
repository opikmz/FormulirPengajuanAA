<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkas_ktp_suamiM extends Model
{
    use HasFactory;
    protected $table = "berkas_ktp_suami";
    protected $primaryKey = "id_berkas_ktp_suami";
    protected $guarded = [];
}
