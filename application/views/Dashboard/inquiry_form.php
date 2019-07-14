<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/inquiry_form.php'); ?>  
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
        <br>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquiry</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'view'){
        showInquiryForm($page_status, $data,$search_data);
      } else if($page_status == 'viewTrash'){
        showTrashInquiryForm($page_status,$page_data);
      } else if($page_status == 'add') {
        addInquiryForm($class, $department, $faculty,$inquiry_status,$source);
      } else if($page_status == 'edit') {
        editInquiryForm($id,$query,$class, $department, $faculty,$inquiry_status,$source,$inquiry_remarks);
      }
      ?>
    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function delinquiryform(param1){
    if(confirm('Are you sure you want to delete this Inquiry Form?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/inquiry_form/delete",
        type: 'GET',
        data: { id: param1} ,
         success: function(result){
            if(result == "ok"){
              $('#d-'+ param1).hide('slow');
            }
         }
      });
    }
  }
  function resoreInquiryForm(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/inquiry_form/restore",
      type: 'GET',
      data: { id: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function removeinquiryform(param1){
    if(confirm('Are you sure you want to delete this Inquiry Form Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/inquiry_form/remove",
        type: 'GET',
        data: { id: param1} ,
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