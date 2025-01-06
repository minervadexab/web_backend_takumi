<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Models\SettingRole;
// use App\Models\SettingRoles;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register a new user.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'prodi_id' => $request->prodi_id,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user, 'access_token' => $token], 201);
    }

    /**
     * User login.
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Hi ' . $user->name . ', Welcome to Admin Panel',
            'access_token' => $token,
            'email' => $user->email,
        ]);
    }

    /**
     * Process user login.
     */
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

        // Login pengguna
        Auth::login($user);

        // Buat token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Redirect dengan token
        return redirect()->route('index')->with('success', 'Login berhasil')->with('access_token', $token);
    }

    /**
     * User logout.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['success' => true, 'message' => 'Thank You.']);
    }
    
    /**
     * Search for users.
     */
    public function search(Request $request)
    {
        try {
            $data = User::where('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                        ->get();
            
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data tersedia',
            ];
            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
}
