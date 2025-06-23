<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = ['id', 'title', 'year'];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
