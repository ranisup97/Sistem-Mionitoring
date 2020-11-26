<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class Monitoring extends CI_Controller
{
    public function __construct()
    /*
    Method __construct() merupakan sebuah konstruktor. 
    Method ini yang akan dieksekusi pertama kali saat Controller diakses.
    */
    {
        parent::__construct();
        $this->load->model("Monitoring_Model");
        $this->load->model("Pelatihan_Model");
        $this->load->model("Peserta_Model");
        $this->load->library("PHPExcel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["monitoring"] = $this->Monitoring_Model->getAll();
        if($data['monitoring'] != null) {
            foreach($data['monitoring'] as $key => $var) {
                $temp = $this->Pelatihan_Model->getById($var->id_pelatihan);
                $data['monitoring'][$key]->nama_pelatihan = $temp->nama_pelatihan;
                $temp = $this->Peserta_Model->getById($var->nik);
                $data['monitoring'][$key]->nama_peserta = $temp->nama;
            }
        }
        $this->load->view("admin/monitoring/list", $data);
       //$this->load->view('excel_import');
         //merender ke dalam view
    }

    public function getAll()
    {
        $data["monitoring"] = $this->Monitoring_Model->getAll();
        $this->load->view("admin/monitoring/list", $data);
       //$this->load->view('excel_import');
         //merender ke dalam view
    }

    public function Users($id)
    {
        $this->load->model('Monitoring_Model');
        echo json_encode($this->Monitoring_Model->list());
    }

  
    public function add()
    // http://localhost/ldetelkom/monitoring/add
    {
        $monitoring = $this->Monitoring_Model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($monitoring->rules()); //terapkan rules

        if ($validation->run()) { //melakukan validasi
            $monitoring->save(); //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $this->load->view("admin/monitoring/new_form"); //tampilkan form add (tambah peserta)
    }


    public function edit($id = null)
    //keterangan: $id = null
    //$id = id data yang akan diedit
    //null = kita berikan nilai null agar mudah di cek
    {
        if (!isset($id)) redirect('admin/monitoring');//redirect jika tidak ada $id
       
        $monitoring = $this->Monitoring_Model; //objek model
        $validation = $this->form_validation; //objek validation
        $validation->set_rules($monitoring->rules());//menerapkan rules 

        if ($validation->run()) {//melakukan validasi
            $monitoring->update();//menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["monitoring"] = $monitoring->getById($id); //mengambil data untuk ditampilakan pada form
        if (!$data["monitoring"]) show_404(); // jika tidak ada data, tampilkan error 404
        
        $this->load->view("admin/monitoring/edit_form", $data);//menampilkan form edit
    }

    public function delete($id=null)
    /*
    method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.*/

    {
        if (!isset($id)) show_404();
        
        if ($this->Monitoring_Model->delete($id)) 
        {
            redirect(site_url('admin/monitoring'));
        /*
        Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman admin/monitoring/.
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
                            if($count == 11 || $count == 14 || $count == 17) {
                                $time = strtotime($values);
                                $date = date('Y-m-d', $time);

                                $data[$count] = $date;
                                echo $date;
                                $count++;
                            } else {
                                $data[$count] = $values;
                                echo $values;
                                $count++;
                            }
                        }
                    }
                }
                if($key != 0) {

                    if(!isset($check)) {
                        $this->Monitoring_Model->addFromExcel($data);
                    }
                }
            }
        }

        redirect(site_url('admin/monitoring'));
    }
}

?>