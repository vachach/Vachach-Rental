<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the houses.
     */
    public function index()
    {
        $houses = House::all();
        return response()->json($houses);
    }

    /**
     * Show the form for creating a new house.
     */
    public function create()
    {
        return view('houses.create');
    }

    /**
     * Store a newly created house in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'landlord_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'house_type' => 'required|in:apartment,villa,studio,shared_room,office',
            'max_occupants' => 'nullable|integer|min:1',
            'available_from' => 'nullable|date',
            'amenities' => 'nullable|array',
        ]);

        $house = House::create($validated);
        return response()->json($house, 201);
    }

    /**
     * Display the specified house.
     */
    public function show(House $house)
    {
        return response()->json($house);
    }

    /**
     * Show the form for editing the specified house.
     */
    public function edit(House $house)
    {
        return view('houses.edit', compact('house'));
    }

    /**
     * Update the specified house in storage.
     */
    public function update(Request $request, House $house)
    {
        $validated = $request->validate([
            'landlord_id' => 'sometimes|exists:users,id',
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'address' => 'sometimes|string|max:255',
            'city' => 'nullable|string|max:100',
            'price' => 'sometimes|numeric|min:0',
            'house_type' => 'sometimes|in:apartment,villa,studio,shared_room,office',
            'max_occupants' => 'nullable|integer|min:1',
            'available_from' => 'nullable|date',
            'amenities' => 'nullable|array',
        ]);

        $house->update($validated);
        return response()->json($house);
    }

    /**
     * Remove the specified house from storage.
     */
    public function destroy(House $house)
    {
        $house->delete();
        return response()->json(null, 204);
    }
}
