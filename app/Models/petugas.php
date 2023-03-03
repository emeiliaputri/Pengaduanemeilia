<?php 
namespace App\Models;

use CodeIgniter\Model;

class Petugas extends Model{
    protected $table = 'tb_petugas';
    // uncomment below if you want add
    protected $primarykey ='id_petugas';
    protected $allowedFields = ['nama_petugas','username','password','telp','level'];
    protected $useSoftDeleted = true;
    protected $deletedFields = 'Deleted_at';
}