<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Jasa;

class Jasa extends Model
{
	protected $table = 'mkt_jasa';
	protected $fillable = ['kd_jasa','kelompok_jasa','sub_jasa'];
    protected $primaryKey = 'kd_jasa';
    //public $incrementing = false;
}