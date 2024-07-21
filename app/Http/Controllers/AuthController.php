<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Transaksi;
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
    function register()
    {
        return view('register');
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
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);

        try {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                // 'role' => "Admin",
            ]);

            // If the user is created successfully, redirect back with success message
            return back()->with('success', 'Registered successfully');
        } catch (\Exception $e) {
            // If there is any error, redirect back with error message
            return redirect()->back()->withErrors(['error' => $e . 'Failed to save data.']);
        }
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
            session(['user_id' => Auth::user()->id]);
            if (Auth::user()->role == 'Admin') {
                return redirect('/admin/index');
            }
            return redirect('/')->with('success', 'Login successful');
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
        return view('find-job');
    }
    public function clientDashboard()
    {
        // Implement client-specific dashboard logic here
        return view('post-job');
    }

    public function adminDashboard()
    {

        $totalBelumSelesai = Pekerjaan::latest()->where('status', 'Open')->orWhere('status', 'working')->count();
        $totalPekerjaan = Pekerjaan::count();
        $totalSelesai = Pekerjaan::where('status', 'Finish')->count();
        $totalTransaksi = Transaksi::count();
        $totalClient = User::where('role','Client')->count();
        $totalTalent = User::where('role','Freelancer')->count();
        return view("admin.index", compact("totalBelumSelesai", "totalPekerjaan", "totalSelesai", "totalTransaksi","totalClient","totalTalent"));
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
