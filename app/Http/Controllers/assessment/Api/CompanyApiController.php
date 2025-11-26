<?php

namespace App\Http\Controllers\assessment\Api;

use App\Http\Controllers\Controller;
use App\Models\assessment\Company;

class CompanyApiController extends Controller
{
    public function show($id)
    {
        $company = Company::with('employees')->findOrFail($id);
        
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        
        return response()->json([
            'id' => $company->id,
            'name' => $company->name,
            'email' => $company->email,
            'website' => $company->website,
            'logo_url' => $company->logo 
                ? asset('storage/' . $company->logo)
                : null,

            // ✨ EXTRA ATTRIBUTE REQUIRED BY THE ASSESSMENT
            'employee_count' => $company->employees->count(),

            // Full employee list
            'employees' => $company->employees
        ]);
    }
}
