<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ContentBlocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function showLoginForm()
    {
        $officeContent = ContentBlocks::where('key', 'office-address')->first();
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        return view('auth.admin-login', compact('officeContent', 'phoneContent', 'emailContent'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {  // Use 'admin' guard here
            return redirect()->intended('/admin/dashboard'); // Admin dashboard route
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
