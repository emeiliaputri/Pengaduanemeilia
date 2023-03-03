<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;

class PengaduanController extends BaseController
{

    protected $pengaduanss;

    function __construct()
    {
        $this->pengaduanss = new Pengaduan();
    }
    public function create()
    {
        return view('fpengaduan_view');
    }
    public function index()
    {
        if (session()->get('nik') != null) {
            $data['pengaduan'] = $this->pengaduanss->where('nik', session('nik'))->findAll();
        } else {
            $data['pengaduan'] = $this->pengaduanss->findAll();
        }
        return view('pengaduan_view', $data);
    }
    public function save()
    {
        $dataBerkas = $this->request->getFile('foto');
        $filename = $dataBerkas->getRandomName();
        $data = array(
            'tgl_pengaduan' => $this->request->getPost('tgl_pengauan'),
            'nik' => $this->request->getPost('nik'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            'foto' => $filename,
            'status' => '0',
        );
        $this->pengaduanss->insert($data);

        $dataBerkas->move('upload/berkas/', $filename);
        return redirect('pengaduan');
    }
    public function deleted($id)
    {
        $this->pengaduanss->deleted($id);
        return $this->response->redirect('/pengaduan');
    }
}