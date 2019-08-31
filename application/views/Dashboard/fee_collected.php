<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/fee_collected.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view_total_collection'){ ?>
          Total Collection
        <?php } elseif($page_status == 'viewTrash'){ ?>
           View Trashes
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Remaining Fee</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view_total_collection') { 
           // showremaining($page_status,$data,$registrationData,$search_data);
          showtotalcollection($fee_form_all_data);
      } else if($page_status == 'viewTrash') {
          // viewTrashDepartment($page_status,$page_data);
      } else if($page_status == 'edit'){
        editRemaining($page_status,$data);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>

</body>
</html>