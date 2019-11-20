<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_termin;

class Prj_termin extends Model
{
	protected $table = 'prj_termin';
	protected $fillable = ['kd_termin','kode_ib','revenue_percent','termin_date','termin_status','termin_ke','kd_mdi','no_order','no_sertifikat','tgl_sertifikat','jml_komoditi','tarip_unit','biaya_analisa','materai','lain_lain','potongan','kd_proyek','admin','email_admin','no_sppd'];
    protected $primaryKey = 'kd_termin';
    public $incrementing = false;
}