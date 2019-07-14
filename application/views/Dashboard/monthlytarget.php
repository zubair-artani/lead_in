<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/monthlytarget.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
         Monthly Targets
          <br>
        <?php } elseif($page_status == 'viewTrash'){ ?>
          <br>

         <?php } elseif($page_status == 'edit'){ ?>
          <br>

         <?php } elseif($page_status == 'add'){ ?>
          <br>
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Monthly Targets</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
           showmonthlytarget($page_status,$page_data);
      } else if($page_status == 'viewTrash') {
          viewTrashtarget($page_status,$page_data);
      } else if($page_status == 'edit'){
        $role = $this->session->userdata('role');
        editMonthlytarget($page_status,$query,$role);
      }else if($page_status == 'add') {
        $role = $this->session->userdata('role');
        addMonthlytarget($page_status,$role);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function deleteMtarget(param1){
    if(confirm('Are you sure you want to delete this target?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/monthlytarget/delete",
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

  function restoremonthlytarget(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/monthlytarget/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function permanentlydelmonthlytarget(param1){
    if(confirm('Are you sure you want to delete this monthlytarget Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/monthlytarget/permanentdel",
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