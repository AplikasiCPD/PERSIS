<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gelaran;

class GelaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Gelaran::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gelaran = Gelaran::create([
            ...$request->validate([
                'kod_gelaran' => 'required|string|max:10',
                'info_gelaran' => 'required|string|max:100',
            ]),
        ]);

        return $gelaran;
    }

    /**
     * Display the specified resource.
     */
    public function show(Gelaran $gelaran)
    {
        return $gelaran;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gelaran $gelaran)
    {
        $validated = $request->validate([
            'info_gelaran' => 'required|string|max:100',
        ]);

        $gelaran->update($validated);

        return $gelaran;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gelaran $gelaran)
    {
        $gelaran->delete();

        return response()->json([
            'message' => 'Gelaran berjaya dihapuskan'
        ], 200);
    }
}
