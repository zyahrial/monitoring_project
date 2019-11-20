<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Klien;
use App\Sektor;

class Klien extends Model
{
	protected $table = 'mkt_klien';
	protected $fillable = ['kd_klien','
nama_klien','
jenis_usaha','
jenis_sektor','
sub_sektor','
alamat','
telp_fax','
email','
website','
npwp','
no_npwp','
cp_adm_nama1', '
cp_adm_jabatan1', '
cp_adm_bagian1', '
cp_adm_telp1', '
cp_adm_email1', '
cp_adm_nama2', '
cp_adm_jabatan2', '
cp_adm_bagian2', '
cp_adm_telp2', '
cp_adm_email2', '
cp_adm_nama3', '
cp_adm_jabatan3', '
cp_adm_bagian3', '
cp_adm_telp3', '
cp_adm_email3', '
cp_adm_nama4', '
cp_adm_jabatan4', '
cp_adm_bagian4', '
cp_adm_telp4', '
cp_adm_email4', '
cp_adm_nama5', '
cp_adm_jabatan5', '
cp_adm_bagian5', '
cp_adm_telp5', '
cp_adm_email5','

cp_ops_nama1', '
cp_ops_jabatan1', '
cp_ops_bagian1', '
cp_ops_telp1', '
cp_ops_email1', '
cp_ops_nama2', '
cp_ops_jabatan2', '
cp_ops_bagian2', '
cp_ops_telp2', '
cp_ops_email2', '
cp_ops_nama3', '
cp_ops_jabatan3', '
cp_ops_bagian3', '
cp_ops_telp3', '
cp_ops_email3', '
cp_ops_nama4', '
cp_ops_jabatan4', '
cp_ops_bagian4', '
cp_ops_telp4', '
cp_ops_email4', '
cp_ops_nama5', '
cp_ops_jabatan5', '
cp_ops_bagian5', '
cp_ops_telp5', '
cp_ops_email5'];
    protected $primaryKey = 'kd_klien';
    public $incrementing = false;
}

