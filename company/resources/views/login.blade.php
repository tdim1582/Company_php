@extends('layout.app')


@section('content')
    
    {!! Form::open(['url' => 'login/submit', 'method' => 'post']) !!}
        
        @if(isset(Auth::user()->email))
            <script>windows.location="/login/successlogin";</script>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg 8">
                    <h1 class="login_h"> Login </h1>
                    <div class="form-group"> 
                        {{Form::label('email','E-mail address')}}
                        {{Form::text('email','',['class' => 'form-control','placeholder' => 'Enter email'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password','Password')}}
                        {{Form::text('password','',['class' => 'form-control','placeholder' => 'Enter password'])}}
                    </div>
                    <div>
                        {{Form::submit('Login',['class' => 'btn btn-primary'])}}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection