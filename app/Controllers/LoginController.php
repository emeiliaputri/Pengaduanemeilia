<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;

use App\Models\Masyarakat;
class LoginController extends BaseController{
    protected $masyarakats;
    function __construct()
    {
        $this->masyarakats = new Masyarakat;
    }
    public function index()
    {
        return view('login_view');
    }
    public function register()
    {
        return view('register_view');
    }
    public function saveRegister()
    {
        $ceknik = $this->masyarakats->where('nik',$this->request->getPost('nik'))->findAll();
        // dd($ceknik);
        if ($ceknik==null)
        {
            $data=array(
                'nik'=> $this->request->getPost('nik'),
                'nama'=> $this->request->getPost('nama'),'username'=>$this->request->getPost('username'),
                'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
                'telp'=>$this->request->getPost('telp')
            );
            $this->masyarakats->insert($data);
            return redirect('login');
        }
        else{
            return redirect('register')->with('error',lang('Nik sudah ada'));
        }
    }
    public function login()
    {
        $masy= new Masyarakat();
        $petugas= new Petugas();
        $username= $this->request->getPost('username');
        $password= $this->request->getPost('password')."";
        $cekPetugas= $petugas->where(['username'=>$username])->first();
        $cekmasy= $masy->where(['username'=>$username])->first();
        if (!($cekmasy)&&!($cekPetugas))
        {
            return redirect('login')->with("error",lang('Username tidak ditemukan'));
        }
        else
        {
            if ($cekmasy)
            {
                if (password_verify($password, $cekmasy['password'])) {
                    session()->set([
                        'nik' =>$cekmasy['nik'],
                        'nama' =>$cekmasy['nama'],
                        'level' =>'masyarakat'
                    ]);
                    return redirect('/');
                }
                else
                {
                    return redirect('login')->with("error",lang('Password masyarakat salah'));
                }
            }
            if($cekPetugas)
            {
                if (password_verify($password, $cekPetugas['password'])){
                    session()->set([
                        'id_petugas' =>$cekPetugas['id_petugas'],
                        'nama' =>$cekPetugas['nama_petugas'],
                        'level' =>'petugas',
                    ]);
                }
                else
                {
                    return redirect('login')->with("error",lang('Password Petugas salah'));
                }
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return $this->response->redirect('/login');
    }
}