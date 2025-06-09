<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembiayaanM extends Model
{
    use HasFactory;
     protected $table = "pembiayaan";
    protected $primaryKey = "id_pembiayaan";
    protected $guarded = [];
}
