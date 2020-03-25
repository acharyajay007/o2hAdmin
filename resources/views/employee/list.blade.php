@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading pb-1">
                    Employees
                    <a class="btn btn-sm btn-success pull-right" href="{{URL::to('employees/create')}}">Add New</a>
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
                                        <td>Name</td>
                                        <td>Company</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($employees->count()>0)
                                    @foreach($employees as $c)
                                        <tr>
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->company->name}}</td>
                                            <td>{{$c->email}}</td>
                                            <td>{{$c->phone}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{route('employees.edit',[$c->id])}}">Edit</a>
                                                <a class="btn btn-warning" href="{{route('employees.show',[$c->id])}}">View</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Employees Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                {{ $employees->links() }}
                            </div>
                        </div
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
