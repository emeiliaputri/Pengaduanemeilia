<?php 
namespace App\Models;

use CodeIgniter\Model;

class Masyarakat extends Model{
    protected $table = 'tb_masyarakat';
    // uncomment below if you want add
    protected $primarykey ='id_masyarakat';
    protected $allowedFields = ['nama','username','password','telp'];
    protected $useSoftDeleted = true;
    protected $deletedFields = 'Deleted_at';
}