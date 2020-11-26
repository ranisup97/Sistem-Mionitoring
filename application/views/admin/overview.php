<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin menampilkan breadcrumb di halaman overview,
        silakan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php $this->load->view("admin/_partials/breadcrumb.php") ?> <!--berfungsi-->

	<!-- Icon Cards-->
		<div class="row">

	<!--CYCLE 1-->
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5"><h2>CYCLE 1</h2> <br> <h3>Pre Reading</h3></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/cycle/c1') ?>" > <!--yg dipanggil controllernya-->
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>


	<!--CYCLE 2-->
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5"><h2>CYCLE 2</h2> <br><h3>Digital Learning</h3></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="admin/cycle/c2"> <!--link ke alamat digital learning telkom-->
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>


	<!--CYCLE 3-->

			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5"><h2>CYCLE 3</h2> <br><h3>Class Room</h3></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="admin/cycle/c3"><!--link ke alamat cognitium telkom-->
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			</br>


	<!--CYCLE 4-->
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5"><h2>CYCLE 4</h2> <br><h3>Action Learning Project</h3></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="admin/cycle/c4">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>


	<!--CYCLE 5-->
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5"><h2>CYCLE 5</h2> <br><h3>Dashboard Checking</h3></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="admin/cycle/c5">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>


	<!--CYCLE 6-->
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-life-ring"></i>
				</div>
				<div class="mr-5"><h2>CYCLE 6</h2> <br><h3>Knowledge Sharing</h3></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="admin/cycle/c6">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
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
    
</body>
</html>
