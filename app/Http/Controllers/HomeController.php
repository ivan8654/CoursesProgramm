<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function index()
    {
        $courses = Course::paginate(10);

        return view('home', compact('courses'));
    }
	public function store(Request $request) {
		Auth::user()->applications()->create(['user_id' => Auth::user()->id,
											  'short_description' => $request->short_description,
											  'full_description' => $request->full_description)]);
		return redirect()->route('home');
	}
	
}
