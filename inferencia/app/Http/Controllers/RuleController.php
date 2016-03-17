<?php

namespace App\Http\Controllers;

use App\Model\Rule;
use App\Model\Atom;
use App\Model\Precedent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RuleController extends Controller{

	public function getIndex (){

    	return view("reglas.view")->with(["reglas" => Rule::all()]);

    }

    public function getCreate(){
    	return view("reglas.create")->with(["atoms"=>Atom::All()]);
    }

    public function postStore(Request $request){
    	$data = $request->all();
    	
    	$r = rule::create(["Concecuent" => $data["concecuente"],"positiveConcecuent" => !isset($data["negative"] ) ]);
    	$ants = explode(",",$data["antecedente"]);
    	foreach($ants as $ant)
    		Precedent::create(["rule_id"=> $r->id,"atom_id" => abs($ant), "positive" => $ant > 0]);
    	return redirect('/');
    }

    /*public function getEdit($id){
    	//die(var_dump(Atom::find($id)->id));
    	return view("atomos.edit")->with(['atom'=>Atom::find($id)]);
    }

    public function postUpdate(Request $request){
    	$data = $request->all();
    	$atom = Atom::find($data["id"]);
    	$atom->name = $data["name"];
    	$atom->save();
    	return redirect('/atoms');
    }*/

    public function postDestroy(Request $request)
    {
        $data = $request->all();
        $atom = rule::find($request["id"]);
        $atom->delete();
        return redirect('/rules');
    }
}