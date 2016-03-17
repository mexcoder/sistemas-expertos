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
                                <th><span>Atomo <a href="{{ url('/atoms/create') }}"><i class="glyphicon glyphicon-plus"></i></a></span></th>
                                <th><span>&nbsp;</span></th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($atomos as $atomo)
                                <tr>
                                    <td> 
                                    	{{$atomo->name}}
                                    </td>
                                     <td style="width: 20%;">
                                        
                                        <!--a href="{{url('/atoms/edit/' . $atomo->id )}}" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a-->
                                        <?php /*<a href="#" class="table-link warning">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-ban fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>*/ ?>
                                        <!--form method="post" style="display: inline;" action="{{ url('/atoms/destroy') }}">
                                            <input type="hidden" name="id" value="{{$atomo->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="table-link danger">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </button>
                                        </form-->  
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