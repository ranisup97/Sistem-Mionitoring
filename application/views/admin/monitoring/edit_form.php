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
						<a href="<?php echo site_url('admin/monitoring/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/monitoring/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $monitoring->id?>" />

					
					<!--NAMA-->
							<div class="form-group">
								<label for="id_pelatihan">ID Pelatihan*</label>
								<input class="form-control <?php echo form_error('id_pelatihan') ? 'is-invalid':'' ?>"
								 type="text" name="id_pelatihan" placeholder="Nama monitoring" value="<?php echo $monitoring->id_pelatihan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('id_pelatihan') ?>
								</div>
							</div>

					<!--nik-->
							<div class="form-group">
								<label for="nik">NIK Peserta*</label>
								<input class="form-control <?php echo form_error('nik') ? 'is-invalid':'' ?>"
								 type="text" name="nik" placeholder="masukkan nik" value="<?php echo $monitoring->nik ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nik') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="cycle1_status">Cycle 1 Status*</label>
								<input class="form-control <?php echo form_error('cycle1_status') ? 'is-invalid':'' ?>"
								 type="text" name="cycle1_status" placeholder="masukkan cycle1_status" value="<?php echo $monitoring->cycle1_status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle1_status') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="cycle2_status">Cycle 2 Status*</label>
								<input class="form-control <?php echo form_error('cycle2_status') ? 'is-invalid':'' ?>"
								 type="text" name="cycle2_status" placeholder="masukkan cycle2_status" value="<?php echo $monitoring->cycle2_status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle2_status') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle2_pre_test">Cycle 2 Pre Test</label>
								<input class="form-control <?php echo form_error('cycle2_pre_test') ? 'is-invalid':'' ?>"
								 type="text" name="cycle2_pre_test" placeholder="masukkan cycle 2 pre test" value="<?php echo $monitoring->cycle2_pre_test ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle2_pre_test') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle2_post_test">Cycle 2 Post Test</label>
								<input class="form-control <?php echo form_error('cycle2_post_test') ? 'is-invalid':'' ?>"
								 type="text" name="cycle2_post_test" placeholder="masukkan cycle 2 post test" value="<?php echo $monitoring->cycle2_post_test ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle2_post_test') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="cycle3_status">Cycle 3 Status*</label>
								<input class="form-control <?php echo form_error('cycle3_status') ? 'is-invalid':'' ?>"
								 type="text" name="cycle3_status" placeholder="masukkan cycle3_status" value="<?php echo $monitoring->cycle3_status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle3_status') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle3_pre_test">Cycle 3 Pre Test</label>
								<input class="form-control <?php echo form_error('cycle3_pre_test') ? 'is-invalid':'' ?>"
								 type="text" name="cycle3_pre_test" placeholder="masukkan cycle 3 pre test" value="<?php echo $monitoring->cycle3_pre_test ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle3_pre_test') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle3_post_test">Cycle 3 Post Test</label>
								<input class="form-control <?php echo form_error('cycle3_post_test') ? 'is-invalid':'' ?>"
								 type="text" name="cycle3_post_test" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle3_post_test ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle3_post_test') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="cycle4_status">Cycle 4 Status*</label>
								<input class="form-control <?php echo form_error('cycle4_status') ? 'is-invalid':'' ?>"
								 type="text" name="cycle4_status" placeholder="masukkan cycle4_status" value="<?php echo $monitoring->cycle4_status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle4_status') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle4_judul_laporan">Cycle 4 Judul Laporan</label>
								<input class="form-control <?php echo form_error('cycle4_judul_laporan') ? 'is-invalid':'' ?>"
								 type="text" name="cycle4_judul_laporan" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle4_judul_laporan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle4_judul_laporan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle4_tanggal">Cycle 4 Tanggal</label>
								<input class="form-control <?php echo form_error('cycle4_tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="cycle4_tanggal" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle4_tanggal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle4_tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="cycle5_status">Cycle 5 Status*</label>
								<input class="form-control <?php echo form_error('cycle5_status') ? 'is-invalid':'' ?>"
								 type="text" name="cycle5_status" placeholder="masukkan cycle5_status" value="<?php echo $monitoring->cycle5_status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle5_status') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle5_judul_laporan">Cycle 5 Judul Laporan</label>
								<input class="form-control <?php echo form_error('cycle5_judul_laporan') ? 'is-invalid':'' ?>"
								 type="text" name="cycle5_judul_laporan" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle5_judul_laporan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle5_judul_laporan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle5_tanggal">Cycle 5 Tanggal</label>
								<input class="form-control <?php echo form_error('cycle5_tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="cycle5_tanggal" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle5_tanggal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle5_tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="cycle6_status">Cycle 6 Status*</label>
								<input class="form-control <?php echo form_error('cycle6_status') ? 'is-invalid':'' ?>"
								 type="text" name="cycle6_status" placeholder="masukkan cycle6_status" value="<?php echo $monitoring->cycle6_status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle6_status') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle6_judul_laporan">Cycle 6 Judul Laporan</label>
								<input class="form-control <?php echo form_error('cycle6_judul_laporan') ? 'is-invalid':'' ?>"
								 type="text" name="cycle6_judul_laporan" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle6_judul_laporan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cycle6_judul_laporan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="cycle6_tanggal">Cycle 6 Tanggal</label>
								<input class="form-control <?php echo form_error('cycle6_tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="cycle6_tanggal" placeholder="masukkan cycle 3 post test" value="<?php echo $monitoring->cycle6_tanggal ?>" />
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
