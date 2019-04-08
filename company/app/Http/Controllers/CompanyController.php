<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;
use File;

class CompanyController extends Controller
{
    // public function newCompany(Request $req){
      
    //     $this->validate($req, [
    //         'new_name' => 'required',
    //         'new_logo' => 'image|dimensions:min_width=100,min_height=100',

    //     ]);
    //     $company = new Company;
    //     $company->name = $req->input('new_name');
    //     $company->email = $req->input('new_email');
    //     $company->website = $req->input('new_website');
    //     // if( $request->input('new_company_id') != "") {
    //     //     $company = DB::table('companies')->where('id', '=', 10)->get();
    //     $logo = 'storage/app/public' . $req->input('new_name');
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
            'new_name' => 'required',
            'logo_name' => 'image|dimensions:min_width=100,min_height=100',

        ]);
        $oldcompany = Company::find($id);

        $company = new Company;
        $company->name = $req->input('new_name');
        $company->email = $req->input('new_email');
        $company->website = $req->input('new_website');
        // if( $request->input('new_company_id') != "") {
        //     $company = DB::table('companies')->where('id', '=', 10)->get();
        $logo = 'storage/app/public' . $req->input('new_name');
        $company->logo = $logo;

        $image =$req->file('logo_name');
        if($image != null){
            $image_path = '../' . $oldcompany->id; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $input['imagename'] = $req->new_name . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('../storage/app/public');
            $image->move($destinationPath,$input['imagename']);
        } else {
            if($company->name != $oldcompany->name){
                Storage::move('../'.$oldcompany->logo, '../'.$company->logo);
            }
        }
        
        DB::table('companies')
                ->where('id', $company->id)
                ->update(['name' => $company->name, 'email' => $company->email,'website' => $company->website, 'logo' => $company->logo]);
        
        return redirect('/companylist');
    }

    public function delete(Request $req, $id){
        $company = Company::find($id);
        Storage::delete('../'.$company->logo);
        
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
        // if( $request->input('new_company_id') != "") {
        //     $company = DB::table('companies')->where('id', '=', 10)->get();
        $logo = 'storage/app/public' . $req->input('new_name');
        $company->logo = $logo;
        
        $company->save();
        
        $image =$req->file('logo_name');
        $input['imagename'] = $req->new_name . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../storage/app/public');
        $image->move($destinationPath,$input['imagename']);

        return redirect('/companylist');
    }
}
