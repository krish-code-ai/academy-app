<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Success_stories extends Model
{
    protected $table = 'success_stories';

    protected $fillable = ['id','name', 'profile', 'message','status', 'professional'];
}
