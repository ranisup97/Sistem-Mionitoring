<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	

</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

			<!--<tr>
			<td width="175"><b> Filter Tanggal (Range Awal)</b></td> 
			<td width="2" align="left"><b>:</b></td> 
			<td><input id="tanggalpelatihanawal" name="tanggalpelatihanawal" type="date" value="20181101" /></td> 
			</tr> <br><br />
			<tr>
			<td width="175"><b> Filter Tanggal (Range Akhir)</b></td> 
			<td width="2" align="left"><b>:</b></td> 
			<td><input id="tanggalpelatihanakhir" name="tanggalpelatihanakhir" type="date" value="20181130" /></td> 
			</tr> -->



			<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<h5>Daftar Pelatihan</h5>
					</div>

					<div class="card-body">
						<div class="table-responsive">
						<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Pelatihan</th>
										<th>Tempat Pelatihan</th>
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
										<a href="<?php echo site_url('admin/cycle/cycle_detail/5/'.$var->id_pelatihan) ?>"
											 class="btn btn-small"><i class="fas fa-search"></i></a>
										
										<!--CheckBox-->
										</td>
									</tr>
									<?php 
									$id=$id+1; $i++;
								endforeach; }
								?>
								</tbody>
							</table>

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