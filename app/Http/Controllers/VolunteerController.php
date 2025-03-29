<?php

// app/Http/Controllers/VolunteerController.php

namespace App\Http\Controllers;

use App\Models\VolunteerProfile;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    // عرض جميع المتطوعين
    public function index()
    {
        return VolunteerProfile::all();
    }

    // إضافة متطوع جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string|max:50',
            'second_name' => 'required|string|max:50',
            'third_name' => 'nullable|string|max:50',
            'fourth_name' => 'nullable|string|max:50',
            'national_id' => 'required|string|max:20',
            'social_status' => 'required|in:Single,Married,Divorced,Widowed',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'emergency_contact_name' => 'required|string|max:100',
            'emergency_contact_phone' => 'required|string|max:15',
        ]);

        $volunteer = VolunteerProfile::create($validated);

        return response()->json($volunteer, 201);
    }

    // عرض بيانات متطوع معين
    public function show($id)
    {
        $volunteer = VolunteerProfile::findOrFail($id);

        return response()->json($volunteer);
    }

    // تحديث بيانات المتطوع
    public function update(Request $request, $id)
    {
        $volunteer = VolunteerProfile::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'second_name' => 'required|string|max:50',
            'third_name' => 'nullable|string|max:50',
            'fourth_name' => 'nullable|string|max:50',
            'national_id' => 'required|string|max:20',
            'social_status' => 'required|in:Single,Married,Divorced,Widowed',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'emergency_contact_name' => 'required|string|max:100',
            'emergency_contact_phone' => 'required|string|max:15',
        ]);

        $volunteer->update($validated);

        return response()->json($volunteer);
    }

    // حذف متطوع
    public function destroy($id)
    {
        $volunteer = VolunteerProfile::findOrFail($id);
        $volunteer->delete();

        return response()->json(null, 204);
    }
}
