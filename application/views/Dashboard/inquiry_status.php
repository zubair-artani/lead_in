<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Batch Days
        <?php } elseif($page_status == 'viewTrash'){ ?>
           View Trashes
         <?php } elseif($page_status == 'edit'){ ?>
           Edit Batch Days
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Batch Days</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
           showInquiry($page_status,$page_data);
      } else if($page_status == 'viewTrash') {
          viewTrashInquiry($page_status,$page_data);
      } else if($page_status == 'edit'){
        editInuiry($page_status,$query);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function delinquiry(param1){
    if(confirm('Are you sure you want to delete this Inquiry Status?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/inquiry_status/delete",
        type: 'GET',
        data: { userid: param1} ,
         success: function(result){
            if(result == "ok"){
              $('#d-'+ param1).hide('slow');
            }
         }
      });
    }
  }

  function restoreinquiry(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/inquiry_status/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function removeinquiry(param1){
    if(confirm('Are you sure you want to delete this Inquiry Status Permanently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/inquiry_status/remove",
        type: 'GET',
        data: { userid: param1} ,
         success: function(result){
            if(result == "ok"){
              $('#d-'+ param1).hide('slow');
            }
         }
      });
    }
  }
</script>
</body>
</html>