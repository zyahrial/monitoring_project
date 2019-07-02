<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notif_penjualan;

class Notif_penjualan extends Model
{
	protected $table = 'mkt_notif_penjualan';
	protected $fillable = ['kode','keterangan','klien','kd_penjualan'];
   protected $primaryKey = 'kode';
   public $incrementing = false;
}
