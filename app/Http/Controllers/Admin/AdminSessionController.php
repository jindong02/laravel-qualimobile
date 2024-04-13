<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSessionController extends Controller {

    public function Dashboard() {
        return redirect(route('admin.produtos'));
        //return view('admin.dashboard');
    }

    public function Login() {
        return view('admin.login');
    }

    public function FazerLogin(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(route('admin.dashboard'));
    }

    public function Logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
