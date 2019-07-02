<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Legalitas_notif;

class Legalitas_notif extends Model
{
	protected $table = 'notif';
	protected $fillable = ['id', 'ket', 'email'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}