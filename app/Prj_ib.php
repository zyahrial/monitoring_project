<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_ib;

class Prj_ib extends Model
{
	protected $table = 'prj_ib';
	protected $fillable = ['kode_ib','kd_proyek','kd_activity','date','status'];
    protected $primaryKey = 'kode_ib';
    public $incrementing = false;
}