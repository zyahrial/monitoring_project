<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prj_notif;


class Prj_notif extends Model
{
	protected $table = 'prj_notif';
	protected $fillable = ['id', 'notif', 'interval', 'status'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}