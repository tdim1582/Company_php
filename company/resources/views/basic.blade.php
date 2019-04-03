@extends('layout.app')


@section('content')
    @if(isset(Auth::user()->email))
        <h2> Welcome {{Auth::user()->email}}</h2>
        

        {{Form::label('logout','If you want to logout:')}}
        <a href="{{url('/logout')}}" method="get">Logout</a>
        <a href="{{url('/employelist')}}">Employe</a>
    @else
        <script>window.location ="/";</script>
    @endif
@endsection