<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function getLogin(){
        return view('login');
    }

    public function getEmployeList(){
        return view('employeList');
    }

    public function getCompanyList(){
        return view('companyList');
    }

    public function getEmployeCRUD(){
        return view('employeCRUD');
    }

    public function getCompanyCRUD(){
        return view('companyCRUD');
    }

    public function getBasic(){
        return view('basic');
    }
}