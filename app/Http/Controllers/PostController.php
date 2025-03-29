<?php

// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // عرض جميع الوظائف
    public function index()
    {
        return Post::all();
    }

    // إضافة وظيفة جديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:company_profiles,id',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $post = Post::create($validated);

        return response()->json($post, 201);
    }

    // عرض بيانات وظيفة معينة
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post);
    }

    // تحديث بيانات وظيفة
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $post->update($validated);

        return response()->json($post);
    }

    // حذف وظيفة
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }
}
