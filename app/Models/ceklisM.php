<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ceklisM extends Model
{
    use HasFactory;
        protected $table = "ceklis";
    protected $primaryKey = "id_ceklis";
    protected $guarded = [];
}
