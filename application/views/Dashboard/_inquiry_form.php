<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Inquiries
        <?php } else if($page_status == 'add') { ?>
           Create New Inquiry
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create New Inquiry</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'view'){
        showInquiryForm($data, $class);
      } else if($page_status == 'viewTrash'){
        viewTrashBatchCode($page_status,$page_data);
        // echo "<pre>";
        // print_r($data);
      } else if($page_status == 'add') {
        addInquiryForm($class, $department, $faculty,$inquiry_status,$source);
      }
      ?>
    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  // function deleteBatch(param1){
  //   if(confirm('Are you sure you want to delete this Batch Code?')){
  //     $.ajax({
  //       url: "http://[::1]/lead_in/index.php/Welcome/batchCode/delete",
  //       type: 'GET',
  //       data: { batchid: param1} ,
  //        success: function(result){
  //           if(result == "ok"){
  //             $('#d-'+ param1).hide('slow');
  //           }
  //        }
  //     });
  //   }
  // }
  // function restoreBatch(param1){
  //   $.ajax({
  //     url: "http://[::1]/lead_in/index.php/Welcome/batchCode/restore",
  //     type: 'GET',
  //     data: { batchid: param1} ,
  //      success: function(result){
  //         if(result == "ok"){
  //           $('#d-'+ param1).hide('slow');
  //         }
  //      }
  //   });
  // }
  // function removeBatch(param1){
  //   if(confirm('Are you sure you want to delete this Batch Code Parmenently?')){
  //     $.ajax({
  //       url: "http://[::1]/lead_in/index.php/Welcome/batchCode/remove",
  //       type: 'GET',
  //       data: { batchid: param1} ,
  //        success: function(result){
  //           if(result == "ok"){
  //             $('#d-'+ param1).hide('slow');
  //           }
  //        }
  //     });
  //   }
  // }
</script>
</body>
</html>