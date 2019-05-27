<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Faculties
        <?php } elseif($page_status == 'viewTrash'){ ?>
           View Trashes
         <?php } elseif($page_status == 'edit'){ ?>
           Edit Faculty
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Faculty</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
           showFaculty($page_status,$page_data);
      } else if($page_status == 'viewTrash') {
          viewTrashFaculty($page_status,$page_data);
      } else if($page_status == 'edit'){
        editFaculty($page_status,$query);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function delfaculty(param1){
    if(confirm('Are you sure you want to delete this Faculty?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/faculty/delete",
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

  function restorefaculty(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/faculty/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function permanentlydelfaculty(param1){
    if(confirm('Are you sure you want to delete this Faculty Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/faculty/permanentdel",
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