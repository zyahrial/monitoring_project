<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ta;

class Ta extends Model
{
	protected $table = 'mkt_ta';
	protected $fillable = ['kd_ta','status','nama','tempat_lahir','tanggal_lahir','alamat','telp','email','no_ktp','no_npwp','s1_univ','s1_jurusan','s1_tanggal_lulus','s1_no_ijazah','s2_univ','s2_jurusan','s2_tanggal_lulus','s2_no_ijazah','
s3_univ','s3_jurusan','s3_tanggal_lulus','s3_no_ijazah','keahlian','pengalaman','sertifikat_keahlian','sertifikat_pelatihan
','spt','cv'];
    protected $primaryKey = 'kd_ta';
    public $incrementing = false;
}