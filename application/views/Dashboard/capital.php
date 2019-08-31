<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/capital.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          View Capital
        <?php } elseif($page_status == 'viewTrash'){ ?>
          View Trashes
         <?php } elseif($page_status == 'edit'){ ?>
          Update Capital
         <?php } elseif($page_status == 'add'){ ?>
          Add Capital
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Capital</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
           showcapital($page_status,$page_data);
      } else if($page_status == 'viewTrash') {
          viewTrashCapital($page_status,$page_data);
      } else if($page_status == 'edit'){
        $role = $this->session->userdata('role');
        editCapital($page_status,$role,$query);
      }else if($page_status == 'add') {
        $role = $this->session->userdata('role');
        addCapital($page_status,$role);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function deletecapital(param1){
    if(confirm('Are you sure you want to delete this Capital?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/capital/delete",
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

  function restorecapital(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/capital/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function permanentlydelcapital(param1){
    if(confirm('Are you sure you want to delete this Capital Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/capital/remove",
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