<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name','rollno','maths','end','science','hindi','urdu','class','image'];

    public $timestamps = false;
 
    
    public function getimageAttribute()
    {
        return  asset('storage/' . $this->attributes['image']);
    }
    
}
