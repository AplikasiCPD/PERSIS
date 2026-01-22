<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jawatan;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Jawatan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jawatan = Jawatan::create([
            ...$request->validate([
                'kod_jawatan' => 'required|string|max:10',
                'info_jawatan' => 'required|string|max:100',
                'status' => 'required|boolean',
            ]),
        ]);

        return $jawatan;
    }

    /**
     * Display the specified resource.
     */
    public function show(Jawatan $jawatan)
    {
        return $jawatan;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jawatan $jawatan)
    {
        $validated = $request->validate([
            'info_jawatan' => 'required|string|max:100',
            'status' => 'required|boolean',
        ]);

        $jawatan->update($validated);

        return $jawatan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawatan $jawatan)
    {
        $jawatan->delete();

        return response()->json([
            'message' => 'Jawatan berjaya dihapuskan'
        ], 200);
    }
}
