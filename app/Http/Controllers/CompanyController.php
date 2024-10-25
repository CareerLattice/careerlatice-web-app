<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index(){
        // Mengambil semua data companies dari database
        $companies = Company::all();

        // Membuat response JSON dengan data companies
        return response()->json($companies);
    }

    public function store(Request $request){
        // Validasi data yang dikirimkan oleh client
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'phone_number' => 'required|string|max:20',
            'field' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Membuat data company baru
        $company = new Company([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'description' => $request->description,
            'logo' => $request->logo,
            'field' => $request->field,
            'location' => $request->location,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active ?? true,
            'created_by' => $request->user()->id,
        ]);

        // Menyimpan data company ke database
        $company->save();

        // Mengirimkan response JSON dengan data company yang berhasil dibuat
        return response()->json($company, 201);
    }

    public function show($id){   
        // Mengambil data company berdasarkan id
        $company = Company::findOrFail($id);

        // Membuat response JSON dengan data company
        return response()->json($company);
    }

    public function update(Request $request, $id){
        // Mencari data company berdasarkan id
        $company = Company::findOrFail($id);

        // Validasi data yang dikirimkan oleh client
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:companies,email,' . $id,
            'phone_number' => 'sometimes|required|string|max:20',
            'field' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'password' => 'sometimes|required|string|min:8',
        ]);

        // Mengupdate data company
        $company->update([
            'name' => $request->name ?? $company->name,
            'email' => $request->email ?? $company->email,
            'phone_number' => $request->phone_number ?? $company->phone_number,
            'description' => $request->description ?? $company->description,
            'logo' => $request->logo ?? $company->logo,
            'field' => $request->field ?? $company->field,
            'location' => $request->location ?? $company->location,
            'password' => $request->password ? Hash::make($request->password) : $company->password,
            'is_active' => $request->is_active ?? $company->is_active,
            'updated_by' => $request->user()->id,
        ]);

        // Mengirimkan response JSON dengan data company yang telah diupdate
        return response()->json($company);
    }

    public function destroy($id){
        // Mencari data company berdasarkan id
        $company = Company::findOrFail($id);

        // Menghapus data company dari database
        $company->delete();

        // Mengirimkan response kosong dengan status code 204
        return response()->json(null, 204);
    }

    public function jobs($id)
    {
        // Mengambil data company berdasarkan id
        $company = Company::findOrFail($id);

        // Mengambil data jobs yang dimiliki oleh company
        $jobs = $company->jobs;

        // Membuat response JSON dengan data jobs
        return response()->json($jobs);
    }
}