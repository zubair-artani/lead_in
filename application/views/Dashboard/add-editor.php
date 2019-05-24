<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor
        <small>Controllers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Editor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'add'){
           addEditor();
      } else if($page_status == 'view'){
          showEditor($data);
      } ?>
    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>

<script>
  function deletefunc(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/editor/delete",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+param1).hide('slow');
          }
       }
    });
  }
</script>
</body>
</html>
