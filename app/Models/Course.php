<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['id','title', 'category_id', 'subcategory_id', 'fee', 'picture', 'description','status'];

}
