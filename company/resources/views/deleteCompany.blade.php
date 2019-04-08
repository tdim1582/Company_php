@extends('layout.app')


@section('content')
    {!! Form::model($company,array('route'=>array('deleteCompany',$company->id))) !!}
        <div class="container" align="center">
            <h2 class="jumbotron-heading" > Delete!</h2>
            <p class="lead text-muted">
                Are you sure then you dlete {{$company->name}} company?
            </p>
            <p>
                <a class="btn btn-primary my-2" href="/companylist"> No, I am not!</a>
                <a class="btn btn-danger" href="/companylist/delete/id/<?php echo $company->id; ?>"  method="post"> Yes, I am! </a>
            </p>
        </div>
    {!! Form::close() !!}
@endsection