<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'staff_id' => $this->staff_id,
            'nama' => $this->nama,
            'no_kp' => $this->no_kp,
            'no_tel' => $this->no_tel,
            'emel' => $this->emel,
            'kod_jantina' => $this->kod_jantina,
            'jantina' => $this->whenLoaded('jantina'),
            'kod_bangsa' => $this->kod_bangsa,
            'bangsa' => $this->whenLoaded('bangsa'),
            'kod_agama' => $this->kod_agama,
            'agama' => $this->whenLoaded('agama'),
            'kod_lantikan' => $this->kod_lantikan,
            'lantikan' => $this->whenLoaded('jenis_lantikan'),
            'tarikh_lantikan' => $this->tarikh_lantikan,
            'tarikh_masuk' => $this->tarikh_masuk,
            'tarikh_sah' => $this->tarikh_sah,
            'tarikh_gred_semasa' => $this->tarikh_gred_semasa,
            'tarikh_penempatan_semasa' => $this->tarikh_penempatan_semasa,
            'kod_rekod' => $this->kod_rekod,
            'rekod' => $this->whenLoaded('jenis_rekod'),
            'tarikh_rekod' => $this->tarikh_rekod,
            'catatan_rekod' => $this->catatan_rekod,
            'jawatan' => $this->whenLoaded('jawatan'),
            'kod_jawatan_semasa' => $this->kod_jawatan_semasa,
            'kod_gred_semasa' => $this->kod_gred_semasa,
            'gred' => $this->whenLoaded('gred'),
            'status_gred' => $this->status_gred,
            'kod_bhgn_semasa' => $this->kod_bhgn_semasa,
            'bahagian' => $this->whenLoaded('bahagian'),
            'kod_caw_semasa' => $this->kod_caw_semasa,
            'cawangan' => $this->whenLoaded('cawangan'),
            'kod_seksyen_semasa' => $this->kod_seksyen_semasa,
            'seksyen' => $this->whenLoaded('seksyen'),
            'umur_bersara' => $this->umur_bersara,
            'catatan' => $this->catatan,
            'user_level' => $this->user_level,
            'speed_dial' => $this->speed_dial,
            'connection' => $this->connection,
            'tarikh_lahir' => $this->tarikh_lahir,
            'tarikh_dinaikkan_pangkat' => $this->tarikh_dinaikkan_pangkat,
            'tarikh_pencen' => $this->tarikh_pencen,
            'gaji_pokok' => $this->gaji_pokok,
            'bulan_naik_gaji' => $this->bulan_naik_gaji,
            'status_code' => $this->status_code,
            'status' => $this->whenLoaded('status'),
            'staff_location' => $this->staff_location,
            'kod_gelaran_semasa' => $this->kod_gelaran_semasa,
            'gelaran' => $this->whenLoaded('gelaran'),
        ];
    }
}
