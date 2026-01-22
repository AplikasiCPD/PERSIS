<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agama;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Agama::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agama = Agama::create([
            ...$request->validate([
                'kod_agama' => 'required|string|max:10',
                'info_agama' => 'required|string|max:100',
            ]),
        ]);

        return $agama;
    }

    /**
     * Display the specified resource.
     */
    public function show(Agama $agama)
    {
        return $agama;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agama $agama)
    {
        $validated = $request->validate([
            'info_agama' => 'required|string|max:100',
        ]);

        $agama->update($validated);

        return $agama;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        $agama->delete();

        return response()->json([
            'message' => 'Agama berjaya dihapuskan'
        ], 200);
    }
}
