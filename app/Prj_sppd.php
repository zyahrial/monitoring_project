<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_sppd;

class Prj_sppd extends Model
{
	protected $table = 'prj_sppd';
protected $fillable = ['kd_proyek','kd_sppd','kd_cost1','kd_cost2','kd_cost3','kd_cost4','kd_cost5','date','pemohon','note','jabatan','tujuan','keperluan','tanggal_kembali','tanggal_berangkat','status_sppd','date_pjpd','no_pjpd','nilai_pjpd','nilai_sppd'];
    protected $primaryKey = 'kd_sppd';
    public $incrementing = false;
}