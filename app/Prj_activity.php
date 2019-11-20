<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_activity;

class Prj_activity extends Model
{
	protected $table = 'prj_activity';
	protected $fillable = ['kd_activity','activity','sub_activity'];
    protected $primaryKey = 'kd_activity';
    //public $incrementing = false;
}