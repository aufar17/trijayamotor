<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function createUser()
    {
        $user = request()->post();
        $data = [
            'username' => $user['username'],
            'password' => $user['password'], 
            'role' => $user['role'],
        ];
    
        $res = User::create($data);
        if (!$res) {
            return redirect()->route('settings', ['tab' => 'create-user'])->with('error', 'User failed to create');
        }
    
        return redirect()->route('settings', ['tab' => 'create-user'])->with('success', 'User created successfully');
    }

    public function changePassword(){
        $params = request()->post();
        try {
            $session = session('user');
            !$session && throw new \Exception();

            $user = User::where('id',$session->id)->first();
            !$user && throw new \Exception();

            $user->password = $params['password'];
            $user->save();
        } catch (\Throwable $th) {
            return redirect()->route('settings', ['tab' => 'change-password'])->with('error', 'User failed to create');
        }
    
        return redirect()->route('settings', ['tab' => 'change-password'])->with('success', 'Password has been changed');
    }

    public function userDelete()
    {
        $id = request()->post('id');
        $user = User::where('id', $id)->first();
        if (!$user) {
            return redirect()->route('settings', ['tab' => 'create-user'])->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('settings', ['tab' => 'create-user'])->with('success', 'User deleted successfully');
    }
    
}
