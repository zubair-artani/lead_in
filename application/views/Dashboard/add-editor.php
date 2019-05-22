<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Editor
        <small>Dashboard Controllers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Editor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Editor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/addEditor', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <label for="name" class="col-sm-2 control-label">User Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" required="">
                  </div>
                </div>
                <div class="form-group is-empty">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" required="" placeholder="Email">
                  </div>
                </div>
                <div class="form-group is-empty">
                  <label for="password" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" required="" placeholder="Password">
                  </div>
                </div>
                <div class="form-group is-empty">
                  <label for="role" class="col-sm-2 control-label">User Role</label>

                  <div class="col-sm-10">
                    <input type="email" value="editor" name="role" readonly="" class="form-control" id="role" required="" placeholder="role">
                  </div>
                </div>
                <div class="form-group is-empty">
                  <label for="picture" class="col-sm-2 control-label">Picture</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="userfile" id="picture" required="">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
      <!-- Main row -->
    
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://www.facebook.com/hamariacademy">Hamari Academy</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<?php include('inc/footer.php'); ?>
