<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
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
            'companies' => Company::all(),
        ];
        return view('company.index', $salida);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = [
            'type'    => 'store',
            'company' => "",
        ];
        return view('company.actions', $salida);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $company = Company::create($request->input());
        if ($request->hasFile('logo')) {
            //Log::debug('tiene logo');
            $company->logo = $request->logo->store('', 'images');
            $company->save();
        }
        return \redirect()->route('company.index')->with('message', \trans("msg.company_create"))->with('message_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $salida = [
            'type'    => 'show',
            'company' => $company,
        ];
        return view('company.actions', $salida);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $salida = [
            'type'    => 'update',
            'company' => $company,
        ];
        return view('company.actions', $salida);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, Company $company)
    {
        $company->update($request->input());
        if ($request->hasFile('logo')) {
            \Storage::disk('images')->delete($company->logo);
            $company->logo = $request->logo->store('', 'images');
            $company->save();
        }
        return \redirect()->route('company.index')->with('message', \trans("msg.company_update"))->with('message_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //TODO: Deleting a $company that have
        Log::debug($company);
        if ($company->employeesCount()) {
            return \redirect()->route('company.index')->with('message', \trans("msg.company_with_employees"))->with('message_type', 'error');
        }
        if ($company->logo) {
            \Storage::disk('images')->delete($company->logo);
        }
        $company->delete();
        return \redirect()->route('company.index')->with('message', \trans("msg.company_delete"))->with('message_type', 'warning');
    }
}
