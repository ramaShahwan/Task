<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected  $fillable =['image_name','image_url','estate_id'];
    public function images()
    {
        return $this->belongsTo(Estate::class);
    }
}
