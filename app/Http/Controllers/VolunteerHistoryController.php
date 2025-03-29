<?php

// app/Http/Controllers/VolunteerHistoryController.php

namespace App\Http\Controllers;

use App\Models\VolunteerHistory;
use Illuminate\Http\Request;

class VolunteerHistoryController extends Controller
{
    // عرض جميع تاريخ المتطوعين
    public function index()
    {
        return VolunteerHistory::all();
    }

    // إضافة تاريخ متطوع جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'volunteer_id' => 'required|exists:volunteer_profiles,id',
            'post_id' => 'required|exists:posts,id',
            'company_id' => 'required|exists:company_profiles,id',
            'title' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:Completed,In Progress,Cancelled',
            'feedback' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $history = VolunteerHistory::create($validated);

        return response()->json($history, 201);
    }

    // عرض تاريخ متطوع معين
    public function show($id)
    {
        $history = VolunteerHistory::findOrFail($id);

        return response()->json($history);
    }

    // تحديث تاريخ متطوع
    public function update(Request $request, $id)
    {
        $history = VolunteerHistory::findOrFail($id);

        $validated = $request->validate([
            'end_date' => 'nullable|date',
            'status' => 'nullable|in:Completed,In Progress,Cancelled',
            'feedback' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $history->update($validated);

        return response()->json($history);
    }

    // حذف تاريخ متطوع
    public function destroy($id)
    {
        $history = VolunteerHistory::findOrFail($id);
        $history->delete();

        return response()->json(null, 204);
    }
}
