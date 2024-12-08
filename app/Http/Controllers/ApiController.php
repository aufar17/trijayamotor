<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);


        $user = User::where('username', $validatedData['username'])->first();

        $res = [
            'responseCode' => 1,
            'responseDesc' => 'Login Success',
            'responseData' => [$user],
        ];

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            Session::put('user', $user);

            return response()->json($res);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }
}
