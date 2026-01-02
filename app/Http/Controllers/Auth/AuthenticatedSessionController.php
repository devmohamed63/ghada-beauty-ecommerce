<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View|RedirectResponse
    {
        // If user is already authenticated and is admin, redirect to dashboard
        if (auth()->check() && auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        
        // If user is authenticated but not admin, redirect to home
        if (auth()->check()) {
            return redirect()->route('home');
        }
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect admin users to admin dashboard
        if (auth()->user()->is_admin) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        // Redirect regular users to home
        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Check if user was admin before logout
        $wasAdmin = auth()->check() && auth()->user()->is_admin;
        
        // Check if logout request came from admin area (from form input or referer)
        $fromAdmin = $request->has('from_admin') || 
                     ($request->header('referer') && str_contains($request->header('referer'), '/admin'));
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect to admin login if was admin or logout came from admin area
        if ($wasAdmin || $fromAdmin) {
            return redirect()->route('admin.login')->with('status', 'تم تسجيل الخروج بنجاح');
        }

        return redirect('/');
    }
}
