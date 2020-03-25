@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{route('companies.index')}}">
                            <div class="well">
                                <h3>Total Companies</h3>
                                <h2>{{$totalCompanies}}</h2>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{route('employees.index')}}">
                            <div class="well">
                                <h3>Total Employees</h3>
                                <h2>{{$totalEmployees}}</h2>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
