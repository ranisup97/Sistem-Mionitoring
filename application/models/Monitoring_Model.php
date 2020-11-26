<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_Model extends CI_Model
{
    private $_table = "monitoring"; //nama tabel


    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya
    public $id;
    public $id_pelatihan;
    public $nik;
    public $cycle1_status;
    public $cycle2_status;
    public $cycle2_pre_test;
    public $cycle2_post_test;
    public $cycle3_status;
    public $cycle3_pre_test;
    public $cycle3_post_test;
    public $cycle4_status;
    public $cycle4_judul_laporan;
    public $cycle4_tanggal;
    public $cycle5_status;
    public $cycle5_judul_laporan;
    public $cycle5_tanggal;
    public $cycle6_status;
    public $cycle6_judul_laporan;
    public $cycle6_tanggal;


    public function rules()
    {
        return [

            ['field' => 'id_pelatihan',
            'label' => 'ID Pelatihan',
            'rules' => 'required'],
            
            ['field' => 'nik',
            'label' => 'NIK Peserta ',
            'rules' => 'required']

        ];
    }
    public function rulesEdit()
    {
        return [
            ['field' => 'id',
            'label' => 'ID Monitoring',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        $results = array();

        $this->db->select('*');
        $this->db->from('monitoring');
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
        return $this->db->get_where($this->_table, ["id" => $id])->row();
        //ini sama artinya seperti:
        // SELECT * FROM products WHERE id = $id
        //method ini akan mengembalikan sebuah objek
        // => artinya WHERE

        //row() = fungsi untuk mengambil satu data dari hasil query
    }

    public function save()
    //menyimpan data ke database
    {
        $post = $this->input->post();//ambil data dari form
        $this->id_pelatihan = $post["id_pelatihan"];//isi field eName
        $this->nik = $post["nik"];//isi field eName
        $this->cycle1_status = 0;//isi field eName
        $this->cycle2_status = 0;
        $this->cycle3_status = 0;
        $this->cycle4_status = 0;
        $this->cycle5_status = 0;
        $this->cycle6_status = 0;
        
        $this->db->insert($this->_table, $this);//simpan ke database
    }

    public function update()
    //update data
    {
        $post = $this->input->post(); //ambil data dari form
        $this->id = $post["id"];//isi field eName
        $this->id_pelatihan = $post["id_pelatihan"];//isi field eName
        $this->nik = $post["nik"];//isi field eName
        $this->cycle1_status = $post["cycle1_status"];//isi field eName
        $this->cycle2_status = $post["cycle2_status"];//isi field eName
        $this->cycle2_pre_test = $post["cycle2_pre_test"];//isi field eName
        $this->cycle2_post_test = $post["cycle2_post_test"];//isi field eName
        $this->cycle3_status = $post["cycle3_status"];//isi field eName
        $this->cycle3_pre_test = $post["cycle3_pre_test"];//isi field eName
        $this->cycle3_post_test = $post["cycle3_post_test"];//isi field eName
        $this->cycle4_status = $post["cycle4_status"];//isi field eName
        $this->cycle4_judul_laporan = $post["cycle4_judul_laporan"];//isi field eName
        $this->cycle4_tanggal = $post["cycle4_tanggal"];//isi field eName
        $this->cycle5_status = $post["cycle5_status"];//isi field eName
        $this->cycle5_judul_laporan = $post["cycle5_judul_laporan"];//isi field eName
        $this->cycle5_tanggal = $post["cycle5_tanggal"];//isi field eName
        $this->cycle6_status = $post["cycle6_status"];//isi field eName
        $this->cycle6_judul_laporan = $post["cycle6_judul_laporan"];//isi field eName
        $this->cycle6_tanggal = $post["cycle6_tanggal"];//isi field eName

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    //menghapus data
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }   

    public function getByPelAndCycle($cycle, $id_pelatihan) {
        if ($cycle == 1) {
            $this->db->select('id, nik, cycle1_status');
            $this->db->from('monitoring');
            $this->db->where('id_pelatihan', $id_pelatihan);
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                $results = $query->result();
            } else {
                $results = null;
                
            }
            return $results;
        } else if ($cycle == 2) {
            $this->db->select('id, nik, cycle2_status, cycle2_pre_test, cycle2_post_test');
            $this->db->from('monitoring');
            $this->db->where('id_pelatihan', $id_pelatihan);
            $this->db->where('cycle1_status', 1);
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                $results = $query->result();
            } else {
                $results = null;
                
            }
            return $results;
        } else if ($cycle == 3) {
            $this->db->select('id, nik, cycle3_status, cycle3_pre_test, cycle3_post_test');
            $this->db->from('monitoring');
            $this->db->where('id_pelatihan', $id_pelatihan);
            $this->db->where('cycle2_status', 1);
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                $results = $query->result();
            } else {
                $results = null;
                
            }
            return $results;
        } else if ($cycle == 4) {
            $this->db->select('id, nik, cycle4_status, cycle4_judul_laporan, cycle4_tanggal');
            $this->db->from('monitoring');
            $this->db->where('id_pelatihan', $id_pelatihan);
            $this->db->where('cycle3_status', 1);
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                $results = $query->result();
            } else {
                $results = null;
            }
            return $results;
        } else if ($cycle == 5) {
            $this->db->select('id, nik, cycle5_status, cycle5_judul_laporan, cycle5_tanggal');
            $this->db->from('monitoring');
            $this->db->where('id_pelatihan', $id_pelatihan);
            $this->db->where('cycle4_status', 1);
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                $results = $query->result();
            } else {
                $results = null;
            }
            return $results;
        } else if ($cycle == 6) {
            $this->db->select('id, nik, cycle6_status, cycle6_judul_laporan, cycle6_tanggal');
            $this->db->from('monitoring');
            $this->db->where('id_pelatihan', $id_pelatihan);
            $this->db->where('cycle5_status', 1);
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                $results = $query->result();
            } else {
                $results = null;
            }
            return $results;
        }
    }

    public function editStatus($cycle, $id) {
        $data = [
            'cycle'.$cycle.'_status' => 1
        ];
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);
    }

    public function updateNilai() {
        $post = $this->input->post(); //ambil data dari form
        if($post['cycle'] == 2) {
            $data = [
                'cycle2_pre_test' => $post["cycle2_pre_test"],
                'cycle2_post_test' => $post["cycle2_post_test"]
            ];
        } else {
            $data = [
                'cycle3_pre_test' => $post["cycle3_pre_test"],
                'cycle3_post_test' => $post["cycle3_post_test"]
            ];
        }
        
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table, $data);   
    }

    public function updateC4C5C6() {
        $post = $this->input->post(); //ambil data dari form
        if($post['cycle'] == 4) {
            $data = [
                'cycle4_judul_laporan' => $post["cycle4_judul_laporan"],
                'cycle4_tanggal' => $post["cycle4_tanggal"]
            ];
        } else if($post['cycle'] == 5) {
            $data = [
                'cycle5_judul_laporan' => $post["cycle5_judul_laporan"],
                'cycle5_tanggal' => $post["cycle5_tanggal"]
            ];
        } else {
            $data = [
                'cycle6_judul_laporan' => $post["cycle6_judul_laporan"],
                'cycle6_tanggal' => $post["cycle6_tanggal"]
            ];
        }
        
        $this->db->where('id', $post['id']);
        $this->db->update($this->_table, $data);  
    }

    public function addFromExcel($data) {
        $this->id_pelatihan = $data[0];//isi field eName
        $this->nik = $data[1];//isi field eName
        $this->cycle1_status = $data[2];//isi field eName
        $this->cycle2_status = $data[3];//isi field eName
        $this->cycle2_pre_test = $data[4];//isi field eName
        $this->cycle2_post_test = $data[5];//isi field eName
        $this->cycle3_status = $data[6];//isi field eName
        $this->cycle3_pre_test = $data[7];//isi field eName
        $this->cycle3_post_test = $data[8];//isi field eName
        $this->cycle4_status = $data[9];//isi field eName
        $this->cycle4_judul_laporan = $data[10];//isi field eName
        $this->cycle4_tanggal = $data[11];//isi field eName
        $this->cycle5_status = $data[12];//isi field eName
        $this->cycle5_judul_laporan = $data[13];//isi field eName
        $this->cycle5_tanggal = $data[14];//isi field eName
        $this->cycle6_status = $data[15];//isi field eName
        $this->cycle6_judul_laporan = $data[16];//isi field eName
        $this->cycle6_tanggal = $data[17];//isi field eName

        $this->db->insert($this->_table, $this);//simpan ke database
    }

}

?>