<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jantina;
use Illuminate\Http\Request;

class JantinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Jantina::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jantina = Jantina::create([
            ...$request->validate([
                'kod_jantina' => 'required|string|max:1',
                'info_jantina' => 'required|string|max:100',
            ]),
        ]);

        return $jantina;
    }

    /**
     * Display the specified resource.
     */
    public function show(Jantina $jantina)
    {
        return $jantina;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jantina $jantina)
    {
        $validated = $request->validate([
            'info_jantina' => 'required|string|max:100',
        ]);

        $jantina->update($validated);

        return $jantina;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jantina $jantina)
    {
        $jantina->delete();

        return response()->json([
            'message' => 'Jantina berjaya dihapuskan'
        ], 200);
    }
}
