<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ket_kalah;

class Ket_kalah extends Model
{
	protected $table = 'mkt_ket_kalah';
	protected $fillable = ['id','keterangan'];
    protected $primaryKey = 'id';
}
