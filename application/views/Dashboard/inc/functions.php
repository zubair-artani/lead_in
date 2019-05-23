<?php 
	function showtask(){
?>
	<div class="row">
      <div class="col-xs-12">
		<div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/alltask/add') ?>" class="btn bg-navy">Add New</a></h3>

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
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Task</th>
                  </tr>
                  
                  <tr>
                    <td>219</td>
                    <td>Thanh Nguyen</td>
                    <td>11-7-2014</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                </tbody>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
		</div>
	</div>
<?php
	}

 ?>

<?php 
 	function addtask(){
?>		
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
                <a href="<?php echo base_url('Welcome/alltask/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php 		
 	}
?>