<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cawangan;
use App\Http\Traits\CanLoadRelationships;
use App\Http\Resources\CawanganResource;
use Illuminate\Http\Request;

class CawanganController extends Controller
{
    use CanLoadRelationships;

    private array $relations = ['bahagian'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->loadRelationships(Cawangan::query());
        $perPage = $request->input('per_page', -1);
        
        // If per_page is very large or -1, return all records
        if ($perPage > 1000 || $perPage == -1) {
            return CawanganResource::collection($query->get());
        }
        
        return CawanganResource::collection($query->paginate($perPage));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cawangan = Cawangan::create([
            ...$request->validate([
                'kod_caw' => 'required|string|max:10',
                'info_caw' => 'required|string|max:100',
                'kod_bhgn' => 'required|string|max:10',
            ]),
        ]);

        $cawangan->load($this->relations);
        return new CawanganResource($cawangan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cawangan $cawangan)
    {
        $cawangan->load($this->relations);
        return new CawanganResource($cawangan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cawangan $cawangan)
    {
        $validated = $request->validate([
            'info_caw' => 'required|string|max:100',
            'kod_bhgn' => 'required|string|max:10',
        ]);

        $cawangan->update($validated);
        $cawangan->load($this->relations);

        return new CawanganResource($cawangan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cawangan $cawangan)
    {
        $cawangan->delete();

        return response()->json([
            'message' => 'Cawangan berjaya dihapuskan'
        ], 200);
    }
}
