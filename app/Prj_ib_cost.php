<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_ib_cost;

class Prj_ib_cost extends Model
{
	protected $table = 'prj_ib_cost';
	protected $fillable = ['kd_cost','kode_ib','kd_proyek','cost_activity','cost','volume','cost_extend','note','cost_status'];
    protected $primaryKey = 'kd_cost';
    public $incrementing = false; 
} 