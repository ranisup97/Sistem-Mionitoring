<?php
  class Excel_import_model extends CI_Model
  {
  	function select(){
  		$this->db->order_by('name', 'DESC');
  		$query = $this->db->get('products');//tabel di database
  		return $query;
  	}

  	function insert($data)
  	{
  		$this->db->insert_batch('products', $data);
  	}

    function fetch()
  {
    $data = $this->excel_import_model->select();
    $output = '
    
    <table class="table table-hover" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Jabatan</th>
          <th>JobFunction</th>
          <th>Atasan</th>
        </tr>
      </thead>
    ';
    foreach($data->result() as $row) 
    {
      $output .= '
      <tr>
        <td>'.$row->tanggal.'</td>
        <td>'.$row->name.'</td>
        <td>'.$row->nik.'</td>
        <td>'.$row->jabatan.'</td>
        <td>'.$row->job.'</td>
        <td>'.$row->atasan.'</td>
      </tr>
      ';
    }
    $output .= '</table>';
    echo $output;
  }
  }
 ?>