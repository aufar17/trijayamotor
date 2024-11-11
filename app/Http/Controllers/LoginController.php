<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // public function loginProcess(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'username' => 'required|string',
    //         'password' => 'required|min:6',
    //     ]);

    //     $user = User::where('username', $validatedData['username'])->first();

    //     if ($user && Hash::check($validatedData['password'], $user->password)) {
    //         session(['login' => true, 'user_id' => $user->id, 'user_name' => $user->username, 'user_email' => $user->email]);

    //         return redirect()->intended('index');
    //     }

    //     return back()->withErrors([
    //         'username' => 'Username atau password salah.',
    //     ])->withInput($request->only('username'));
    // }
}
