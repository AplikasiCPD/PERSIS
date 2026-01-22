<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kumpulan;
use Illuminate\Http\Request;

class KumpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Kumpulan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kumpulan = Kumpulan::create([
            ...$request->validate([
                'kod_kump' => 'required|string|max:10',
                'info_kod' => 'required|string|max:100',
            ]),
        ]);

        return $kumpulan;
    }

    /**
     * Display the specified resource.
     */
    public function show(Kumpulan $kumpulan)
    {
        return $kumpulan;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kumpulan $kumpulan)
    {
        $validated = $request->validate([
            'info_kod' => 'required|string|max:100',
        ]);

        $kumpulan->update($validated);

        return $kumpulan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kumpulan $kumpulan)
    {
        $kumpulan->delete();

        return response()->json([
            'message' => 'Kumpulan berjaya dihapuskan'
        ], 200);
    }
}
