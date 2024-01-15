<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected  $fillable =['outlook','direction','floor','ownership',
    'room_number','bath_number','price','place_for_barbecue',
    'parking','left','TV_cable','internet','central_heating','slug','Address','description','Contact_phone','images'];
    
  
    use HasFactory;
    
  
}
