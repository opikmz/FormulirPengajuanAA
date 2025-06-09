<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jaminanM extends Model
{
    use HasFactory;
    protected $table = "jaminan";
    protected $primaryKey = "id_jaminan";
    protected $guarded = [];
}
