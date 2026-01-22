<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisLantikan;

class JenisLantikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JenisLantikan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jenis = JenisLantikan::create([
            ...$request->validate([
                'kod_lantikan' => 'required|string|max:10',
                'info_lantikan' => 'required|string|max:100',
            ]),
        ]);

        return $jenis;
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisLantikan $jenisLantikan)
    {
        return $jenisLantikan;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisLantikan $jenisLantikan)
    {
        $validated = $request->validate([
            'info_lantikan' => 'required|string|max:100',
        ]);

        $jenisLantikan->update($validated);

        return $jenisLantikan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisLantikan $jenisLantikan)
    {
        $jenisLantikan->delete();

        return response()->json([
            'message' => 'Jenis lantikan berjaya dihapuskan'
        ], 200);
    }
}
