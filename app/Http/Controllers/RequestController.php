<?php

// app/Http/Controllers/RequestController.php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    // عرض جميع الطلبات
    public function index()
    {
        return Request::all();
    }

    // إضافة طلب جديد
    public function store(HttpRequest $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'volunteer_id' => 'required|exists:volunteer_profiles,id',
            'status' => 'required|in:Pending,Approved,Rejected',
            'company_decision' => 'nullable|string',
        ]);

        $newRequest = Request::create($validated);

        return response()->json($newRequest, 201);
    }

    // عرض بيانات طلب معين
    public function show($id)
    {
        $request = Request::findOrFail($id);

        return response()->json($request);
    }

    // تحديث طلب معين
    public function update(HttpRequest $request, $id)
    {
        $existingRequest = Request::findOrFail($id);

        $validated = $request->validate([
            'status' => 'nullable|in:Pending,Approved,Rejected',
            'company_decision' => 'nullable|string',
        ]);

        $existingRequest->update($validated);

        return response()->json($existingRequest);
    }

    // حذف طلب
    public function destroy($id)
    {
        $existingRequest = Request::findOrFail($id);
        $existingRequest->delete();

        return response()->json(null, 204);
    }
}
