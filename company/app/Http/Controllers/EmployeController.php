<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Company;
use DB;

class EmployeController extends Controller
{
    public function newEmploye(Request $req){
    
        $this->validate($req, [
            'new_first_name' => 'required',
            'new_last_name' => 'required'
        ]);
        $employe = new Employe;
        $employe->first_name = $req->input('new_first_name');
        $employe->last_name = $req->input('new_last_name');
        $employe->email = $req->input('new_email');
        $employe->phonenumber = $req->input('new_phonenumber');
        $employe->company_id = $req->input('new_company_id');
         if( $employe->company_id == null) {
            $employe->company_id = 0;
        }
        
        $employe->save();
        return redirect('/employelist');


    } 
    
    public function viewEmploye(){
        $employelist = Employe::paginate(10);
        $companylist = Company::all();
        return view('employelist',compact('employelist','companylist'));
    }

    public function edit(Request $req,$id){

        $employe = new Employe;
        $employe->id = $id;
        $employe->first_name = $req->input('first_name');
        $employe->last_name = $req->input('last_name');
        $employe->email = $req->input('email');
        $employe->phonenumber = $req->input('phonenumber');
        $employe->company_id = $req->input('company_id');

        if( $employe->company_id == null) {
                $employe->company_id = 0;
        }
        

        
        DB::table('employes')
                ->where('id', $employe->id)
                ->update(['first_name' => $employe->first_name , 'last_name' => $employe->last_name, 'email' => $employe->email,'phonenumber' => $employe->phonenumber, 'company_id' => $employe->company_id]);

        return redirect('/employelist');
    }

    public function delete(Request $req, $id){
        DB::table('employes')
                ->where('id', $id)
                ->delete();
        
        return redirect('/employelist');
    }


}
