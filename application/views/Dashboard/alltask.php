<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Tasks
        <?php } else if($page_status == 'add'){ ?>
          Add New Task
        <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Messages</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'view'){ ?>
        <?php showtask(); ?>
      <?php } else if($page_status == 'add'){ ?>
        <?php addtask(); ?>
      <?php } ?> 
    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
