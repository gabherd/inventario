<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
	protected $fillable = ['nameModel', 'id_brand'];
	
    use HasFactory;
}