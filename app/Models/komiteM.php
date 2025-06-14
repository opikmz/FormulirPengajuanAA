<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komiteM extends Model
{
    use HasFactory;
    protected $table = 'komite';
    protected $primaryKey = 'id_komite';
    protected $guarded = [];
}
