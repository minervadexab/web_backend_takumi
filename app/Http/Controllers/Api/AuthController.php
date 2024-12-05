<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SettingRole;
use App\Models\SettingRoles;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user, 'access_token' => $token]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }
        // $request->session()->regenerate();
        $user = User::where('email', $request['email'])->firstOrFail();
        // $request->user()->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['success' => true, 'message' => 'Hi ' . $user->name . ', Welcome to Admin Panel', 'access_token' => $token, 'email' => $user->email]);
    }

    public function prosesLogin(Request $request) 
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        // Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return redirect()->back()->with('error', 'Email tidak terdaftar');
        }
 
        // Verifikasi password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password salah');
        }
 
        // Check if user has 'Admin' role
        $adminRole = SettingRole::where('users_id', $user->id)
            ->where('roles_id', 3)
            ->first();
 
        if (empty($adminRole)) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses sebagai Admin');
        }
 
        // Login pengguna
        Auth::login($user);
 
        // Buat token
        $token = $user->createToken('auth_token')->plainTextToken;
 
        // Redirect dengan token
        return redirect()->route('index')->with('success', 'Login berhasil')->with('access_token', $token);
    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        //auth()->user()->tokens()->delete();

        return response()
            ->json(['success' => true,
                'message' => 'Thank You.',
            ]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function search(Request $request)
    {
        try {
            $data = User::where('name', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->get();
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data tersedia',
            ];
            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => $th,
            ];
            return response()->json($response, 500);
        }
    }
}
