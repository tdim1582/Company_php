@extends('layout.app')


@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
    body {
        color: #566787;
        background: #f7f5f2;
		font-family: 'Roboto', sans-serif;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
		color: #fff;
		background: #40b2cd;		
		padding: 16px 25px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
	.search-box {
        position: relative;
        float: right;
    }
	.search-box .input-group {
		min-width: 300px;
		position: absolute;
		right: 0;
	}
	.search-box .input-group-addon, .search-box input {
		border-color: #ddd;
		border-radius: 0;
	}	
    .search-box input {
        height: 34px;
        padding-right: 35px;
        background: #f4fcfd;
        border: none;
        border-radius: 2px !important;
    }
	.search-box input:focus {
        background: #fff;
	}
	.search-box input::placeholder {
        font-style: italic;
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 6px 0;
    }
    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 2px;
    }
    table.table {
        table-layout: fixed;
        margin-top: 15px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:first-child {
        width: 60px;
    }
    table.table th:last-child {
        width: 120px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
	table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltips
	$('[data-toggle="tooltip"]').tooltip();
    
	// Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});
</script>
<div class="container">
        <a class="btn btn-secondary" href="/login/successlogin" >Back to basic page </a>
        <div class="table-wrapper">			
            <div class="table-title">
                <div class="row">
					<div class="col-sm-6">
						<h2>Emploies list </h2>
					</div>
                    <div class="col-sm-6">
                        <div class="search-box">
							<div class="input-group">								
								<input type="text" id="search" class="form-control" placeholder="Search by Name">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 22%;">Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employelist as $employe)
                    <tr>
                        <td>{{$employe->id}}</td>
                        <td>{{$employe->first_name}} {{$employe->last_name}}</td>
                        <td>{{$employe->email}}</td>
                        <td>{{$employe->phonenumber}}</td>
                        <td><?php if($employe->company_id ==0) {
                                echo "This employee has not company";
                                } else{
                                    foreach($companylist as $company){
                                        if($company->id == $employe->company_id){
                                            echo $company->name;
                                        }
                                    }
                                }?></td>
                        <td>
                            <a href="/employelist/edit/<?php echo $employe->id; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="/employelist/delete/<?php echo $employe->id; ?>"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach           
                </tbody>
            </table>
        </div>
    </div>     
    <center>{!! $employelist->render() !!}</center>

    {!! Form::open(['url' => 'employelist/addnew', 'method' => 'post']) !!}
        <div class="container">
            <div style="width: 100%; text-align: center;">
                    <h2> New employee</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg 6">
                    <div class="form-group"> 
                        {{Form::label('new_first_name','First Name')}}
                        {{Form::text('new_first_name','',['class' => 'form-control','placeholder' => 'Enter first name'])}}
                    </div>
                    <div class="form-group"> 
                        {{Form::label('new_email','E-mail address')}}
                        {{Form::text('new_email','',['class' => 'form-control','placeholder' => 'Enter email', 'type'=>'email'])}}
                    </div>
                    <div class="form-group"> 
                        {{Form::label('new_company_id','Company ID')}}
                        {{Form::text('new_company_id','',['class' => 'form-control','placeholder' => 'Enter company ID'])}}
                    </div>
                </div>

                <div class="col-md-6 col-lg 6">
                    <div class="form-group"> 
                        {{Form::label('new_last_name','Last Name')}}
                        {{Form::text('new_last_name','',['class' => 'form-control','placeholder' => 'Enter last name'])}}
                    </div>
                    <div class="form-group"> 
                        {{Form::label('new_phonenumber','Phone Number')}}
                        {{Form::text('new_phonenumber','',['class' => 'form-control','placeholder' => 'Enter phone number'])}}
                    </div>
                    
                </div>
            </div>
            <div style="width: 100%; text-align: center;">
                {{Form::submit('Add new employe',['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}
@endsection