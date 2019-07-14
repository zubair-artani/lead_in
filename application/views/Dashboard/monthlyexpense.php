<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/Monthlyexpense.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All expense
        <?php } elseif($page_status == 'viewTrash'){ ?>
           View Trashes
         <?php } elseif($page_status == 'edit'){ ?>
           Edit Class
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add expense</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
        $role = $this->session->userdata('role');
           showexpense($page_status, $page_data,$role,$expense, $exp_type,$search_data);
      } else if($page_status == 'viewTrash') {
          viewTrash($page_status, $page_data);
      } else if($page_status == 'edit'){
        $role = $this->session->userdata('role');
        editexpense($page_status,$id,$query,$role,$expense_type);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function delMonthlyExpense(param1){
    if(confirm('Are you sure you want to delete this Expense?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/mexpense/delete",
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
function removeMonthlyExpense(param1){
    if(confirm('Are you sure you want to delete this Expense Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/mexpense/remove",
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

  function restoreMonthlyExpense(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/mexpense/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
</script>
</body>
</html>