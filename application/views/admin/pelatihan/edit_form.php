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
						<a href="<?php echo site_url('admin/pelatihan/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/pelatihan/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $pelatihan->id_pelatihan?>" />

					
					<!--NAMA-->
							<div class="form-group">
								<label for="nama_pelatihan">Nama Pelatihan*</label>
								<input class="form-control <?php echo form_error('nama_pelatihan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_pelatihan" placeholder="Nama Pelatihan" value="<?php echo $pelatihan->nama_pelatihan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_pelatihan') ?>
								</div>
							</div>


				

					<!--tempat_pelatihan-->
							<div class="form-group">
								<label for="tempat_pelatihan">Tempat Pelatihan*</label>
								<input class="form-control-file <?php echo form_error('tempat_pelatihan') ? 'is-invalid':'' ?>"
								 type="text" name="tempat_pelatihan" placeholder="masukkan tempat_pelatihan" value="<?php echo $pelatihan->tempat_pelatihan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tempat_pelatihan') ?>
								</div>
							</div>


					<!--tgl_mulai-->
							<div class="form-group">
								<label for="tgl_mulai">Tanggal Mulai*</label>
								<input class="form-control-file <?php echo form_error('tgl_mulai') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_mulai" placeholder="Tanggal Mulai" value="<?php echo $pelatihan->tgl_mulai ?>" />
								<!--<input type="hidden" name="old_tgl_mulai" value="<?php echo $pelatihan->tgl_mulai ?>" />-->
								<div class="invalid-feedback">
									<?php echo form_error('tgl_mulai') ?>
								</div>
							</div>

					<!--tgl_akhir-->
							<div class="form-group">
								<label for="tgl_akhir">Tanggal Akhir*</label>
								<input class="form-control-file <?php echo form_error('tgl_akhir') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_akhir" placeholder="masukkan tgl_akhir" value="<?php echo $pelatihan->tgl_akhir ?>" />
								<!--<input type="hidden" name="old_tgl_akhir" value="<?php echo $pelatihan->tgl_akhir ?>" />-->
								<div class="invalid-feedback">
									<?php echo form_error('tgl_akhir') ?>
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
