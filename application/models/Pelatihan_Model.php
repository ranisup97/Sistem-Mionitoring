<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan_model extends CI_Model
{
    private $_table = "pelatihan"; //nama tabel
    
    
    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya
    public $id_pelatihan;
    
    public $nama_pelatihan;
    public $tempat_pelatihan;
    public $tgl_mulai;
    public $tgl_akhir;
    
    
    public function rules()
    {
        return [
            
            ['field' => 'nama_pelatihan',
            'label' => 'Nama Pelatihan',
            'rules' => 'required'],
            
            
            
            ['field' => 'tempat_pelatihan',
            'label' => 'Tempat Pelatihan',
            'rules' => 'required'],
            
            ['field' => 'tgl_mulai',
            'label' => 'Tanggal Mulai',
            'rules' => 'required'],
            
            ['field' => 'tgl_akhir',
            'label' => 'Tanggal Akhir',
            'rules' => 'required']
            
        ];
    }
    
    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        $results = array();
        $this->db->select('*');
        $this->db->from('pelatihan');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
        //ini sama artinya seperti:
        //SELECT * FROM pelatihan
        //method ini akan mengembalikan sebuah array
        //result() = fungsi untuk mengambil semua data hasil query
        //_table = nama tabel
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pelatihan" => $id])->row();
        //ini sama artinya seperti:
        // SELECT * FROM pelatihan WHERE id_pelatihan = $id
        //method ini akan mengembalikan sebuah objek
        // => artinya WHERE
        
        //row() = fungsi untuk mengambil satu data dari hasil query
    }
    
    public function save()
    //menyimpan data ke database
    {
        $post = $this->input->post();//ambil data dari form
        $this->nama_pelatihan = $post["nama_pelatihan"];//isi field name
        $this->tempat_pelatihan = $post["tempat_pelatihan"];//isi field tempat_pelatihan
        $this->tgl_mulai = $post["tgl_mulai"];//isi field tgl_mulai
        $this->tgl_akhir = $post["tgl_akhir"];//isi field tgl_akhir
        
        $this->db->insert($this->_table, $this);//simpan ke database
    }
    
    public function update()
    //update data
    {
        $post = $this->input->post(); //ambil data dari form
        $this->id_pelatihan = $post["id"]; //isi field id
        
        
        $this->nama_pelatihan = $post["nama_pelatihan"]; //isi field nama
        $this->tempat_pelatihan = $post["tempat_pelatihan"]; //isi field tempat_pelatihan
        $this->tgl_mulai = $post["tgl_mulai"]; //isi field tgl_mulai
        $this->tgl_akhir = $post["tgl_akhir"]; //isi field tgl_akhir
        $this->db->update($this->_table, $this, array('id_pelatihan' => $post['id']));
    }
    
    public function delete($id)
    //menghapus data
    {
        return $this->db->delete($this->_table, array("id_pelatihan" => $id));
    }
    
    function fetch()
    {
        $data = $this->excel_import_model->select();
        $output = '
        
        <table class="table table-hover" width="100%" cellspacing="0">
        <thead>
        <tr>
        
        <th>Event Name</th>
        
        <th>Event Place</th>
        <th>Start Date</th>
        <th>End Date</th>
        </tr>
        </thead>
        ';
        foreach($data->result() as $row) 
        {
            $output .= '
            <tr>
            
            <td>'.$row->nama_pelatihan.'</td>
            
            <td>'.$row->tempat_pelatihan.'</td>
            <td>'.$row->tgl_mulai.'</td>
            <td>'.$row->tgl_akhir.'</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
        
    }
    
    public function addFromExcel($id_pelatihan, $nama_pelatihan, $tempat_pelatihan, $tgl_mulai, $tgl_akhir) {
        $this->id_pelatihan = $id_pelatihan;
        $this->nama_pelatihan = $nama_pelatihan;
        $this->tempat_pelatihan = $tempat_pelatihan;
        $this->tgl_mulai = $tgl_mulai;
        $this->tgl_akhir = $tgl_akhir;
        
        $this->db->insert($this->_table, $this);//simpan ke database
    }
    
}


?>