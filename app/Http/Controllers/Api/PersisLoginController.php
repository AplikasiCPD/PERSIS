<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\CanLoadRelationships;
use App\Http\Resources\PersisLoginResource;
use App\Models\PersisLogin;

class PersisLoginController extends Controller
{
    use CanLoadRelationships;

    private array $relations = ['staff'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->loadRelationships(PersisLogin::query());
        // return PersisLogin::all();

        $perPage = $request->input('per_page', 15);
        
        // If per_page is very large or -1, return all records
        if ($perPage > 1000 || $perPage == -1) {
            return PersisLoginResource::collection($query->get());
        }
        
        return PersisLoginResource::collection($query->paginate($perPage));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengguna = PersisLogin::create([
            ...$request->validate([
                'staff_id' => 'required|string|max:255',
                'user_pwd' => 'required|string',
                'user_level' => 'required|integer',
                'info_level' => 'nullable|string|max:255',
            ]),
        ]);

        return new PersisLoginResource($this->loadRelationships($pengguna));
    }

    /**
     * Display the specified resource.
     */
    public function show(PersisLogin $persisLogin)
    {
        $persisLogin = $this->loadRelationships($persisLogin);

        return new PersisLoginResource($persisLogin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersisLogin $persisLogin)
    {
        $validated = $request->validate([
            'staff_id' => 'sometimes|string|max:255',
            'user_pwd' => 'sometimes|string',
            'user_level' => 'sometimes|integer',
            'info_level' => 'nullable|string|max:255',
        ]);

        $persisLogin->update($validated);

        return new PersisLoginResource($this->loadRelationships($persisLogin));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersisLogin $persisLogin)
    {
        $persisLogin->delete();
        
        return response()->json([
            'message' => 'Pengguna berjaya dihapuskan'
        ], 200);
    }
}
