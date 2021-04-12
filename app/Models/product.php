<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    
    public function image()
	{
		return $this->hasMany(prod_image::class,'p_id','id');
	}

	public function cat()
	{
		return $this->hasMany(cat_detail::class,'pro_id','id');
	}
}
