<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $table = 'competitions';
    public $primaryKey = ['name', 'year'];

    public $timestamps = false;
    public $incrementing = false;

    public function round(){
        return $this->hasMany('App\Models\Round', 'name', 'competition_name');
    }
}
