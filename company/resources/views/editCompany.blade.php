@extends('layout.app')


@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.mini.css">


<form action="/companylist/update/<?php echo $company->id; ?>" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('POST')}}
    <div class="container">
        <div class="jumbotron">
        <div style="width: 100%; text-align: center;">
            <h2>Edit company</h2>
        </div>
        <div class="row">
            <div class="col-md-10 col-lg 6">
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="name" value=<?php echo $company->name; ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input type="text" name="email" value=<?php echo $company->email; ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label> Website </label>
                    <input type="text" name="website" value=<?php echo $company->website; ?> class="form-control" />
                </div>
                <div class="form-group">
                    <label> Image </label>
                    <div class="input-group">
                        <div class="custon-file">
                            <input type="hidden" class="btn btn-primary" name="id" id="id" value="{!! csrf_token() !!}"/>
                            <input type="file" name="image" class="custon-file-input" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" clss="btn btn-primary">Update company</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>



@endsection