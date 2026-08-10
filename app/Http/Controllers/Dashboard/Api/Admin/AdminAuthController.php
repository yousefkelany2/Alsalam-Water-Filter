<?php

namespace App\Http\Controllers\Dashboard\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminResource;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    protected $guard;

    public function __construct()
    {
        $this->guard = 'admin-api';

        auth()->shouldUse($this->guard);
    }

    /**
     * Admin Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $credentials = $request->only('phone', 'password');

            if (! $token = auth($this->guard)->attempt($credentials)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Invalid phone or password.'
                ], 401);
            }

            return $this->respondWithToken($token, 'Admin logged in successfully');

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Login failed.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get Logged Admin
     */
    public function me()
    {
        return response()->json([
            'status'  => true,
            'message' => 'Admin profile retrieved successfully',
            'data'    => new AdminResource(auth($this->guard)->user()),
        ], 200);
    }

    /**
     * Logout (Invalidate Token)
     */
    public function logout()
    {
        auth($this->guard)->logout();

        return response()->json([
            'status'  => true,
            'message' => 'Admin logged out successfully'
        ], 200);
    }

    /**
     * Refresh Token
     */
    public function refresh()
    {
        $newToken = auth($this->guard)->refresh();

        return $this->respondWithToken($newToken, 'Token refreshed successfully');
    }

    /**
     * Token Response Structure
     */
    protected function respondWithToken($token, $message = 'Success')
    {
        return response()->json([
            'status'       => true,
            'message'      => $message,
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth($this->guard)->factory()->getTTL() * 60,
            'admin'        => new AdminResource(auth($this->guard)->user()),
        ], 200);
    }
}
