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
						<a href="<?php echo site_url('admin/monitoring/add') ?>"><i class="fas fa-plus"></i> Tambah monitoring</a>
					</div>

				<!--IMPORT FILE-->
					<div class="card-header">
						<form action="<?php echo site_url('admin/monitoring/import');?>" method="post" id="import_form" enctype="multipart/form-data">
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
										<th>Nama Pelatihan</th>
										<th>NIK</th>
										<th>Nama Peserta</th>
										<th>Cycle 1 Status</th>
										<th>Cycle 2 Status</th>
										<th>Cycle 2 Pre Test</th>
										<th>Cycle 2 Post Test</th>
										<th>Cycle 3 Status</th>
										<th>Cycle 3 Pre Test</th>
										<th>Cycle 3 Post Test</th>
										<th>Cycle 4 Status</th>
										<th>Cycle 4 Judul Laporan</th>
										<th>Cycle 4 Tanggal</th>
										<th>Cycle 5 Status</th>
										<th>Cycle 5 Judul Laporan</th>
										<th>Cycle 5 Tanggal</th>
										<th>Cycle 6 Status</th>
										<th>Cycle 6 Judul Laporan</th>
										<th>Cycle 6 Tanggal</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $id = 1; $i = 1;
									if (!empty($monitoring)){
									foreach ($monitoring as $var): 
										  ?>
									<tr>
										<?php echo '<td>'.$i.'</td>'; ?>

									<!--ePlace-->
										<?php echo '<td>'.$var->nama_pelatihan.'</td>'; ?>
										
									<!--tglMulaiFunction-->
										<?php echo '<td>'.$var->nik.'</td>'; ?>
										<?php echo '<td>'.$var->nama_peserta.'</td>'; ?>
									
									<!--tglAkhir-->
										<?php echo '<td>'.$var->cycle1_status.'</td>'; ?>
										<?php echo '<td>'.$var->cycle2_status.'</td>'; ?>
										<?php echo $var->cycle2_pre_test == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle2_pre_test.'</td>' ?>
										<?php echo $var->cycle2_post_test == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle2_post_test.'</td>' ?>
										<?php echo '<td>'.$var->cycle3_status.'</td>'; ?>
										<?php echo $var->cycle3_pre_test == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle3_pre_test.'</td>' ?>
										<?php echo $var->cycle3_post_test == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle3_post_test.'</td>' ?>
										<?php echo '<td>'.$var->cycle4_status.'</td>'; ?>
										<?php echo $var->cycle4_judul_laporan == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle4_judul_laporan.'</td>' ?>
										<?php echo $var->cycle4_tanggal == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle4_tanggal.'</td>' ?>
										<?php echo '<td>'.$var->cycle5_status.'</td>'; ?>
										<?php echo $var->cycle5_judul_laporan == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle5_judul_laporan.'</td>' ?>
										<?php echo $var->cycle5_tanggal == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle5_tanggal.'</td>' ?>
										<?php echo '<td>'.$var->cycle6_status.'</td>'; ?>
										<?php echo $var->cycle6_judul_laporan == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle6_judul_laporan.'</td>' ?>
										<?php echo $var->cycle6_tanggal == NULL ? '<td>Data belum ada</td>' : '<td>'.$var->cycle6_tanggal.'</td>' ?>

								<!--action-->
									<!--EDIT-->
										<td width="100">
											<a href="<?php echo site_url('admin/monitoring/edit/'.$var->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i></a>
											 <!--fungsi java script-->

									<!--DELETE-->
											<a onclick="deleteConfirm('<?php echo site_url('admin/monitoring/delete/'.$var->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
										
										<!--CheckBox-->
										</td>
									</tr>
									<?php 
									$id=$id+1; $i++;
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