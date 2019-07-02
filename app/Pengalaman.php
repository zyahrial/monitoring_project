<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pengalaman;

class Pengalaman extends Model
{
	protected $table = 'mkt_pengalaman';
	protected $fillable = ['kd_pengalaman','
kd_klien','
kelompok_jasa','
sub_jasa','
nama_pekerjaan','
sub_pekerjaan','
ringkasan_lingkup','
lokasi_pekerjaan','
no_kontrak','
nilai_kontrak','
kontrak_mulai','
kontrak_selesai','
no_addendum1','
no_addendum2','
no_addendum3','
no_addendum4','
no_addendum5','
nilai_addendum','
addedum_mulai','
addendum_selesai','
pm','
konsultan','
cp_internal','
cp_internal_email','
bast_doc','
referensi_doc'];
    protected $primaryKey = 'kd_pengalaman';
    public $incrementing = false;
}