<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\MailRekanan;

class MailRekanan extends Model
{
	protected $table = 'mkt_mail';
	protected $fillable = ['id','primary_mail','secondary_mail'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
