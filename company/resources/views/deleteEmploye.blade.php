@extends('layout.app')


@section('content')
    {!! Form::model($employe,array('route'=>array('deleteEmploye',$employe->id))) !!}
        <div class="container" align="center">
            <h2 class="jumbotron-heading" > Delete!</h2>
            <p class="lead text-muted">
                Are you sure then you dlete {{$employe->first_name}} {{$employe->last_name}} emlpoyee?
            </p>
            <p>
                <a class="btn btn-primary my-2" href="/employelist"> No, I am not!</a>
                <a class="btn btn-danger" href="/employelist/delete/id/<?php echo $employe->id; ?>"  method="post"> Yes, I am! </a>
            </p>
        </div>
    {!! Form::close() !!}
@endsection