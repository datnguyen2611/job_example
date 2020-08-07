<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table='student';
    protected $fillable =[
        'full_name','images','email','gender','date_of_birth','country_id'
    ];

    public function countries(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
