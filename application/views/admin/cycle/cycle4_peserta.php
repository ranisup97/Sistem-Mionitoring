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
					<?php if ($this->session->flashdata('success_status')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success_status'); ?>
					</div>
					<?php endif; ?>
                    <div class="card-header">
						<h5>Daftar Peserta pada pelatihan <?php echo $pelatihan->nama_pelatihan; ?></h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>NIK</th>
										<th>Nama Peserta</th>
										<th>Jabatan</th>
                                        <th>Cycle 4 Judul Laporan</th>
                                        <th>Cycle 4 Tanggal</th>
                                        <th>Cycle 4 Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $id = 1; $i = 1;
									if (!empty($data)){
									foreach ($data as $var): 
										  ?>
									<tr>
										<?php echo '<td>'.$i.'</td>'; ?>
										<?php echo '<td>'.$var->nik.'</td>'; ?>

									<!--ePlace-->
										<?php echo '<td>'.$var->nama.'</td>'; ?>
										
									<!--tglMulaiFunction-->
										<?php echo '<td>'.$var->jabatan.'</td>'; ?>
										<?php echo $var->cycle4_judul_laporan == NULL ? '<td>Data Belum ada</td>' : '<td>'.$var->cycle4_judul_laporan.'</td>'; ?>
										<?php echo $var->cycle4_tanggal == NULL ? '<td>Data Belum ada</td>' : '<td>'.$var->cycle4_tanggal.'</td>'; ?>
										<?php echo '<td>'.$var->cycle4_status.'</td>'; ?>
									
									<!--tglAkhir-->

								<!--action-->
									<!--EDIT-->
										<td width="150">
											<a href="<?php echo site_url('admin/cycle/edit_detail/4/'.$pelatihan->id_pelatihan.'/'.$var->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i></a>

									<!--DELETE-->
											<a onclick="statusConfirm('<?php echo site_url('admin/cycle/edit_status_c4c5c6/4/'.$var->id.'/') ?>')"
											 href="#!" class="btn btn-primary btn-sm <?php echo $var->cycle4_status == 0 ? '' : 'disabled' ?>">Ubah Status</a>
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
	function statusConfirm(url){
		$('#btn-status').attr('href', url);
		$('#statusModal').modal();
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