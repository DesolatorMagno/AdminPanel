<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreEmployee;

class EmployeeController extends Controller
{
    use MessageTrait;

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
        $this->success("Employee Stored");
        return redirect()->route('employees.index');
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
        $this->success("Employee Updated");
        return redirect()->route('employees.index');
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
        $this->warning("Employee Deleted");
        return \redirect()->route('employees.index');
    }
}
