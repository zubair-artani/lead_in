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
        <li class="active">Fee Structure</li>
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
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/feestructure/add') ?>" class="btn bg-navy">Add New Editor</a></h3>

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Time Starts</th>
                    <th>Time End</th>
                    <th>Position</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data as $data){ ?>
                  <tr>
                    <td><?php echo $data->user_id ?></td>
                    <td><?php echo $data->user_name ?></td>
                    <td><?php echo $data->time_start ?></td>
                    <td><?php echo $data->time_end ?></td>
                    <td><span class="label label-warning"><?php echo $data->position ?></span></td>
                    <td><a href="">Delete </a></td>
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
