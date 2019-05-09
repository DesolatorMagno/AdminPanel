<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salida = [
            'employees' => Employee::with('company:id,name')->get(),
        ];
        return view('employee.index', $salida);//->with('message', 'Employee Updated')->with('message_type', 'success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = [
            'type'      => 'store',
            'employee'  => "",
            "companies" => Company::all(),
        ];
        return view('employee.actions', $salida);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        Employee::create($request->input());
        return \redirect()->route('employees.index')->with('message', 'Employee Stored')->with('message_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $salida = [
            'type'     => 'show',
            'employee' => $employee->load('company'),
        ];
        return view('employee.actions', $salida);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $salida = [
            'type'      => 'update',
            'employee'  => $employee,
            'companies' => Company::all(),
        ];
        return view('employee.actions', $salida);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, Employee $employee)
    {
        $employee->update($request->input());
        $employee->save();
        //Log::debug($employee);
        //Log::debug($request);
        return redirect()->route('employees.index')->with('message', 'Employee Updated')->with('message_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return \redirect()->route('employees.index')->with('message', 'Employee Deleted')->with('message_type', 'warning');
    }
}
