<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeviceController extends Controller
{
    public function index(): JsonResponse
    {
        $devices = Device::all();
        return response()->json($devices);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'serial_number' => 'required|string|max:255|unique:devices,serial_number',
            'status' => 'required|string|max:255',
        ]);

        $device = Device::create($validated);

        return response()->json($device, 201);
    }

    public function show(string $id): JsonResponse
    {
        $device = Device::findOrFail($id);
        return response()->json($device);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $device = Device::findOrFail($id);

        $validated = $request->validate([
            'serial_number' => 'sometimes|required|string|max:255|unique:devices,serial_number,' . $device->id,
            'status' => 'sometimes|required|string|max:255',
        ]);

        $device->update($validated);

        return response()->json($device);
    }

    public function destroy(string $id): JsonResponse
    {
        $device = Device::findOrFail($id);
        $device->delete();

        return response()->json(null, 204);
    }
}
