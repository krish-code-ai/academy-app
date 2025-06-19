<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Categories;
use Illuminate\Http\Request;
use SubCategories;

class HomeController extends Controller
{
    public function getIndex()
    {
        $categories = constant_list(Categories::class);
        $subcategories = constant_list(SubCategories::class);
        $courses = Course::where('status', 1)
        ->latest()
        ->take(3)
        ->get();

        return view('site.pages.home', compact('courses', 'categories'));
    }
}
