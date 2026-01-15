<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PersisLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login using staff_id and no_kp
     */
    public function login(Request $request)
    {
        $request->validate([
            'staff_id' => 'required|string',
            'user_pwd' => 'required|string',
        ]);

        $login = PersisLogin::where('staff_id', $request->staff_id)->first();

        if (!$login || $login->user_pwd !== $request->user_pwd) {
            throw ValidationException::withMessages([
                'staff_id' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Create token for the staff
        $token = $login->createToken('api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'login' => $login,
                'token' => $token,
            ],
        ], 200);
    }

    /**
     * Logout (revoke current token)
     */
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ], 200);
    }

    /**
     * Get authenticated staff information
     */
    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'staff' => $request->user(),
            ],
        ], 200);
    }

    /**
     * Revoke all tokens for the authenticated staff
     */
    public function logoutAll(Request $request)
    {
        // Revoke all tokens for the authenticated staff
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'All sessions logged out successfully',
        ], 200);
    }
}
