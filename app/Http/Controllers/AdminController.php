<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private const COURSE_VALIDATOR = [
        'title' => 'required|string|max:100',
        'duration' => 'required|integer',
        'cost' => 'required|string|max:10',
        'description' => 'required|string',
        'image' => 'required|string|max:255'
    ];

    private const CATEGORY_VALIDATOR = [
        'title' => 'required|string|max:100'
    ];

	public function index()
    {
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $applications = Application::paginate(10);

        return view('admin', ['applications' => $applications]);
    }

	public function courses()
    {
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $courses = Course::paginate(5);

        return view('courses', ['courses' => $courses]);
    }

	public function create_category_page()
    {
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        return view('category-create');
    }

	public function add_course_page()
    {
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        return view('add-course');
    }

	public function edit_course_page(Course $course)
    {
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }
        
        $categories = Category::all();

        return view('course-edit', ['course' => $course, 'categories' => $categories]);
    }

	public function create_course_page()
    {
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }
        
        $categories = Category::all();

        return view('course-create', ['categories' => $categories]);
    }

	public function delete_course(Request $request) {        
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        Course::find($request->id)->delete();
        return redirect()->route('courses');
	}

	public function course_edit(Request $request) {        
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $request->validate(self::COURSE_VALIDATOR);

        $course = Course::find($request->id);
        $course->title = $request->title;
        $course->duration = $request->duration;
        $course->cost = $request->cost;
        $course->description = $request->description;
        $course->image = $request->image;
        $course->category_id = $request->category_id;
        $course->save();
        return redirect()->route('courses');
	}

	public function course_create(Request $request) {        
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $request->validate(self::COURSE_VALIDATOR);

        $course = Course::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'cost' => $request->cost,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id]);

        $course->save();
        return redirect()->route('courses');
	}

	public function category_create(Request $request) {        
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $request->validate(self::CATEGORY_VALIDATOR);

        $category = Category::create([
            'title' => $request->title]);

        $category->save();
        return redirect()->route('admin.home');
	}

	public function reject_application(Request $request) {        
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $application = Application::find($request->id);

        $application->status = "rejected";
        $application->save();
        return redirect()->route('admin.home');
	}

	public function approve_application(Request $request) {        
        $user = Auth::user();

        if ($user->is_admin == 0) {
            return abort('403');
        }

        $application = Application::find($request->id);

        $application->status = "approved";
        $application->save();
		return redirect()->route('admin.home');
	}

	// public function store_category(Request $request) {
	// 	// Auth::user()->applications()->create(['user_id' => Auth::user()->id,
	// 	// 									  'short_description' => $request->short_description,
	// 	// 									  'full_description' => $request->full_description]);
	// 	return redirect()->route('home');
	// }


}
