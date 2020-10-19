<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    // Ham hien thi view nhap thong tin login
    public function index()
    {
        // Lay thong tin user dang dang nhap
        // dd($user = Auth::user());

        if (Auth::check()) {
            return redirect()->route('students.index');
        }

        return view('login');
    }

    // Ham xu ly viec login
    public function postLogin(Request $request)
    {
        // use Auth;
        $data = $request->only('email', 'password');
        // Kiem tra login su dung Auth
        if (Auth::attempt($data)) {
            return redirect()->route('students.index');
        }

        return redirect()->route('get-login');
        // redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('get-login');
    }
}
