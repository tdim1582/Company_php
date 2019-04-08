@extends('layout.app')


@section('content')
    @if(isset(Auth::user()->email))
        <h2> Welcome {{Auth::user()->email}}</h2>
        

        {{Form::label('logout','If you want to logout:')}}
        <a href="{{url('/logout')}}" method="get">Logout</a>
        {{Form::label('logout','If you want to managed emploies:')}}
        <a href="{{url('/employelist')}}">Emploies</a>
        {{Form::label('logout','If you want to managed companies:')}}
        <a href="{{url('/companylist')}}">Comanies</a>
    @else
        <script>window.location ="/";</script>
    @endif
@endsection