<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Registration
        <?php } else if($page_status == 'add') { ?>
           Add New Register
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Register</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'view'){
        showRegistration($data, $class);
      } else if($page_status == 'viewTrash'){
        viewTrashRegistration($page_status,$page_data);
        // echo "<pre>";
        // print_r($data);
      } else if($page_status == 'add') {
        $role = $this->session->userdata('role');
        addRegistraionForm($religion,$education,$last_edu, $role);
      }
      ?>
    </section>
    <!-- /.content -->
  </div>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script>
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php include('inc/footer.php'); ?>
</body>
</html>