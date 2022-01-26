<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;
    protected $table='postes';
    protected $fillable=['iduser','idcategorie','titre','description','prix','statut'];
    protected $primaryKey='idposte';

    public function imageposte(){
        return $this->hasMany('App\Models\Imageposte','idposte');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class,'idcategorie');
    }

    public static function boot(){
        parent::boot();
        Static::deleting(function( Poste $poste){
            $poste->imageposte()->delete();
        });
    }

}
