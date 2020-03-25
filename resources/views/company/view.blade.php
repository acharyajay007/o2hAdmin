@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading pb-1">
                    View Company
                    <a class="btn btn-sm btn-default pull-right" href="{{URL::to('companies')}}">Back</a>
                </div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-3">
                             @if($company->logoPublicUrl)
                             <img src="{{$company->logoPublicUrl}}" width="150">
                             @endif
                        </div>
                        <div class="col-sm-9">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="10%">Name</td>
                                    <td>{{$company->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$company->email}}</td>
                                </tr>
                                <tr>
                                    <td>Website</td>
                                    <td>{{$company->website}}</td>
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
