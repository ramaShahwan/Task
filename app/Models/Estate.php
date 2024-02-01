<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Estate extends Model
{
    protected  $fillable =['outlook','direction','floor','ownership',
    'room_number','bath_number','price','place_for_barbecue',
    'parking','left','TV_cable','internet','central_heating','slug','Address','description','Contact_phone','user_id'];
    
  
    use HasFactory;
     
    public function images(): HasMany
{
    return $this->hasMany(Image::class,'estate_id');
}

public function users(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}
