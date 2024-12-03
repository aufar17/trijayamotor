<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Data ditampilkan',
            'data' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Validasi eror',
                    'errors' => $validator->errors(),
                ],
                422
            );
        }

        $user = User::create($request->all());
        return response()->json(
            [
                'status' => true,
                'message' => 'Data sukses ditambahkan',
                'data' => $user,
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return response()->json(
            [
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $user
            ],
            201
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Validasi eror',
                    'errors' => $validator->errors(),
                ],
                422
            );
        }

        $user = User::where('id', $id)->first();
        $user->update($request->all());
        return response()->json(
            [
                'status' => true,
                'message' => 'Data sukses ditambahkan',
                'data' => $user,
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return response()->json(
            [
                'status' => true,
                'message' => 'Data dihapus',
            ],
            204
        );
    }
}


// public function Register(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'username' => 'required|string',
//             'password' => 'required',
//             'password' => 'required|string',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(
//                 [
//                     'status' => false,
//                     'message' => 'Validasi eror',
//                     'errors' => $validator->errors(),
//                 ],
//                 422
//             );
//         }


//         $user = User::create($request->all());
//         return response()->json(
//             [
//                 'status' => true,
//                 'message' => 'Data sukses ditambahkan',
//                 'data' => $user,
//             ],
//             201
//         );
//     }

//     public function signin(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'username' => 'required|string',
//             'password' => 'required',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(
//                 [
//                     'status' => false,
//                     'message' => 'Validasi gagal',
//                     'errors' => $validator->errors(),
//                 ],
//                 422
//             );
//         }

//         // Cek user berdasarkan username
//         $user = User::where('username', $request->username)->first();

//         if (!$user || ! Hash::check($request->password, $user->password)) {
//             return response()->json(
//                 [
//                     'status' => false,
//                     'message' => 'Login gagal, username atau password salah',
//                 ],
//                 401
//             );
//         }

//         // Berhasil login
//         $user->makeHidden(['password']); // Sembunyikan password
//         return response()->json(
//             [
//                 'status' => true,
//                 'message' => 'Login berhasil',
//                 'data' => $user,
//             ],
//             200
//         );
//     }
