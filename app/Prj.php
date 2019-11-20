<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pengalaman;

class Prj extends Model
{
	protected $table = 'prj';
	protected $fillable = ['kd_proyek','
kd_pengalaman','
tax_status','
tax_value','
pm','
konsultan1','
konsultan2','
konsultan3','
konsultan4','
konsultan5','
konsultan6','
konsultan7','
konsultan8','
konsultan9','
konsultan10','
ta1','
ta2','
ta3','
ta4','
ta5','
ta6','
ta7','
ta8','
ta9','
ta10','
jml_termin','
proyek_status'];
    protected $primaryKey = 'kd_proyek';
    public $incrementing = false;
}