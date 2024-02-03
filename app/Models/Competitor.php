<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;
    protected $table = 'competitors';
    public $primaryKey = ['user_id', 'round_id'];

    public $timestamps = false;
    public $incrementing = false;

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function round(){
        return $this->belongsToMany('App\Models\Round');
    }

}
