<?php

namespace App\Http\Controllers;

use App\Model\Atom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AtomController extends Controller{

	public function getIndex (){

    	return view("atomos.view")->with(["atomos" => Atom::all()]);

    }


    public function getCreate(){
    	return view("atomos.create");
    }

    public function postStore(Request $request){
    	$data = $request->all();
    	Atom::create(["name" => $data["name"]]);
    	return redirect('/atoms');
    }

    public function getEdit($id){
    	//die(var_dump(Atom::find($id)->id));
    	return view("atomos.edit")->with(['atom'=>Atom::find($id)]);
    }

    public function postUpdate(Request $request){
    	$data = $request->all();
    	$atom = Atom::find($data["id"]);
    	$atom->name = $data["name"];
    	$atom->save();
    	return redirect('/atoms');
    }

    public function postDestroy(Request $request)
    {
        $data = $request->all();
        $atom = Atom::find($request["id"]);
        $atom->delete();
        return redirect('/atoms');
    }
}