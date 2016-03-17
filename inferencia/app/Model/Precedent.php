<?php

namespace App\Model;
use Atom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Precedent extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'precedents';
    protected $fillable = [
        'id','atom_id',"rule_id","positive"
    ];
}