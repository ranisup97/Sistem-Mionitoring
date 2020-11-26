<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	

</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

			<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pelatihan/add') ?>"><i class="fas fa-plus"></i> Tambah Pelatihan</a>
					</div>

				<!--IMPORT FILE-->
					<div class="card-header">
						<form action="<?php echo site_url('admin/pelatihan/import');?>" method="post" id="import_form" enctype="multipart/form-data">
						<p><label>Select Excel File</label>
							<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
							<br />
							<input type="submit" id="import_for" name="import" value="Import" class="btn btn-info" />
						</form>
						<br />
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID</th>
										<th>Nama Pelatihan</th>
										<th>Tempat</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Akhir</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $id = 1; $i = 1;
									if (!empty($pelatihan)){
									foreach ($pelatihan as $var): 
										  ?>
									<tr>
										<?php echo '<td>'.$i.'</td>'; ?>
										<?php echo '<td>'.$var->id_pelatihan.'</td>'; ?>
										<?php echo '<td>'.$var->nama_pelatihan.'</td>'; ?>

									<!--ePlace-->
										<?php echo '<td>'.$var->tempat_pelatihan.'</td>'; ?>
										
									<!--tglMulaiFunction-->
										<?php echo '<td>'.$var->tgl_mulai.'</td>'; ?>
									
									<!--tglAkhir-->
										<?php echo '<td>'.$var->tgl_akhir.'</td>'; ?>


								<!--action-->
									<!--EDIT-->
										<td width="100">
											<a href="<?php echo site_url('admin/pelatihan/edit/'.$var->id_pelatihan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i></a>
											 <!--fungsi java script-->

									<!--DELETE-->
											<a onclick="deleteConfirm('<?php echo site_url('admin/pelatihan/delete/'.$var->id_pelatihan) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
										
										<!--CheckBox-->
										</td>
									</tr>
									<?php 
									$id=$id+1;
									$i++;
								endforeach; }
								?>
								</tbody>
							</table>
							<br>
							<!--<p align="right"><input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success"/></p>-->
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>

<!--IMPORT EXCEL-->
<script>
	$(document).ready(function(){

		load_data();

		function load_data()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>admin/excel_import/fetch", 
				method:"POST",
				success:function(data){
					$('#dataTable').html(data);
				}
			})
		}
		$('#import_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"<?php echo base_url(); ?>admin/excel_import/import", 
				method:"POST",
				data:new FormData(this),
				contentType:falimport_for		cache:false,
				processData:false,
				success:function(data){
					$('#file').val('');
					load_data();
					
				}
				error: function(data){
            alert('error');
        }
			})
		});
	});
</script>



<!--CHECKBOX-->
<script>
	$('#submit').click(function (){
		var check = new Array();
		$('[name=case]').click(function () {
		    check = checkAll();

		    alert('selected: ' + values);
		});

		function checkAll() {
			var values = new Array();

		    $('[name=case]:checked').each(function () {
		    	values.push( $(this).val() );
		    });

		    return values;
		}
});
</script>