<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_uudp;

class Prj_uudp extends Model
{
	protected $table = 'prj_uudp';
protected $fillable = ['kd_proyek','kd_uudp','kd_cost1','kd_cost2','kd_cost3','kd_cost4','kd_cost5','date','note','pemohon','jabatan','no_uudp','nilai_uudp','status_uudp','date_upj','no_upj','nilai_upj'];
    protected $primaryKey = 'kd_uudp';
    public $incrementing = false;
}