<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $company = Company::create($request->all());
            $company = Company::find($company->id);
            return response()->json([
                "id" => $company->id,
                "address" => $company->address,
                "email" => $company->email,
                "director" => $company->director,
                "city" => $company->city,
                "companyType" => $company->companyType,
            ]);
        } catch (Exception $ex) {
            return response()->json([
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json([
            "id" => $company->id,
            "address" => $company->address,
            "email" => $company->email,
            "director" => $company->director,
            "city" => $company->city,
            "companyType" => $company->companyType,
        ]);
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
        try {
            $company->update($request->all());
            return response()->json([
                "id" => $company->id,
                "address" => $company->address,
                "email" => $company->email,
                "director" => $company->director,
                "city" => $company->city,
                "companyType" => $company->companyType,
            ]);
        } catch (Exception $ex) {
            return response()->json([
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
            return response()->noContent();
        } catch (Exception $ex) {
            return response()->json([
                "error" => $ex->getMessage()
            ], 500);
        }
    }
}
