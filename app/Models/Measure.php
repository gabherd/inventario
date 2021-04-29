<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    use HasFactory;

	protected $fillable = ['measure'];
    protected $table = 'measure';
	public $timestamps = false;
    
}