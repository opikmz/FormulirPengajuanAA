<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkas_jaminanM extends Model
{
    use HasFactory;
    protected $table = "berkas_jaminan";
    protected $primaryKey = "id_berkas_jaminan";
    protected $guarded = [];
}
