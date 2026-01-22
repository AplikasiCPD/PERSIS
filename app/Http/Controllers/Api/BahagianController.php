<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bahagian;
use Illuminate\Http\Request;

class BahagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Bahagian::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bahagian = Bahagian::create([
            ...$request->validate([
                'kod_bhgn' => 'required|integer',
                'info_bhgn' => 'required|string|max:100',
                'singkatan' => 'required|string|max:10',
            ]),
        ]);

        return $bahagian;
    }

    /**
     * Display the specified resource.
     */
    public function show(Bahagian $bahagian)
    {
        return $bahagian;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bahagian $bahagian)
    {
        $validated = $request->validate([
            'info_bhgn' => 'required|string|max:100',
            'singkatan' => 'required|string|max:10',
        ]);

        $bahagian->update($validated);

        return $bahagian;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahagian $bahagian)
    {
        $bahagian->delete();

        return response()->json([
            'message' => 'Bahagian berjaya dihapuskan'
        ], 200);
    }
}
