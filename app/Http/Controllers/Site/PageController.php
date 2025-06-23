<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        return view('site.pages.student_life');
    }

    public function get_student_life_single()
    {
        return view('site.pages.single_gallery');
    }

}
