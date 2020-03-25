@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading pb-1">
                    Companies
                    <a class="btn btn-sm btn-success pull-right" href="{{URL::to('companies/create')}}">Add New</a>
                </div>

                <div class="panel-body">
                    <div class="row">
                        @if(session()->has('message'))
                            <div class="col-sm-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ session()->get('message') }}
                                </div>
                            </div>
                        @endif
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="5%">Logo</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Website</td>
                                        <td width="20%">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($companies->count()>0)
                                    @foreach($companies as $c)
                                        <tr>
                                            <td>
                                                @if($c->logoPublicUrl)
                                                <img src="{{$c->logoPublicUrl}}" width="50">
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->email}}</td>
                                            <td>{{$c->website}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{route('companies.edit',[$c->id])}}">Edit</a>
                                                <a class="btn btn-warning" href="{{route('companies.show',[$c->id])}}">View</a>
                                                {{ Form::open(array('url' => 'companies/' . $c->id, 'style' => 'display:inline')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Companies Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                {{ $companies->links() }}
                            </div>
                        </div
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
