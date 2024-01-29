<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected  $fillable =['image_name','estate_id'];
    use HasFactory;

    public function estates():BelongsTo
    {
        return $this->belongsTo(Estate::class);
    }
}
