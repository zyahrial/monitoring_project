<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Karyawan;

class Karyawan extends Model
{
	protected $table = 'sdm_karyawan';
	protected $fillable = ['kode', 'npp', 'nama', 'alamat', 'telp', 'email', 'jk', 'tanggal_lahir', 'tanggal_masuk', 'status_kerja', 'jabatan', 'divisi', 'status_pegawai'];
   protected $primaryKey = 'kode';
}
