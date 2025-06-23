<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $table = 'gallery_images';

    protected $fillable = ['id', 'gallery_id', 'image_path', 'thumbnail_path'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
