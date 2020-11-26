<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class Pelatihan extends CI_Controller
{
    public function __construct()
    /*
    Method __construct() merupakan sebuah konstruktor. 
    Method ini yang akan dieksekusi pertama kali saat Controller diakses.
    */
    {
        parent::__construct();
        $this->load->model("Pelatihan_Model");
       // $this->load->model('excel_import_model');
        /*
        Library form_validation akan kita gunakan untuk memvalidasi input pada method add() dan edit().

        Mengapa harus divalidasi?
        
        Karena bisa saja pengguna menginputkan data sembarang. Misalnya, sengaja mengisi dengan data kosong, script jahat seperti: serangan XSS, dll.
        */
        $this->load->library("PHPExcel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pelatihan"] = $this->Pelatihan_Model->getAll();
        $this->load->view("admin/pelatihan/list", $data);
       //$this->load->view('excel_import');
         //merender ke dalam view
    }

    public function getAll()
    {
        $data["pelatihan"] = $this->Pelatihan_Model->getAll();
        $this->load->view("admin/pelatihan/list", $data);
       //$this->load->view('excel_import');
         //merender ke dalam view
    }

    public function Users($id)
    {
        $this->load->model('Pelatihan_Model');
        echo json_encode($this->Pelatihan_Model->list());
    }

  
    public function add()
    // http://localhost/ldetelkom/pelatihan/add
    {
        $pelatihan = $this->Pelatihan_Model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($pelatihan->rules()); //terapkan rules

        if ($validation->run()) { //melakukan validasi
            $pelatihan->save(); //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
        }

        $this->load->view("admin/pelatihan/new_form"); //tampilkan form add (tambah peserta)
    }


    public function edit($id = null)
    //keterangan: $id = null
    //$id = id data yang akan diedit
    //null = kita berikan nilai null agar mudah di cek
    {
        if (!isset($id)) redirect('admin/pelatihan');//redirect jika tidak ada $id
       
        $pelatihan = $this->Pelatihan_Model; //objek model
        $validation = $this->form_validation; //objek validation
        $validation->set_rules($pelatihan->rules());//menerapkan rules 

        if ($validation->run()) {//melakukan validasi
            $pelatihan->update();//menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pelatihan"] = $pelatihan->getById($id); //mengambil data untuk ditampilakan pada form
        if (!$data["pelatihan"]) show_404(); // jika tidak ada data, tampilkan error 404
        
        $this->load->view("admin/pelatihan/edit_form", $data);//menampilkan form edit
    }

    public function delete($id=null)
    /*
    method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.*/

    {
        if (!isset($id)) show_404();
        
        if ($this->Pelatihan_Model->delete($id)) 
        {
            redirect(site_url('admin/pelatihan'));
        /*
        Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman admin/pelatihan/.
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
            // echo "<br>";
            foreach($sheetData as $key => $value) {
                $count = 0;
                foreach($value as $keys => $values) {
                    if($key != 0) {
                        if($keys != 0) {
                            if($count == 3 || $count == 4) {
                                $time = strtotime($values);
                                $date = date('Y-m-d', $time);

                                $data[$count] = $date;
                                // echo $date;
                                $count++;
                            } else {
                                $data[$count] = $values;
                                // echo $values;
                                $count++;
                            }
                        }
                    }
                }
                if($key != 0) {
                    // echo $data[0].' | '.$data[1].' | '.$data[2];
                    // echo '<br>';
                    $check = $this->Pelatihan_Model->getById($data[0]);

                    if(!isset($check)) {
                        $this->Pelatihan_Model->addFromExcel($data[0], $data[1], $data[2], $data[3], $data[4]);
                    }
                }
            }
        }

        // redirect(site_url('admin/pelatihan'));
    }
}

?>