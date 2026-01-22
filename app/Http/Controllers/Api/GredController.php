<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gred;

class GredController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Gred::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gred = Gred::create([
            ...$request->validate([
                'kod_gred' => 'required|string|max:10',
                'info_gred' => 'required|string|max:100',
                'gaji_min' => 'required|numeric',
                'gaji_max' => 'required|numeric',
                'kenaikan' => 'required|numeric',
                'kod_jawatan' => 'required|string|max:10',
                'kod_kump' => 'required|string|max:10',
                'status_gred' => 'required|boolean',
            ]),
        ]);

        return $gred;
    }

    /**
     * Display the specified resource.
     */
    public function show(Gred $gred)
    {
        return $gred;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gred $gred)
    {
        $validated = $request->validate([
            'info_gred' => 'required|string|max:100',
            'gaji_min' => 'required|numeric',
            'gaji_max' => 'required|numeric',
            'kenaikan' => 'required|numeric',
            'kod_jawatan' => 'required|string|max:10',
            'kod_kump' => 'required|string|max:10',
            'status_gred' => 'required|boolean',
        ]);

        $gred->update($validated);

        return $gred;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gred $gred)
    {
        $gred->delete();

        return response()->json([
            'message' => 'Gred berjaya dihapuskan'
        ], 200);
    }
}
