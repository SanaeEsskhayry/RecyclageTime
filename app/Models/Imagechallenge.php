<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagechallenge extends Model
{
    use HasFactory;
    protected $table='imagechallenges';
    protected $fillable=['path'];
    protected $primaryKey='idimchallenge';

    public function challenge(){
        return $this->belongsTo('App\Models\Challenge','idchallenge');
    }
}
