<?php defined('BASEPATH') OR exit('No direct script access allowed');

class peserta_model extends CI_Model
{
    private $_table = "peserta"; //nama tabel
    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya
    public $nik;
    public $nama;
    public $jabatan;

    public function rules()
    {
        return [
            ['field' => 'nik',
            'label' => 'NIK',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
        
            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        $results = array();
        $this->db->select('*');
        $this->db->from('peserta');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
        //ini sama artinya seperti:
        //SELECT * FROM products
        //method ini akan mengembalikan sebuah array
        //result() = fungsi untuk mengambil semua data hasil query
        //_table = nama tabel
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nik" => $id])->row();
        //ini sama artinya seperti:
        // SELECT * FROM products WHERE nik = $id
        //method ini akan mengembalikan sebuah objek
        // => artinya WHERE
        //row() = fungsi untuk mengambil satu data dari hasil query
    }

    public function save()
    //menyimpan data ke database
    {
        $post = $this->input->post();//ambil data dari form
        $this->nik = $post["nik"];//isi field nik
        $this->nama = $post["nama"];//isi field nama
        $this->jabatan = $post["jabatan"];//isi field nik
        $this->db->insert($this->_table, $this);//simpan ke database
    }

    public function update()
    //update data
    {
        $post = $this->input->post(); //ambil data dari form
        $this->nik = $post["nik"]; //isi field nik
        $this->nama = $post["nama"]; //isi field nama
        $this->jabatan = $post["jabatan"]; //isi field job
        $this->db->update($this->_table, $this, array('nik' => $post['nik']));
    }

    public function delete($id)
    //menghapus data
    {
        return $this->db->ie($this->_table, array("nik" => $id));
    }   

    public function addFromExcel($nik, $nama, $jabatan) {
        $this->nik = $nik;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->db->insert($this->_table, $this);//simpan ke database
    }
}

?>