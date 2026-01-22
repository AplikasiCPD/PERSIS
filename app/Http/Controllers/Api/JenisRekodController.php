<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisRekod;

class JenisRekodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JenisRekod::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jenis = JenisRekod::create([
            ...$request->validate([
                'kod_rekod' => 'required|string|max:10',
                'info_rekod' => 'required|string|max:100',
            ]),
        ]);

        return $jenis;
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisRekod $jenisRekod)
    {
        return $jenisRekod;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisRekod $jenisRekod)
    {
        $validated = $request->validate([
            'info_rekod' => 'required|string|max:100',
        ]);

        $jenisRekod->update($validated);

        return $jenisRekod;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisRekod $jenisRekod)
    {
        $jenisRekod->delete();

        return response()->json([
            'message' => 'Jenis rekod berjaya dihapuskan'
        ], 200);
    }
}
