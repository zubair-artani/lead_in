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
      ?>
        <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/editor/add') ?>" class="btn bg-navy">Add New Editor</a></h3>

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Time Starts</th>
                    <th>Time End</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Position</th>
                    <th>Delete</th>
                  </tr>
                  <?php
                    $inc = 0;
                   foreach($data as $data){ 
                      $inc++;
                  ?>

                  <tr id="d-<?php echo $data->user_id ?>">
                    <td><?php echo $inc; ?></td>
                    <td><?php echo $data->time_start ?></td>
                    <td><?php echo $data->time_end ?></td>
                    <td><?php echo $data->user_name ?></td>
                    <td><?php echo $data->user_password ?></td>
                    <td><span class="label label-warning"><?php echo $data->position ?></span></td>
                    <td><a onclick="deletefunc(<?php echo $data->user_id ?>)" class="label label-danger">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
    </div>
  </div>
      <?php
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
