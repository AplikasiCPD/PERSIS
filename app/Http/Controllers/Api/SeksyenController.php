<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seksyen;

class SeksyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Seksyen::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seksyen = Seksyen::create([
            ...$request->validate([
                'kod_seksyen' => 'required|string|max:10',
                'info_seksyen' => 'required|string|max:100',
            ]),
        ]);

        return $seksyen;
    }

    /**
     * Display the specified resource.
     */
    public function show(Seksyen $seksyen)
    {
        return $seksyen;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seksyen $seksyen)
    {
        $validated = $request->validate([
            'info_seksyen' => 'required|string|max:100',
        ]);

        $seksyen->update($validated);

        return $seksyen;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seksyen $seksyen)
    {
        $seksyen->delete();

        return response()->json([
            'message' => 'Seksyen berjaya dihapuskan'
        ], 200);
    }
}
