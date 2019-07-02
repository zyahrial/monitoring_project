<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Lib_sektor;

class Lib_sektor extends Model
{
	protected $table = 'mkt_lib_sektor';
	protected $fillable = ['id','nama_sektor'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
