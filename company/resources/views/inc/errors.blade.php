    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {{$message}} </strong>
        </div>
    @endif
    
    @if(count($errors) > 0)
        @foreach($errors -> all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif