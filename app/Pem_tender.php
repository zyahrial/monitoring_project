<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pem_tender;

class Pem_tender extends Model
{
	protected $table = 'mkt_pem_tender';
	protected $fillable = ['kd_pn_tender
','kelompok_jasa
','sub_jasa
','nama_pekerjaan
','kd_klien
','informasi_tgl
','informasi_nama
','informasi_entitas
','informasi_telp
','informasi_email
','tgl_canvasing
','hasil_canvasing
','tgl_kak
','nilai_kak
','tgl_pendaftaran
','hasil_pendaftaran
','tgl_ambil
','tgl_submit
','tgl_pembuktian
','hasil_pq
','tgl_pengambilan_doc
','tgl_aanwijzing
','personil_aanwijzing
','kompetitor
','tgl_pemasukan_doc
','harga_penawaran
','tgl_sampul1
','hasil_sampul1
','tgl_contest
','personil_contest
','tgl_klarifikasi_teknis
','hasil_klarifikasi_teknis
','tgl_evaluasi_teknis
','hasil_evaluasi_teknis
','tgl_sampul2
','hasil_sampul2
','tgl_negosiasi
','hasil_negosiasi
','tgl_followup
','status_followup
','peluang
','status_tender
','cp_internal_email
','cp_internal'];
   protected $primaryKey = 'kd_pn_tender';
   public $incrementing = false;
}
