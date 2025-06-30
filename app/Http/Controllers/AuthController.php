<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Info(
 *     title="Skincare API",
 *     version="1.0.0"
 * )
 *
 * @OA\Server(
 *     url="http://127.0.0.1:8000",
 *     description="Local Development Server"
 * )
 */


/**
 * @OA\Tag(
 *     name="Authentication",
 *     description="Autentikasi pengguna (register, login, whoami, logout)"
 * )
 */

/**
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     in="header",
 *     name="Authorization"
 * )
 */
class AuthController extends Controller
{
   /**
 * @OA\Post(
 *     path="/api/register",
 *     tags={"Authentication"},
 *     summary="Register pengguna baru",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email", "password"},
 *             @OA\Property(property="name", type="string", example="Admin Vanessa"),
 *             @OA\Property(property="email", type="string", example="admin.vanessa@email.com"),
 *             @OA\Property(property="password", type="string", example="admin123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Berhasil register dan dapat token",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User registered successfully"),
 *             @OA\Property(property="token", type="string", example="1|abc123..."),
 *             @OA\Property(property="role", type="string", example="admin")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Gagal register"
 *     )
 * )
 */

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Otomatis tetapkan role berdasarkan email
       $role = strpos($validated['email'], 'admin') !== false ? 'admin' : 'customer';

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $role
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token,
            'role' => $role
        ], 201);
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="Login untuk mendapatkan token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="admin.vanessa@email.com"),
     *             @OA\Property(property="password", type="string", example="admin123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Berhasil login dan mendapatkan token"),
     *     @OA\Response(response=401, description="Email atau password salah")
     * )
     */
  public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    if (!Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Login successful',
        'token' => $token,
        'user' => $user
    ]);
}
    /**
     * @OA\Get(
     *     path="/api/whoami",
     *     tags={"Authentication"},
     *     summary="Cek user yang sedang login",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="Data user berhasil ditampilkan"),
     *     @OA\Response(response=401, description="Unauthorized (token tidak valid)")
     * )
     */
    public function whoami(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"Authentication"},
     *     summary="Logout / hapus token login",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="Berhasil logout")
     * )
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
        }

        return response()->json(['message' => 'Logged out']);
    }
}