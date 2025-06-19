<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SubCategories;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = constant_list(Categories::class);
        $subcategories = constant_list(SubCategories::class);
        $courses = Course::paginate(10);
        return view('admin.course.index', compact('courses', 'categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = constant_list(Categories::class);
        $subcategories = constant_list(SubCategories::class);

        return view('admin.course.add', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'subcategory_id' => 'nullable|integer',
            'fee' => 'required|numeric',
            'picture' => 'nullable|image',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('course_images', 'public');
        }

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = constant_list(Categories::class);
        $subcategories = constant_list(SubCategories::class);

        return view('admin.course.edit', compact('course', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'fee' => 'required|numeric',
            'status' => 'required|boolean',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Picture upload (optional)
        if ($request->hasFile('picture')) {
            // Delete old image if exists
            if ($course->picture && Storage::disk('public')->exists($course->picture)) {
                Storage::disk('public')->delete($course->picture);
            }

            // Store new image
            $validated['picture'] = $request->file('picture')->store('course_images', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Delete associated image if it exists
        if ($course->picture && Storage::disk('public')->exists($course->picture)) {
            Storage::disk('public')->delete($course->picture);
        }

        // Delete the course
        $course->delete();

        // Redirect with success message
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
