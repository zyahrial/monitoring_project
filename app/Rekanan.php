<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Rekanan;

class Rekanan extends Model
{
	protected $table = 'mkt_rekanan';
	protected $fillable = ['kd_rekanan','kd_klien','nama_klien','url','username','password','email','tanggal_mulai','tanggal_berakhir','cp_nama','cp_jabatan','cp_bagian','cp_telp','cp_email','keterangan'];
   protected $primaryKey = 'kd_rekanan';
   public $incrementing = false;
}
