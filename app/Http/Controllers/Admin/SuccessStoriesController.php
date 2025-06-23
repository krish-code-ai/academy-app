<?php

namespace App\Http\Controllers\Admin;

use App\Models\Success_stories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuccessStoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Success_stories::orderBy('id', 'desc')->paginate(10);
        return view('admin.success_stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.success_stories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'message' => 'required|string',
            'status' => 'required|in:0,1',
            'professional' => 'required|string|max:255',
        ]);

        if ($request->hasFile('profile')) {
            $validated['profile'] = $request->file('profile')->store('success_stories', 'public');
        }


        Success_stories::create($validated);

        return redirect()->route('admin.success_stories.index')->with('success', 'Success stories created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Success_stories $success_stories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Success_stories $success_stories, $id)
    {
        $success_story =  Success_stories::findOrFail($id);
        return view('admin.success_stories.edit', compact('success_story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Success_stories $success_stories, $id)
    {
        $success_story =  Success_stories::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'message' => 'nullable|string',
            'status' => 'required|in:0,1',
            'professional' => 'nullable|string|max:255',
        ]);

        // Picture upload (optional)
        if ($request->hasFile('profile')) {
            // Delete old image if exists
            if ($success_story->profile && Storage::disk('public')->exists($success_story->profile)) {
                Storage::disk('public')->delete($success_story->profile);
            }

            // Store new image
            $validated['profile'] = $request->file('profile')->store('success_stories', 'public');
        }

        $success_story->update($validated);

        return redirect()->route('admin.success_stories.index')->with('success', 'Success story updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Success_stories $success_stories, $id)
    {
        $story = Success_stories::findOrFail($id);

        // Delete profile image if it exists
        if ($story->profile && Storage::disk('public')->exists($story->profile)) {
            Storage::disk('public')->delete($story->profile);
        }

        // Delete the record
        $story->delete();

        return redirect()->route('admin.success_stories.index')->with('success', 'Success story deleted successfully.');
    }
}
