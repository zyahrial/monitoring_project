<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_lib_cost;

class Prj_lib_cost extends Model
{
	protected $table = 'prj_cost_activity';
	protected $fillable = ['kd_cost','cost_activity'];
    protected $primaryKey = 'kd_cost';
    public $incrementing = false;
}