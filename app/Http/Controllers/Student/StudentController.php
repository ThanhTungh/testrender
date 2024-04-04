<?php

namespace App\Http\Controllers\Student;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Login view
    public function login_view()
    {
        return view('student.auth.login');
    }

    // Login submit
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:6',
        ]);

        $credenticals = [
            "email" => $request->email,
            "password" => $request->password,
        ];


        if (Auth::guard('student')->attempt($credenticals)) {
            return redirect()->route('student_home');
        } else {
            return redirect()->route('student_login')->with('error', 'Information is not correct');
        }
    }

    // Homepage
    public function home()
    {
        return view('student.Website.home');
    }

    // Dashboard
    public function dashboard()
    {
        return view('student.Website.dashboard');
    }

    // List faculties
    public function list_faculties()
    {
        $faculties = Faculty::get();
        return view('student.Website.list_faculties', compact('faculties'));
    }
}
