<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Handle registration form submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Register successfully');
    }

    /**
     * Show the login form.
     *
     * @return View
     */
    public function login(): View
    {
        return view('login');
    }

    /**
     * Handle login form submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(Request $request)
    {
        // Validate form input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'freelancer') {
                return redirect('/freelancer-dashboard')->with('success', 'Login successful');
            }

            return redirect('/home')->with('success', 'Login successful');
        }

        return back()->with('error', 'Email or Password incorrect');
    }
    /**
     * Show the freelancer dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function freelancerDashboard(): View
    {
        // Your logic to show the freelancer dashboard
        return view('freelancer.dashboard');
    }
    public function clientDashboard()
    {
        // Implement client-specific dashboard logic here
        return view('client.dashboard');
    }
    

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
