<?php

namespace App\Http\Controllers;

use App\Rig;
use App\User;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyStore;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(20);
        return view('company.index')->with(compact(['companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStore $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('company.show', $company)->withStatus('Company has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $patients = User::where('company_id', $company->id)->get();
        $rigs = Rig::where('company_id', $company->id)->paginate(20);
        return view('company.show')->with(compact('company', 'rigs', 'patients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());

        return redirect()->back()->withSuccess('Company has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        $company->rigs()->delete();

        return redirect()->route('company.index')->withSuccess('Company has been deleted');
    }
}
