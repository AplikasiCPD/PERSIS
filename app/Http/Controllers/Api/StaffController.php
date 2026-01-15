<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StaffResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Staff;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    use CanLoadRelationships, AuthorizesRequests;

    private array $relations = ['jantina', 'bangsa', 'agama', 'jawatan', 'gred', 'bahagian', 'cawangan', 'seksyen', 'status', 'gelaran', 'jenis_lantikan', 'jenis_rekod'];

    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Require authentication for all methods except index and show
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        
        // Apply authorization only to specific actions
        // Exclude 'create' and 'store' to allow public staff creation
        $this->authorizeResource(Staff::class, 'staff', [
            'except' => ['create', 'store'],
        ]);
    }


    public function index(Request $request)
    {
        $query = $this->loadRelationships(Staff::query());

        $perPage = $request->input('per_page', 15);
        
        // If per_page is very large or -1, return all records
        if ($perPage > 1000 || $perPage == -1) {
            return StaffResource::collection($query->get());
        }
        
        return StaffResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staff = Staff::create([
            ...$request->validate([
                'staff_id' => 'required|string|max:255',
                'nama' => 'required|string',
                'no_kp' => 'required|string|max:255',
                'no_tel' => 'nullable|string|max:255',
                'emel' => 'nullable|string|max:50',
                'kod_jantina' => 'required|string|max:255',
                'kod_bangsa' => 'required|string|max:255',
                'kod_agama' => 'required|string|max:255',
                'kod_lantikan' => 'nullable|integer|max:255',
                'tarikh_lantikan' => 'required|date|after:tarikh_lahir',
                'tarikh_masuk' => 'required|date|after:tarikh_lahir',
                'tarikh_sah' => 'nullable|date|after:tarikh_masuk',
                'tarikh_gred_semasa' => 'nullable|date|after:tarikh_masuk',
                'tarikh_penempatan_semasa' => 'nullable|date|after:tarikh_masuk',
                'kod_rekod' => 'nullable|integer|max:255',
                'tarikh_rekod' => 'nullable|date',
                'catatan_rekod' => 'nullable|string|max:255',
                'kod_jawatan_semasa' => 'required|integer|max:255',
                'kod_gred_semasa' => 'required|integer|max:255',
                'status_gred' => 'required|integer|max:255',
                'kod_bhgn_semasa' => 'required|integer|max:255',
                'kod_caw_semasa' => 'required|integer|max:255',
                'kod_seksyen_semasa' => 'required|integer|max:255',
                'umur_bersara' => 'nullable|integer',
                'catatan' => 'nullable|string',
                'user_level' => 'nullable|integer',
                'speed_dial' => 'nullable|string',
                'connection' => 'nullable|string',
                'tarikh_lahir' => 'nullable|date',
                'tarikh_dinaikkan_pangkat' => 'nullable|date|after:tarikh_masuk',
                'tarikh_pencen' => 'nullable|date|after:tarikh_masuk',
                'gaji_pokok' => 'nullable|numeric',
                'bulan_naik_gaji' => 'nullable|integer',
                'status_code' => 'nullable|integer|max:255',
                'staff_location' => 'nullable|string',
                'kod_gelaran_semasa' => 'nullable|integer|max:255',
            ]),
        ]);

        return new StaffResource($this->loadRelationships($staff));
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        $staff = $this->loadRelationships($staff);

        return new StaffResource($staff);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $staff->update(
            $request->validate([
                'staff_id' => 'sometimes|string|max:255',
                'nama' => 'sometimes|string',
                'no_kp' => 'sometimes|string|max:255',
                'no_tel' => 'sometimes|nullable|string|max:255',
                'emel' => 'sometimes|nullable|string|max:50',
                'kod_jantina' => 'sometimes|string|max:255',
                'kod_bangsa' => 'sometimes|string|max:255',
                'kod_agama' => 'sometimes|string|max:255',
                'kod_lantikan' => 'sometimes|nullable|integer|max:255',
                'tarikh_lantikan' => 'sometimes|date|after:tarikh_lahir',
                'tarikh_masuk' => 'sometimes|date|after:tarikh_lahir',
                'tarikh_sah' => 'sometimes|nullable|date|after:tarikh_masuk',
                'tarikh_gred_semasa' => 'sometimes|nullable|date|after:tarikh_masuk',
                'tarikh_penempatan_semasa' => 'sometimes|nullable|date|after:tarikh_masuk',
                'kod_rekod' => 'sometimes|nullable|integer|max:255',
                'tarikh_rekod' => 'sometimes|nullable|date',
                'catatan_rekod' => 'sometimes|nullable|string|max:255',
                'kod_jawatan_semasa' => 'sometimes|integer|max:255',
                'kod_gred_semasa' => 'sometimes|integer|max:255',
                'status_gred' => 'sometimes|integer|max:255',
                'kod_bhgn_semasa' => 'sometimes|integer|max:255',
                'kod_caw_semasa' => 'sometimes|integer|max:255',
                'kod_seksyen_semasa' => 'sometimes|integer|max:255',
                'umur_bersara' => 'sometimes|nullable|integer',
                'catatan' => 'sometimes|nullable|string',
                'user_level' => 'sometimes|nullable|integer',
                'speed_dial' => 'sometimes|nullable|string',
                'connection' => 'sometimes|nullable|string',
                'tarikh_lahir' => 'sometimes|nullable|date',
                'tarikh_dinaikkan_pangkat' => 'sometimes|nullable|date|after:tarikh_masuk',
                'tarikh_pencen' => 'sometimes|nullable|date|after:tarikh_masuk',
                'gaji_pokok' => 'sometimes|nullable|numeric',
                'bulan_naik_gaji' => 'sometimes|nullable|integer',
                'status_code' => 'sometimes|nullable|integer|max:255',
                'staff_location' => 'sometimes|nullable|string',
                'kod_gelaran_semasa' => 'sometimes|nullable|integer|max:255',
            ])
        );

        return new StaffResource($this->loadRelationships($staff));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return response(status: 204);
    }
}
