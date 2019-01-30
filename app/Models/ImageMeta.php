<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMeta extends Model
{
    protected $table = 'image_metas';

    protected $fillable = [
    	'url',
    	'title',
    	'caption',
    	'alt',
    	'description'
    ];

    public function imagemeta()
    {
        return $this->morphTo();
    }
}
