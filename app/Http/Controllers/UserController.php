<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Collector;
use App\Models\Debtor;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard'); // Redirect to the dashboard or any other route

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:collector',
            'password' => 'required',
        ]);

        $collector = new Collector();
        $collector->name = $request->name;
        $collector->email = $request->email;
        $collector->password = bcrypt($request->password);
        $collector->save();

        if ($collector->save()){
            echo "<script>alert('Registration Successful'); window.location.href='".route("welcome")."';</script>";
            exit;
        } else {
            echo "<script>alert('Email already exists or an error occurred.');</script>";
            return view("auth.register");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'You have been logged out successfully!');
    }

    public function showDashboard()
    {
        $collectorId = Auth::id();
        $debtors = Debtor::where('collector_id', $collectorId)->get();

        return view('dashboard', compact('debtors'));
    }
}
