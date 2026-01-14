<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    
    protected $fillable = [
        'staff_id',
        'nama',
        'no_kp',
        'no_tel',
        'emel',
        'kod_jantina',
        'kod_bangsa',
        'kod_agama',
        'kod_lantikan',
        'tarikh_lantikan',
        'tarikh_masuk',
        'tarikh_sah',
        'tarikh_gred_semasa',
        'tarikh_penempatan_semasa',
        'kod_rekod',
        'tarikh_rekod',
        'catatan_rekod',
        'kod_jawatan_semasa',
        'kod_gred_semasa',
        'status_gred',
        'kod_bhgn_semasa',
        'kod_caw_semasa',
        'kod_seksyen_semasa',
        'umur_bersara',
        'catatan',
        'user_level',
        'speed_dial',
        'connection',
        'tarikh_lahir',
        'tarikh_dinaikkan_pangkat',
        'tarikh_pencen',
        'gaji_pokok',
        'bulan_naik_gaji',
        'status_code',
        'staff_location',
        'kod_gelaran_semasa',
    ];

    protected $primaryKey = 'staff_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function jantina()
    {
        return $this->belongsTo(Jantina::class, 'kod_jantina', 'kod_jantina');
    }

    public function bangsa()
    {
        return $this->belongsTo(Bangsa::class, 'kod_bangsa', 'kod_bangsa');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'kod_agama', 'kod_agama');
    }

    public function jawatan()
    {
        return $this->belongsTo(Jawatan::class, 'kod_jawatan_semasa', 'kod_jawatan');
    }

    public function gred()
    {
        return $this->belongsTo(Gred::class, 'kod_gred_semasa', 'kod_gred');
    }
    
    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class, 'kod_bhgn_semasa', 'kod_bhgn');
    }

    public function cawangan()
    {
        return $this->belongsTo(Cawangan::class, 'kod_caw_semasa', 'kod_caw');
    }

    public function seksyen()
    {
        return $this->belongsTo(Seksyen::class, 'kod_seksyen_semasa', 'kod_seksyen');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'status_code');
    }

    public function gelaran()
    {
        return $this->belongsTo(Gelaran::class, 'kod_gelaran_semasa', 'kod_gelaran');
    }

    public function jenis_lantikan()
    {
        return $this->belongsTo(JenisLantikan::class, 'kod_lantikan', 'kod_lantikan');
    }

    public function jenis_rekod()
    {
        return $this->belongsTo(JenisRekod::class, 'kod_rekod', 'kod_rekod');
    }
}
