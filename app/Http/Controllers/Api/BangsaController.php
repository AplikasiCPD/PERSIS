<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bangsa;
use Illuminate\Http\Request;

class BangsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bangsa::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bangsa = Bangsa::create([
            ...$request->validate([
                'kod_bangsa' => 'required|string|max:10',
                'info_bangsa' => 'required|string|max:100',
            ]),
        ]);

        return $bangsa;
    }

    /**
     * Display the specified resource.
     */
    public function show(Bangsa $bangsa)
    {
        return $bangsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bangsa $bangsa)
    {
        $validated = $request->validate([
            'info_bangsa' => 'required|string|max:100',
        ]);

        $bangsa->update($validated);

        return $bangsa;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bangsa $bangsa)
    {
        $bangsa->delete();

        return response()->json([
            'message' => 'Bangsa berjaya dihapuskan'
        ], 200);
    }
}
