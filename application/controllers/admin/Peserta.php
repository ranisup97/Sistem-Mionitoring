<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class Peserta extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Peserta_Model');
		$this->load->library('form_validation');
	}
    
	public function index()
	{
        // load view admin/overview.php
        //$this->load->view("admin/overview");
        $data["peserta"] = $this->Peserta_Model->getAll();
        $this->load->view("admin/peserta/list", $data);//render ke overview
	}
    
	public function add()//tambah pelatihan
    {
        $peserta = $this->Peserta_Model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($peserta->rules()); //terapkan rules
        
        if ($validation->run()) { //melakukan validasi
            $peserta->save(); //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }
        $this->load->view("admin/peserta/new_form"); //tampilkan form add (tambah peserta)
    }
    
    public function edit($id = null)
    //keterangan: $id = null
    //$id = id data yang akan diedit
    //null = kita berikan nilai null agar mudah di cek
    {
        if (!isset($id)) redirect('admin/peserta');//redirect jika tidak ada $id
        $peserta = $this->Peserta_Model; //objek model
        $validation = $this->form_validation; //objek validation
        $validation->set_rules($peserta->rules());//menerapkan rules 
        if ($validation->run()) {//melakukan validasi
            $peserta->update();//menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["peserta"] = $peserta->getById($id); //mengambil data untuk ditampilakan pada form
        if (!$data["peserta"]) show_404(); // jika tidak ada data, tampilkan error 404
        $this->load->view("admin/peserta/edit_form", $data);//menampilkan form edit
    }
    
    public function delete($id=null)
    /*
    method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.*/
    {
        if (!isset($id)) show_404();
        if ($this->Peserta_Model->delete($id)) 
        {
            redirect(site_url('admin/peserta'));
            /*
            Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman admin/peserta/.
            */
        }
    }

    public function import(){
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    
        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            $data = []; $count = 0;
            foreach($sheetData as $key => $value) {
                $count = 0;
                foreach($value as $keys => $values) {
                    if($key != 0) {
                        if($keys != 0) {
                            $data[$count] = $values;
                            $count++;
                        }
                    }
                }
                if($key != 0) {
                    // echo $data[0].' | '.$data[1].' | '.$data[2];
                    // echo '<br>';
                    $check = $this->Peserta_Model->getById($data[0]);
                    if(!isset($check)) {
                        $this->Peserta_Model->addFromExcel($data[0], $data[1], $data[2]);
                    }
                }
            }
        }
        redirect(site_url('admin/peserta'));
    }
}?>