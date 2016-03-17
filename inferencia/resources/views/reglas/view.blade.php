@extends('layout.app')

@section('headStyles')

{!! HTML::style('include/css/users.css') !!}
@append

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Regla<a href="{{ url('/rules/create') }}"><i class="glyphicon glyphicon-plus"></i></a></span></th>
                                <th><span>Antecedente</span></th>
                                <th><span>&nbsp;</span></th>
                                <th><span>Concecuente</span></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($reglas as $regla) 

                                    <?php $pre = []; ?>

                                    @foreach($regla->Precedent as $p)
                                        <?php $pre[] = ($p->pivot->positive ? "" : "no ").$p->name ?>
                                    @endforeach
                                <tr>
                                    <td> {{$regla->id}}</td>
                                    <td>
                                        {{join(" & ",$pre)}}
                                    </td>
                                    <td>-></td>
                                    <td>
                                        {{$regla->positiveConcecuent? "":"no "}}{{$regla->concecuent->name}}
                                    </td>
                                    <td style="width: 20%;">
                                        
                                        <?php /*<!--a href="{{url('/atoms/edit/' . $atomo->id )}}" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a-->
                                        <a href="#" class="table-link warning">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-ban fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>*/ ?>
                                        <form method="post" style="display: inline;" action="{{ url('/rules/destroy') }}">
                                            <input type="hidden" name="id" value="{{$regla->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="table-link danger">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </button>
                                        </form>  
                                    </td>
                                </tr>

                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection