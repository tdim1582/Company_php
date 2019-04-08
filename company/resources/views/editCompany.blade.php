@extends('layout.app')


@section('content')
 {!!  Form::model($company,array('route'=>array('editCompany',$company->id))) !!}

    <!-- <form method="post" id="formImgInp" url="{{route('/companylist/edit/'.$company->id)}}" enctype="multipart/form-data"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg 6">
                    <h2 align="right"> Edit  </h2>
                    <div class="form-group"> 
                        {{Form::label('new_name','First Name')}}
                        {{Form::text('new_name',$company->name,['class' => 'form-control'])}}
                        <!-- <input type="text" class="form-control" placeholder="Enter name" name="new_name" id="new_name" /> -->
                    </div>
                    <div class="form-group">  
                        <input type="hidden" name="_token" class="btn btn-primary"  value="Open"/>
                        <input type="file"   name="logo_name" id="logo_name" placeholder="Don\'t choose fiel'"/>
                    </div>
                    <div class="form-group">
                        {{Form::submit('Add new company',['class' => 'btn btn-primary'])}}
                   
                    </div>
                </div>


                <div class="col-md-6 col-lg 6">
                    <h2> company</h2>
                    <div class="form-group"> 
                        {{Form::label('new_email','E-mail address')}}
                        {{Form::text('new_email',$company->email,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('new_website','Website')}}
                        {{Form::text('new_website',$company->website,['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- {!! Form::close() !!} -->
@endsection