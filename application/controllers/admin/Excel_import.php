<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('tools');
		$this->load->model('excel_import_model');
		$this->load->model('product_model');
		$this->load->library('excel');
	}

	function index()
	{
		//$this->load->library('excel');
		$data["products"] = $this->product_model->getAll();
        $this->load->view("admin/product/list", $data);
	}

	public function pelatihan() {
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'name-of-the-generated-file.xlsx';
 
        $writer->save($filename); // will create and save the file in the root of the project
	}
	public function monitoring() {

	}
	public function peserta() {

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

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			
			foreach($object->getWorksheetIterator as $worksheet ) 
				
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row=2; $row<=$highestRow ; $row++) 
				{ 
					$_tanggal = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$_nik = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$_jabatan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$job_function = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$_atasan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$data[] = array(
						'tanggal'		=>	$_tanggal,
						'name'			=>	$_name,
						'nik'			=>	$_nik,
						'jabatan'		=>	$_jabatan,
						'job'			=>	$job_function,
						'atasan'		=>	$_atasan,
					);
				}
			}
			

			
			$this->excel_import_model->insert($data);
			echo 'Data Imported Successfully';
		}
	}
} 
?>
