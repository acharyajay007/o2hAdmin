@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading pb-1">
                    Add Employee
                    <a class="btn btn-sm btn-default pull-right" href="{{URL::to('employees')}}">Back</a>
                </div>

                <div class="panel-body">
                    <form action="{{URL::to('employees')}}" enctype="multipart/form-data" method="post">
                        {{ method_field('POST') }}
                        {{ csrf_field() }}
                        <div class="row">
                            @if ($errors->any())
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" class="form-control" type="text" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" type="text" placeholder="Email">
                                </div>         
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control" type="text" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <select name="company_id" class="form-control" type="text" placeholder="Company">
                                        <option value="">Select Company</option>
                                        @foreach($companies as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <div class="form-group">
                                    <button class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
