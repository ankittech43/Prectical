<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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

        return view('EmployeeList');
    }

    function employeeEdit($id)
    {

        $companyList = Company::all();

        $emp = Employee::find($id)->first();
        return view('Employee_edit', compact('companyList', 'emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyList = Company::all();

        return view('Employee', compact('companyList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:employees|max:255',
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => 'required',
            'company' => 'required',
        ]);
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['company'] = $request->company;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
//echo "<pre>";
//        print_r($data);
        Employee::create($data);

        return redirect('employee');


    }

    public function empList()
    {
        $empList = Employee::join('companies', 'companies.id', 'employees.company')->select('companies.name','employees.*')->get();

        return json_encode($empList);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['company'] = $request->company;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        Employee::where('id', $employee->id)->update($data);
        return redirect('employee');
    }
    function empdelete($id){
        Employee::where('id',$id)->delete();
        $employee = Employee::all();

        return json_encode($employee);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
