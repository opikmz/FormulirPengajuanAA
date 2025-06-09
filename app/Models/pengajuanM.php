<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuanM extends Model
{
    use HasFactory;
     use HasFactory;
    protected $table = "pengajuan";
    protected $primaryKey = "id_pengajuan";
    protected $guarded = [];
}
