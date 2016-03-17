<?php

namespace App\Model;
use App\Model\Atom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rule extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','Concecuent',"positiveConcecuent"
    ];

    public function precedent(){

        return $this->belongsToMany('App\Model\Atom',"precedents",'rule_id','atom_id')->withPivot('positive');;

    }

    public function concecuent(){
        return $this->hasOne('App\Model\Atom','id' , 'Concecuent');
    }

    
}