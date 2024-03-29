<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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

    private const VALIDATOR = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users'
    ];

	public function index()
    {
        $user = Auth::user();
        $applications = $user->applications;

        return view('home', ['applications' => $applications, 'user' => $user]);
    }

	// public function store(Request $request) {
	// 	Auth::user()->applications()->create(['user_id' => Auth::user()->id,
	// 										  'short_description' => $request->short_description,
	// 										  'full_description' => $request->full_description]);
	// 	return redirect()->route('home');
	// }

	public function update(Request $request) {
        $request->validate(self::VALIDATOR);
        $user = Auth::user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();
		return redirect()->route('home');
	}
	
}
