<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions/fee_slip.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Registration
        <?php } else if($page_status == 'add') { ?>
           Add New Fee Slip
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Fee Slip</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'view'){
        
      } else if($page_status == 'viewTrash'){
        
      } else if($page_status == 'add') {
        $role = $this->session->userdata('role');
        addFeeSlip($page_status, $role,$feedetail);
      }
      ?>
    </section>
    <!-- /.content -->
  </div>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script>
  $(document).ready(function(){
    $('#student_name').change(function(){
      var sid = $('#student_name').val();
      // alert(sid);
        $.ajax({
          url: "http://[::1]/lead_in/index.php/Welcome/fee_slip/0",
          type: 'GET',
          data: { sid: sid} ,
           success: function(result){
              $('#batch_code').html(result);
              // alert(result);
           }
        });
    });
    $('#batch_code').change(function(){
      var bid = $('#batch_code').val();
      // alert(sid);
        $.ajax({
          url: "http://[::1]/lead_in/index.php/Welcome/fee_slip/batch",
          type: 'GET',
          data: { bid: bid} ,
           success: function(result){
              // $('#batch_code').html(result);
              var split = result.split(',');
              // alert(split);
              document.getElementById('admission_fee').value = split[0];
              document.getElementById('monthly_fee').value = split[1];
              document.getElementById('name').value = split[2];
              document.getElementById('admission_id').value = split[3];
           }
        });
    });
  });

  //   $('#batch_code').change(function(){
  //     var batchid = $('#batch_code').val();
  //     if(batchid != ''){
  //     }
  //   });
  // }); 
  // function sel\ectfeestudent(id) {
  //   if(confirm('Are you sure you want to delete this Batch Days Permanently?')){
  //   }
  // }
</script>
<?php include('inc/footer.php'); ?>
</body>
</html>