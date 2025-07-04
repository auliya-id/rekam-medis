<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biostatistik extends Model
{
    use HasFactory;

    protected $table = 'biostatistik';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
