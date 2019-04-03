@extends('layout.app')


@section('content')
    {!! Form::model($employe,array('route'=>array('edit',$employe->id))) !!}
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg 6">
                    <h2 align="right"> New  </h2>
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
                    <h2> employe</h2>
                    <div class="form-group"> 
                        {{Form::label('last_name','Last Name')}}
                        {{Form::text('last_name',$employe->last_name,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group"> 
                        {{Form::label('phonenumber','Phone Number')}}
                        {{Form::text('phonenumber',$employe->phonenumber,['class' => 'form-control'])}}
                    </div>
                    <div>
                        {{Form::label('save','Save the employe')}}
                    </div>
                    <div>
                        
                        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection