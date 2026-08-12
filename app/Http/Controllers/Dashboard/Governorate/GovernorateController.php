<?php

namespace App\Http\Controllers\Dashboard\Governorate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Governorate\GovernorateRequest;
use App\Http\Requests\Governorate\UpdateGovernorateRequest;
use App\Http\Resources\Governorate\GovernorateResource;
use App\Models\Dashboard\Governorate\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Governorates retrieved successfully',
            'data'    => GovernorateResource::collection($governorates),
        ], 200);
    }

    public function store(GovernorateRequest $request)
    {
        $governorate = Governorate::create($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Governorate created successfully',
            'data'    => new GovernorateResource($governorate),
        ], 201);
    }

    public function show(string $id)
    {
        $governorate = Governorate::find($id);

        if (!$governorate) {
            return response()->json(['status' => false, 'message' => 'Governorate not found'], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Governorate retrieved successfully',
            'data'    => new GovernorateResource($governorate),
        ], 200);
    }

    public function update(UpdateGovernorateRequest $request, string $id)
    {
        $governorate = Governorate::find($id);

        if (!$governorate) {
            return response()->json(['status' => false, 'message' => 'Governorate not found'], 404);
        }

        $governorate->update($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Governorate updated successfully',
            'data'    => new GovernorateResource($governorate),
        ], 200);
    }

    public function softDelete(string $id)
    {
        $governorate = Governorate::find($id);

        if (!$governorate) {
            return response()->json(['status' => false, 'message' => 'Governorate not found'], 404);
        }

        $governorate->delete();

        return response()->json(['status' => true, 'message' => 'Governorate soft deleted successfully']);
    }

    public function trashed()
    {
        $governorates = Governorate::onlyTrashed()->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed governorates retrieved successfully',
            'data'    => GovernorateResource::collection($governorates),
        ], 200);
    }

    public function restore(string $id)
    {
        $governorate = Governorate::withTrashed()->find($id);

        if (!$governorate || !$governorate->trashed()) {
            return response()->json(['status' => false, 'message' => 'Governorate not found or not deleted'], 404);
        }

        $governorate->restore();

        return response()->json(['status' => true, 'message' => 'Governorate restored successfully']);
    }

    public function forceDelete(string $id)
    {
        $governorate = Governorate::withTrashed()->find($id);

        if (!$governorate) {
            return response()->json(['status' => false, 'message' => 'Governorate not found'], 404);
        }

        $governorate->forceDelete();

        return response()->json(['status' => true, 'message' => 'Governorate permanently deleted']);
    }
}
