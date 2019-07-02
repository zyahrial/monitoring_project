<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Bagian_ops;

class Bagian_ops extends Model
{
	protected $table = 'mkt_ops_bagian';
	protected $fillable = ['id','nama_bagian'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
