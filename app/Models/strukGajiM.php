<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strukGajiM extends Model
{
    use HasFactory;
    protected $table = "struk_gaji";
    protected $primaryKey = "id_struk_gaji";
    protected $guarded = [];
}
