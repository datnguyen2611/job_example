<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table= 'countries';
    protected $fillable = [
        'name','code','continent_name'
    ];
    public function students(){
        return $this->belongsTo(Student::class);
    }
}
