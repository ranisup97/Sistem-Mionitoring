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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

					<!--TOMBOL BACK-->
						<a href="<?php echo site_url('admin/cycle/cycle_detail/'.$cycle.'/'.$id_pelatihan) ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/cycle/edit_detail/".$cycle.'/'.$id_pelatihan.'/'.$data->id); ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $data->id; ?>" />
							<input type="hidden" name="cycle" value="<?php echo $cycle; ?>" />
					
					<!--NAMA-->
							<div class="form-group">
								<label for="cycle6_judul_laporan">Cycle 6 Judul Laporan</label>
								<input class="form-control <?php echo form_error('cycle6_judul_laporan') ? 'is-invalid':'' ?>"
								 type="text" name="cycle6_judul_laporan" placeholder="cycle 6 judul laporan" value="<?php echo $data->cycle6_judul_laporan; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle6_judul_laporan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle6_tanggal">Cycle 6 Tanggal</label>
								<input class="form-control <?php echo form_error('cycle6_tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="cycle6_tanggal" placeholder="cycle 6 tanggal" value="<?php echo $data->cycle6_tanggal; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle6_tanggal') ?>
								</div>
							</div>

					<!--SUBMIT-->
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
					</div>


					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
