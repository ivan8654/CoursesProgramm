<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

use App\Models\Application;

use App\Models\Category;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
		if ($request->has('category')) {
			$courses = Course::where('category_id', '=', $request->category)->paginate(15);
		} else {
			$courses = Course::paginate(3);
		}
		$categories = Category::paginate(3);

        return view('index', ['courses' => $courses, 'categories' => $categories]);
    }
	public function detail(Course $course) {
		return view('detail', ['course' => $course]);
	}
	public function store_application(Request $request)
    {
        $application = new Application();
        $application->full_name = $request->fio;
		$application->email = $request->email;
		$application->course_id = $request->course;
		$application->application_date = date('Y-m-d H:i:s');
		$application->status = 'pending';
        $application->save();
        return $this->index();
    }
}
