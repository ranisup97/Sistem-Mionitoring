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
						<a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Tambah Peserta</a>
					</div>

				<!--IMPORT FILE-->
					<div class="card-header">
						
						
						<form method="post" id="import_form" enctype="multipart/form-data">
						<p><label>Select Excel File</label>
							<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
							<br />
							<input type="submit" name="import" value="Import" class="btn btn-info" />
						</form>
						<br />
						
					</div>


					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>NIK</th>
										<th>Jabatan</th>
										<th>JobFunction</th>
										<th>Atasan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($excel_import as $product): ?>
									<tr>
										<td width="150">
									<!--NAMA-->
											<?php echo $product->tanggal ?>
										</td>

									<!--TANGGAL-->
										<td>
										<?php echo $product->name ?>
										</td>

									<!--NIK-->
										<td>
											<?php echo $product->nik ?>
										</td>

									<!--JABATAN-->
										<td class="small">
											<?php echo substr($product->jabatan, 0, 120) ?>
										</td>
										<!--<td> <img src="<?php echo base_url('upload/product/'.$product->jabatan) ?>" width="64" /> </td>-->
									
									<!--JobFunction-->
										<td class="small">
											<?php echo substr($product->job, 0, 120) ?>
										</td>
									
									<!--ATASAN-->
										<td>
											<?php echo $product->atasan ?>
										</td>


								<!--action-->
									<!--EDIT-->
										<td width="100">
											<a href="<?php echo site_url('admin/products/edit/'.$product->product_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i></a>
											 <!--fungsi java script-->


									<!--DELETE-->
											<a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$product->product_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>


										<!--CheckBox-->
											 <a href="<?php echo site_url('#'.$product->product_id) ?>"
											 class="btn btn-small">
											 	<i class="checkbox">
  												<label><input type="checkbox" name="name[]"></label></i>
</div>
											 </a>

										</td>
									</tr>
									<?php endforeach; ?>



								</tbody>

							</table>
							<br>
							<p align="right"><input type="submit" name="submit" value="Submit" class="btn btn-success"/></p>
							

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
				url:"<?php echo base_url(); ?>excel_import/fetch", 
				method:"POST",
				success:function(data){
					alert(data);
					$('#dataTable').html(data);
				}
			})
		}

		$('#import_form'.on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"<?php echo base_url(); ?>excel_import/import", 
				method:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data){
					$('#file').val('');
					load_data();
					alert(data);
				}
			})
		});
	});
</script>