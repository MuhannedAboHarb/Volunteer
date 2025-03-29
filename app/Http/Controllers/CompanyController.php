<?php

// app/Http/Controllers/CompanyController.php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // عرض جميع الشركات
    public function index()
    {
        return CompanyProfile::all();
    }

    // إضافة شركة جديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string|max:100',
            'contact_email' => 'required|string|email|max:255',
            'contact_phone' => 'required|string|max:15',
            'description' => 'nullable|string',
            'logo_url' => 'nullable|string',
        ]);

        $company = CompanyProfile::create($validated);

        return response()->json($company, 201);
    }

    // عرض بيانات شركة معينة
    public function show($id)
    {
        $company = CompanyProfile::findOrFail($id);

        return response()->json($company);
    }

    // تحديث بيانات الشركة
    public function update(Request $request, $id)
    {
        $company = CompanyProfile::findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'required|string|max:100',
            'contact_email' => 'required|string|email|max:255',
            'contact_phone' => 'required|string|max:15',
            'description' => 'nullable|string',
            'logo_url' => 'nullable|string',
        ]);

        $company->update($validated);

        return response()->json($company);
    }

    // حذف شركة
    public function destroy($id)
    {
        $company = CompanyProfile::findOrFail($id);
        $company->delete();

        return response()->json(null, 204);
    }
}
