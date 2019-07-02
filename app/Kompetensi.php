<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Kompetensi;

class Kompetensi extends Model
{
	protected $table = 'mkt_kompetensi';
	protected $fillable = ['id','kompetensi'];
    protected $primaryKey = 'id';
    //public $incrementing = false;
}