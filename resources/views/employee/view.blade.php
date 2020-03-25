@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading pb-1">
                    View Employee
                    <a class="btn btn-sm btn-default pull-right" href="{{URL::to('employees')}}">Back</a>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="10%">Name</td>
                                    <td>{{$employee->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$employee->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$employee->phone}}</td>
                                </tr>
                                 <tr>
                                    <td>Company</td>
                                    <td>{{$employee->company->name}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
