<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denahRumahM extends Model
{
    use HasFactory;
        protected $table = "denah_rumah";
    protected $primaryKey = "id_denah_rumah";
    protected $guarded = [];
}
