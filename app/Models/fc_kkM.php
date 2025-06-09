<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fc_kkM extends Model
{
    use HasFactory;
          protected $table = "berkas_kk";
    protected $primaryKey = "id_kk";
    protected $guarded = [];
}
