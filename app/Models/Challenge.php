<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $table='challenges';
    protected $fillable=['titre','questions'];
    protected $primaryKey='idchallenge';

    public function imagechallenge(){
        return $this->hasMany('App\Models\Imagechallenge','idchallenge');
    }



    public static function boot(){
        parent::boot();
        Static::deleting(function( Challenge $challenge){
            $challenge->imagechallenge()->delete();
        });
    }
}
