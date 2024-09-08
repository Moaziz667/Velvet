<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $fillable = ['user_id','product_id','rate'];
    use HasFactory;
}
