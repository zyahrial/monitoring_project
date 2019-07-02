<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Bagian_adm;

class Bagian_adm extends Model
{
	protected $table = 'mkt_adm_bagian';
	protected $fillable = ['id','nama_bagian'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
