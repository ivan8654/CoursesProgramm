<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private const VALIDATOR = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users'
    ];

	public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin == false) {
            return abort('403');
        }

        $applications = Application::paginate(10);

        return view('admin', ['applications' => $applications]);
    }

	// public function store(Request $request) {
	// 	Auth::user()->applications()->create(['user_id' => Auth::user()->id,
	// 										  'short_description' => $request->short_description,
	// 										  'full_description' => $request->full_description]);
	// 	return redirect()->route('home');
	// }

	// public function update(Request $request) {
    //     $request->validate(self::VALIDATOR);
    //     $user = Auth::user();
    //     $user->email = $request->email;
    //     $user->name = $request->name;
    //     $user->save();
	// 	return redirect()->route('home');
	// }
}
