@extends('layout.app')


@section('content')
    @if(isset(Auth::user()->email))
                        
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <!-- <nav class="nav nav-masthead"> -->
            <a class="navbar-brand" href="home">Home</a>
            <a class="navbar-brand" href="{{url('/employelist')}}">Emploies</a>
            <a class="navbar-brand" href="{{url('/companylist')}}">Comanies</a>
            <a class="navbar-brand" href="{{url('/logout')}}" method="get">Logout</a>
        </nav>
        <div class="container">
            <div class="jumbotron">
                <div class="site-wrapper">
                    <div class="site-wrapper-inner">
                        <div class="cover-container">
                            <div class="inner cover" align="center">
                                <h2> Welcome {{Auth::user()->email}}</h2>
                                <p> You can find functionality in navbar!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <script>window.location ="/";</script>
    @endif
@endsection