<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table='student';
    protected $fillable =[
        'full_name','email','gender','date_of_birth','country_code'
    ];

    public function countries(){
        $this->belongsTo(Country::class);
    }
}
