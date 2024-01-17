<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['full_name', 
						   'email', 
						   'course_id', 
						   'application_date', 
						   'status'];
}
