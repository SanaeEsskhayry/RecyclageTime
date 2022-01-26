<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageposte extends Model
{
    use HasFactory;
    protected $table='imageposts';
    protected $fillable=['path'];
    protected $primaryKey='idimpost';

    public function poste(){
        return $this->belongsTo('App\Models\Poste','idposte');
    }

}
