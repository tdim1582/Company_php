@extends('layout.app')


@section('content')
    {!! Form::model($employe,array('route'=>array('editEmploye',$employe->id))) !!}
        <div class="container">
            <div class="jumbotron">
                <div style="width: 100%; text-align: center;">
                    <h2>Edit employee</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg 6">
                        
                        <div class="form-group"> 
                            {{Form::label('first_name','First Name')}}
                            {{Form::text('first_name',$employe->first_name,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group"> 
                            {{Form::label('email','E-mail address')}}
                            {{Form::text('email',$employe->email,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group"> 
                            {{Form::label('company_id','Company ID')}}
                            {{Form::text('company_id',$employe->company_id,['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg 6">
                        <div class="form-group"> 
                            {{Form::label('last_name','Last Name')}}
                            {{Form::text('last_name',$employe->last_name,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group"> 
                            {{Form::label('phonenumber','Phone Number')}}
                            {{Form::text('phonenumber',$employe->phonenumber,['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div style="width: 100%; text-align: center;">
                    {{Form::submit('Save',['class' => 'btn btn-primary'])}}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection