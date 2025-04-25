<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TrackingData;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TrackingDataController extends Controller
{
    public function index(): JsonResponse
    {
        $trackingData = TrackingData::all();
        return response()->json($trackingData);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'device_id' => 'required|exists:devices,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'timestamp' => 'required|date',
        ]);

        $trackingData = TrackingData::create($validated);

        return response()->json($trackingData, 201);
    }

    public function show(string $id): JsonResponse
    {
        $trackingData = TrackingData::findOrFail($id);
        return response()->json($trackingData);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $trackingData = TrackingData::findOrFail($id);

        $validated = $request->validate([
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'device_id' => 'sometimes|required|exists:devices,id',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
            'timestamp' => 'sometimes|required|date',
        ]);

        $trackingData->update($validated);

        return response()->json($trackingData);
    }

    public function destroy(string $id): JsonResponse
    {
        $trackingData = TrackingData::findOrFail($id);
        $trackingData->delete();

        return response()->json(null, 204);
    }
}
