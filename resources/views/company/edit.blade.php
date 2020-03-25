@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading pb-1">
                    Edit Company
                    <a class="btn btn-sm btn-default pull-right" href="{{URL::to('companies')}}">Back</a>
                </div>

                <div class="panel-body">
                    <form action="{{route('companies.update',[$company->id])}}" enctype="multipart/form-data" method="post">
                        {{ method_field('PUT') }}
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
                                    <label>Name</label>
                                    <input name="name" class="form-control" value="{{$company->name}}" type="text" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" value="{{$company->email}}" type="text" placeholder="Email">
                                </div>         
                                <div class="form-group">
                                    <label>Website</label>
                                    <input name="website" class="form-control" value="{{$company->website}}" type="text" placeholder="Website">
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input name="logo" class="form-control" type="file" placeholder="Logo">
                                    <p class="help-block">Extension: PNG|JPEG|JPG & Width : 500 & Height : 500</p>
                                    <img src="{{$company->logoPublicUrl}}" width="100">
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
