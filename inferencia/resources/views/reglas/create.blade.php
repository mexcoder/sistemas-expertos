@extends('layout.app')

@section ('footScrips')

<script>
$("#add_btn").click(function(){

	field = $("#ant_field");
	val = $("#antecedente_list");
	disp = $("#ant_disp");
	neg = $("#neg_check").is(':checked');
	item = $("<span>").addClass("item");

	if(field.val() != "")
		field.val(field.val()+",");

	if(neg)
		field.val(field.val()+"-");

	field.val(field.val()+val.val())


	/*if(disp.text() != "")
		disp.text(disp.text()+" ^ ");*/

	if(neg)
		item.text("¬");

	item.text(item.text()+$("#antecedente_list option:selected" ).text());
	item.attr("id","option_" + val.val());
	disp.append(item);

	$("#antecedente_list option:selected").remove();

	return false;


})
</script>

@append

@section ('content')
<style>
#ant_disp > .item:not(:first-child):before {
    content: " & ";
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/rules/store/') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<input type="hidden" id="ant_field" style="width: 100%" name="antecedente">
							<div id="ant_disp">
							</div>
							<label class="col-md-4 control-label">Antecedentes</label>
							<div class="col-md-6">
								<input type="checkbox" id="neg_check"> negativo<br>
								<select id="antecedente_list">
									@foreach ($atoms as $atomo)
										<option value="{{$atomo->id}}">{{$atomo->name}}</option>
									@endforeach
								</select><br>

								<button type="button" id="add_btn">Agregar</button>
								<!--input type="text" class="form-control" name="concecuente" required value="{{ old('concecuente') }}"-->
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Consecuente</label>
							<div class="col-md-6">
								<input type="checkbox" name="negative"> negativo<br>
								<select name="concecuente">
									@foreach ($atoms as $atomo)
										<option value="{{$atomo->id}}">{{$atomo->name}}</option>
									@endforeach
								</select>
								<!--input type="text" class="form-control" name="concecuente" required value="{{ old('concecuente') }}"-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Create
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection