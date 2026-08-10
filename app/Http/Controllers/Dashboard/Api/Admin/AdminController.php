<?php

namespace App\Http\Controllers\Dashboard\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Http\Resources\Admin\AdminResource;
use App\Models\Dashboard\Admin\Admin;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Admins retrieved successfully',
            'data'    => AdminResource::collection($admins),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = ImageService::saveImage($request->file('image'), 'admins');
        }

        $admin = Admin::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Admin created successfully',
            'data'    => new AdminResource($admin),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'status'  => false,
                'message' => 'Admin not found',
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Admin retrieved successfully',
            'data'    => new AdminResource($admin),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, string $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'status'  => false,
                'message' => 'Admin not found',
            ], 404);
        }

        $data = $request->only(['name', 'name_ar', 'email', 'phone', 'role']);

        if ($request->hasFile('image')) {

            ImageService::deleteImage($admin->image);

            $data['image'] = ImageService::saveImage($request->file('image'), 'admins');
        }

        $admin->update($data);

        if ($request->filled('password')) {
            if (!Hash::check($request->old_password, $admin->password)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Validation error',
                    'errors'  => [
                        'old_password' => ['Old password is incorrect'],
                    ],
                ], 422);
            }

            $admin->update([
                'password' => $request->password,
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Admin updated successfully',
            'data'    => new AdminResource($admin),
        ], 200);
    }

    /**
     * Remove the specified resource from storage (Soft Delete).
     */
    public function softDelete(string $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'status'  => false,
                'message' => 'Admin not found',
            ], 404);
        }

        $protectedPhones = ['01271491240', '01275632428'];
        if (in_array($admin->phone, $protectedPhones)) {
            return response()->json([
                'status'  => false,
                'message' => 'Action denied: This admin account is protected and cannot be deleted.',
            ], 403);
        }

        $admin->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Admin soft deleted successfully',
        ]);
    }

    /**
     * Permanently remove the specified resource.
     */
    public function forceDelete(string $id)
    {
        $admin = Admin::withTrashed()->find($id);

        if (!$admin) {
            return response()->json([
                'status'  => false,
                'message' => 'Admin not found',
            ], 404);
        }

        $protectedPhones = ['01271491240', '01275632428'];
        if (in_array($admin->phone, $protectedPhones)) {
            return response()->json([
                'status'  => false,
                'message' => 'Action denied: This admin account is protected and cannot be permanently deleted.',
            ], 403);
        }

        if ($admin->image) {
            ImageService::deleteImage($admin->image);
        }

        $admin->forceDelete();

        return response()->json([
            'status'  => true,
            'message' => 'Admin permanently deleted',
        ]);
    }

    /**
     * Get all soft deleted resources.
     */
    public function trashed()
    {
        $admins = Admin::onlyTrashed()->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed admins retrieved successfully',
            'data'    => AdminResource::collection($admins),
        ], 200);
    }

    /**
     * Restore the specified soft deleted resource.
     */
    public function restore(string $id)
    {
        $admin = Admin::withTrashed()->find($id);

        if (!$admin) {
            return response()->json([
                'status'  => false,
                'message' => 'Admin not found',
            ], 404);
        }

        if (!$admin->trashed()) {
            return response()->json([
                'status'  => false,
                'message' => 'Admin is not deleted',
            ], 400);
        }

        $admin->restore();

        return response()->json([
            'status'  => true,
            'message' => 'Admin restored successfully',
        ]);
    }

    /**
     * Get the authenticated admin profile.
     */
    public function profile()
    {
        $admin = auth()->guard('admin-api')->user();

        return response()->json([
            'status'  => true,
            'message' => 'Profile retrieved successfully',
            'data'    => new AdminResource($admin),
        ], 200);
    }
}
