<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('CompanyList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|unique:companies|max:255',
            'name' => 'required',
            'logo'=>'dimensions:max_width=100,max_height=100'
        ]);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $file = $request->file('logo');
        if($file){
        $fileName = time().rand(111, 9999).".".$file->getClientOriginalExtension();
            $data['logo']=$fileName;
            Storage::disk('public')->put($fileName, file_get_contents($file));
        }
        Company::create($data);
        return redirect('company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
            $company=Company::get();
    }
    function compList(){

        $complist=Company::get();

        return json_encode($complist);
    }

    function companyEdit($id){

        $comp = Company::where('id',$id)->first();

        return view('Company_edit',compact('comp'));
    }

    function compdelete($id){

      $delete=  Company::where('id',$id)->delete();
        $complist=Company::get();

        if($delete){
//            return json_encode("Your Record delete Success");
            return json_encode($complist);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

//
//        $validated = $request->validate([
//            'email' => 'required|unique:companies|max:255',
//            'name' => 'required',
//        ]);


        $data['name']=$request->name;
        $data['email']=$request->email;
        $file = $request->file('logo');
        if($file){
            $fileName = time().rand(111, 9999).".".$file->getClientOriginalExtension();
            $data['logo']=$fileName;
            Storage::disk('public')->put($fileName, file_get_contents($file));
        }

        Company::where('id',$company->id)->update($data);
        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
