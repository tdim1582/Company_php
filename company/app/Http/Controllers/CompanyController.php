<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;
use File;
use View;
use Storage;

class CompanyController extends Controller
{
    // public function newCompany(Request $req){
      
    //     $this->validate($req, [
    //         'name' => 'required',
    //         'logo' => 'image|dimensions:min_width=100,min_height=100',

    //     ]);
    //     $company = new Company;
    //     $company->name = $req->input('name');
    //     $company->email = $req->input('email');
    //     $company->website = $req->input('website');
    //     // if( $request->input('company_id') != "") {
    //     //     $company = DB::table('companies')->where('id', '=', 10)->get();
    //     $logo = 'storage/app/public' . $req->input('name');
    //     $company->logo = $logo;
        
    //     $company->save();
    //     return redirect('/companylist');


    // } 
    
    public function viewcompany(){
        $companylist = Company::paginate(10);
        return view('companylist',compact('companylist'));
    }

    public function edit(Request $req,$id){

        $this->validate($req, [
            'name' => 'required',
            'image' => 'image|dimensions:min_width=100,min_height=100',

        ]);
        $oldcompany = Company::find($id);

        $company = new Company;
        $company->name = $req->input('name');
        $company->email = $req->input('email');
        $company->website = $req->input('website');
        $company->logo = 'storage/app/public/' . $req->input('email');

        $image =$req->file('image');
        if($image != null){
            $image_path = '../' . $oldcompany->logo; 
            echo $oldcompany->logo;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $input['imagename'] = $req->email . '.' . $image->getClientOriginalExtension();
            
            $destinationPath = public_path('../storage/app/public');
            $image->move($destinationPath,$input['imagename']);

            $company->logo = $company->logo .'.'. $image->getClientOriginalExtension();
        } else {
            if($company->email != $oldcompany->email){
                $valore = explode('.',$oldcompany->logo);
                rename('../'.$oldcompany->logo, '../'.$company->logo.'.'.$valore[2]);
                $company->logo = $company->logo .'.'.$valore[2];
            }
        }
        
        DB::table('companies')
                ->where('id', $id)
                ->update(['name' => $company->name, 'email' => $company->email,'website' => $company->website, 'logo' => $company->logo]);
        
        return redirect('/companylist');
    }

    public function delete(Request $req, $id){
        $company = Company::find($id);
        $valore = explode('public',$company->logo);
        Storage::delete('public/'.$valore[1]);
        DB::table('employes')
                ->where('company_id',$id)
                ->update(['company_id' => 0]);

        DB::table('companies')
                ->where('id', $id)
                ->delete();
        
        return redirect('/companylist');
    }

    public function uploadImage(Request $req){

        $this->validate($req, [
            'new_name' => 'required',
            'logo_name' => 'image|dimensions:min_width=100,min_height=100',

        ]);

        $company = new Company;
        $company->name = $req->input('new_name');
        $company->email = $req->input('new_email');
        $company->website = $req->input('new_website');

        $image =$req->file('logo_name');

        $company->logo = 'storage/app/public' . $req->input('new_email'). '.' .$image->getClientOriginalExtension();
        
        $company->save();
        
        
        $input['imagename'] = $req->input('new_email') . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../storage/app/public');
        $image->move($destinationPath,$input['imagename']);

        return redirect('/companylist');
    }

}
