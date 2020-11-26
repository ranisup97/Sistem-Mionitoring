<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cycle extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Monitoring_Model');
        $this->load->model('Pelatihan_Model');
        $this->load->model('Peserta_Model');
		$this->load->library('form_validation');
    }
    

	public function index()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle1_view", $data);//render ke overview
	}
    
    public function c1()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle1_view", $data);//render ke overview
    }
    public function c2()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle2_view", $data);//render ke overview
    }
    public function c3()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle3_view", $data);//render ke overview
	}
    public function c4()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle4_view", $data);//render ke overview
	}
    public function c5()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle5_view", $data);//render ke overview
	}
    public function c6()
	{
        $data['pelatihan'] = $this->Pelatihan_Model->getAll();
        
        $this->load->view("admin/cycle/cycle6_view", $data);//render ke overview
	}

    public function cycle_detail($cycle, $id_pelatihan) {
        $data['data'] = $this->Monitoring_Model->getByPelAndCycle($cycle, $id_pelatihan);
        if($data['data'] != null) {
            foreach($data['data'] as $key => $var) {
                $temp = $this->Peserta_Model->getById($var->nik);
                $data['data'][$key]->nama = $temp->nama;
                $data['data'][$key]->jabatan = $temp->jabatan;
            }
        }

        $data['pelatihan'] = $this->Pelatihan_Model->getById($id_pelatihan);
        
        $this->load->view("admin/cycle/cycle".$cycle."_peserta", $data);//render ke overview
    }

    public function edit_status_c2c3($cycle, $id, $post_test)
	{
        if($post_test >= 70) {
            $this->edit_status($cycle, $id);
        } else {
            $this->session->set_flashdata('success_status', 'Nilai tidak cukup untuk diloloskan');
            redirect($_SERVER['HTTP_REFERER']);
        }        
    }
    public function edit_status_c4c5c6($cycle, $id)
	{
        $data = $this->Monitoring_Model->getById($id);
        $c4 = $cycle == 4 && $data->cycle4_judul_laporan != null && $data->cycle4_tanggal != null ? 1 : 0;
        $c5 = $cycle == 5 && $data->cycle5_judul_laporan != null && $data->cycle5_tanggal != null ? 1 : 0;
        $c6 = $cycle == 6 && $data->cycle6_judul_laporan != null && $data->cycle6_tanggal != null ? 1 : 0;
        
        if($c4 || $c5 || $c6) {
            $this->edit_status($cycle, $id);
        } else {
            $this->session->set_flashdata('success_status', 'Judul laporan dan tanggal belum dimasukkan');
            redirect($_SERVER['HTTP_REFERER']);
        }        
	}

    public function edit_status($cycle, $id)
	{
        $this->Monitoring_Model->editStatus($cycle, $id);
        
        $this->session->set_flashdata('success_status', 'Berhasil ubah status');
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function edit_detail($cycle, $id_pelatihan, $id)
	{
        if (!isset($id)) redirect($_SERVER['HTTP_REFERER']);//redirect jika tidak ada $id
       
        $monitoring = $this->Monitoring_Model; //objek model
        $validation = $this->form_validation; //objek validation
        $validation->set_rules($monitoring->rulesEdit());//menerapkan rules 

        if ($validation->run()) {//melakukan validasi
            if($cycle == 2 || $cycle == 3) {
                $monitoring->updateNilai();//menyimpan data
            } else {
                $monitoring->updateC4C5C6();//menyimpan data
            }
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["data"] = $monitoring->getById($id); //mengambil data untuk ditampilakan pada form
        $data['cycle'] = $cycle;
        $data['id_pelatihan'] = $id_pelatihan;

        if (!$data["data"]) show_404(); // jika tidak ada data, tampilkan error 404
        
        $this->load->view("admin/cycle/cycle".$cycle."_edit_form", $data);//menampilkan form edit
	}
}

?>