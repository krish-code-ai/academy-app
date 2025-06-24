<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Gallery;
use Categories;
use Illuminate\Http\Request;
use SubCategories;

class PageController extends Controller
{
    public function get_about()
    {
        return view('site.pages.about');
    }

    public function get_blogs()
    {
        return view('site.pages.blogs');
    }

    public function get_contact()
    {
        return view('site.pages.contact');
    }

    public function get_courses()
    {
        $categories = constant_list(Categories::class);
        $subcategories = constant_list(SubCategories::class);
        $courses = Course::where('status', 1)->paginate(6);
        return view('site.pages.courses', compact('categories', 'subcategories', 'courses'));
    }

    public function get_student_life()
    {
        $galleries = Gallery::latest()->get();
        return view('site.pages.student_life', compact('galleries'));
    }

    public function get_student_life_single($id)
    {
        $gallery = Gallery::find($id);
        return view('site.pages.single_gallery', compact('gallery'));
    }

    public function get_register_from()
    {
        return view('site.pages.online_register');
    }
}
