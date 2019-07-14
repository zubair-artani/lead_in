<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/salary.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
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
        <li class="active">All Salaries</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
           showsalary($page_status,$page_data);
      } else if($page_status == 'viewTrash') {
          viewTrashtarget($page_status,$page_data);
      } else if($page_status == 'edit'){
        $role = $this->session->userdata('role');
        editsalary($page_status,$id,$role,$get_faculty,$query);
      }else if($page_status == 'add') {
        $role = $this->session->userdata('role');
        // print_r($faculty);
        addsalary($page_status,$faculty,$role);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function deleteSalary(param1){
    if(confirm('Are you sure you want to delete this target?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/salary/delete",
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

  function restoresalary(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/salary/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function permanentlydelsalary(param1){
    if(confirm('Are you sure you want to delete this salary Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/salary/permanentdel",
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
  function quantity(a){
        var quantity = a.value;
        document.getElementById('per_lecture').value = quantity;
        var subtotal = document.getElementById('salary_amount').value;
        document.getElementById('salary_total').value = ((quantity * subtotal));
    }
</script>

</body>
</html>