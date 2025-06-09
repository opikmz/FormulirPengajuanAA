<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penghasilanPengeluaranM extends Model
{
    use HasFactory;
    protected $table = "penghasilan_pengeluaran";
    protected $primaryKey = "id_penghasilan_pengeluaran";
    protected $guarded = [];


}