<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $data = $request->all();

        if (!isset($data["nisn"]) || empty($data["nisn"])) {
            return back()->withErrors(['msg' => 'NISN cannot be empty!']);
        } else if (!is_numeric($data['nisn'])) {
            return back()->withErrors(['msg' => 'NISN must be a number!']);
        }

        if (!isset($data["password"]) || empty($data["password"])) {
            return back()->withErrors(['msg' => 'The password cannot be empty!']);
        }
        $nisn = $data['nisn'];
        $password = $data['password'];


        if (!Auth::attempt([
            'nisn_nrp' => $nisn,
            'password' => $password
        ])) {
            return back()->withErrors(['msg' => 'Your password and NISN are incorrect']);
        }
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}