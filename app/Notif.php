<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\notif;


class Notif extends Model
{
	protected $table = 'notif';
	protected $fillable = ['id', 'ket', 'email'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}