<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pem_non_tender;

class Pem_non_tender extends Model
{
	protected $table = 'mkt_pem_non_tender';
	protected $fillable = ['kd_pn_non_tender', '
kelompok_jasa', '
sub_jasa', '
nama_pekerjaan', '
kd_klien', '
informasi_nama', '
informasi_telp', '
informasi_email', '
tgl_permintaan', '
tgl_canvasing', '
hasil_canvasing', '
tgl_kak', '
nilai_kak', '
tgl_proposal', '
nilai_penawaran', '
tgl_presentasi', '
tgl_negosiasi', '
nilai_negosiasi', '
tgl_followup', '
status_followup', '
peluang', '
status', '
cp_internal_email','
cp_internal'];
   protected $primaryKey = 'kd_pn_non_tender';
   public $incrementing = false;
}
