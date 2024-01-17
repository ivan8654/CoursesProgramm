<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 
						   'duration', 
						   'cost', 
						   'description', 
						   'image',
						   'category_id'];

	public function category() {
		return $this->belongsTo(Category::class);
	}
}
