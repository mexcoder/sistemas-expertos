@extends('layout.app')

@section('headStyles')

{!! HTML::style('include/css/users.css') !!}
@append



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table>
                <th>
                    <td>Atomo</td>
                    <td>Status</td>
                </th>
                @foreach ($atoms as $atm => $name)
                <tr id="atm_{{$atm}}">
                    <td>{{$name}}</td>
                    <td class="status">?</td>
                </tr>
                @endforeach
            </table>
            <div id="result">

            </div>
            <button onclick="infereSteep()" value="steep">steep</<button>
        </div>
    </div>
</div>
@endsection
@section ('footScrips')
<script>
atoms = {!!json_encode($atoms)!!};
consec = [];
ant = [];
rules = {!!json_encode ($reglas)!!};
finals = [];
mid = [];
start = atoms;

values = {};
analized = [];

function analyzeRules(){

    for(a in rules){

        passed = 0;

        for(b in rules[a].precedent){
            if(analized.indexOf(rules[a].precedent[b].atom) != -1)
                if(values[rules[a].precedent[b].atom] == false){
                    analized.push(rules[a].Consecuent)
                    values[rules[a].Consecuent] = false;
                }
                else{
                    passed++;
                    continue;
                }


        }

        if(passed == rules[a].precedent.length){
            analized.push(rules[a].Consecuent)
            values[rules[a].Consecuent] = false;
        }
    }

}

function ask(index){

    return confirm("cual es el valor para '"+atoms[index]+"'")

}

function update_table(){
    for(a in values){
        $("#atm_"+a+" .status").text(values[a])
    }
}

function infereSteep(){

    analyzeRules();

    for(a in ant){
        if(analized.indexOf(ant[a]) != -1)
            continue;
        else{
            analized.push(ant[a]);
            values[ant[a]] = ask(ant[a]);
            break;
        }
    }

    update_table();

}

$( document ).ready(function() {
    //make consecuent list
    for(a in rules){
        if(consec.indexOf(rules[a].Consecuent) == -1)
            consec.push(rules[a].Consecuent);
        for(b in rules[a].precedent){
            antc = rules[a].precedent[b].atom;
            if(ant.indexOf(antc) == -1)
                ant.push(antc)
        }
    }

    //make precedent list

});
</script>
@append