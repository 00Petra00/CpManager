<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;

class Round extends Model
{
    use HasFactory;
    use Compoships;
    protected $table = 'rounds';

    public $timestamps = false;
    public $incrementing = false;

    public function competitions(){
        return $this->belongsTo('App\Models\Competition', 'competition_name', 'name');
    }

    public function competitor(){
        return $this->belongsToMany('App\Models\User');
    }
}
