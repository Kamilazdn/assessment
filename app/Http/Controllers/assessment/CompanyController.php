<?php

namespace App\Http\Controllers\assessment;

use App\Http\Controllers\Controller;
use App\Models\assessment\Company;
use App\Http\Requests\assessment\company\StoreCompanyRequest;
use App\Http\Requests\assessment\company\UpdateCompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::paginate(10);
        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName(); 
            $data['logo'] = $file->storeAs('logos', $filename, 'public');
        }

        Company::create($data);

        return redirect()->route('company.index')->with('success', 'Company created successfully!');
    }

    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($data);

        return redirect()->route('company.index')->with('success', 'Company updated successfully!');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully!');
    }
}