<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Lib_sub_sektor;

class Lib_sub_sektor extends Model
{
	protected $table = 'mkt_lib_sub_sektor';
	protected $fillable = ['id','sub_sektor'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
