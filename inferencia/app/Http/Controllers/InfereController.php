<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Atom;
use App\Model\Rule;

class InfereController extends Controller
{
    
	public function getIndex (){

		$rule = Rule::with('Precedent')->get();
		$simple_rule_set = [];

		foreach ($rule as $r) {

			$sr = array('Consecuent' => $r->Concecuent ,'positive' => $r->positiveConcecuent );
			$pl = [];

			foreach ($r->Precedent as $p) {
				$pl[] = array('atom' => $p->id,'positive' => $p->pivot->positive );
			}
			$sr["precedent"] = $pl;

			$simple_rule_set[] = $sr;

		}
		$atm = array();

		foreach(Atom::all() as $at){

			$atm[$at->id] = $at->name;

		}

    	return view("infere.view")->with(["reglas" => $simple_rule_set,"atoms" => $atm]);
    }

}
