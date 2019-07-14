<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php 
		if($profile_status == 'registration'){
			showRegistrationProfile($profiledetails, $lastedu, $currentedu, $religion);
		} else if($profile_status == 'admission') {
      showAdmissionProfile($profiledetails,$studata ,$lastedu, $currentedu, $religion);
    }
		 ?>
    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>

</body>
</html>
