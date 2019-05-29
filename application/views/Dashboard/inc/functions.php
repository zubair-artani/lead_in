<?php 
  include('functions/class.php');
  include('functions/department.php');
  include('functions/faculty.php');
  include('functions/batchdays.php');
  include('functions/source.php');
  include('functions/inquiry_status.php');
  include('functions/religion.php');
  include('functions/education_function.php');

 ?>

<?php 
	function showtask(){
?>
	<div class="row">
      <div class="col-xs-12">
			<div class="box clearfix">
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
              <div class="col-xs-12">
              <ul class="timeline">

    <!-- timeline time label -->
			    <li class="time-label">
			        <span class="bg-red">
			            10 Feb. 2014
			        </span>
			    </li>
			    <!-- /.timeline-label -->

			    <!-- timeline item -->
			    <li>
	              <i class="fa fa-envelope bg-blue"></i>

	              <div class="timeline-item">
	                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

	                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

	                <div class="timeline-body">
	                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
	                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
	                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
	                  quora plaxo ideeli hulu weebly balihoo...
	                </div>
	                <div class="timeline-footer">
	                  <a class="btn btn-primary btn-xs">Read more<div class="ripple-container"></div></a>
	                  <a class="btn btn-danger btn-xs">Delete</a>
	                </div>
	              </div>
	            </li>

			    <!-- END timeline item -->

			    ...

			</ul>
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

<?php 
	function addEditor(){
?>
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Editor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/editor', ['class'=>'form-horizontal']); ?>
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
                  <label for="password" class="col-sm-2 control-label">Position</label>

                  <div class="col-sm-10">
                    <input type="text" name="position" class="form-control" id="position" required="" placeholder="Position">
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
                
                <div class="form-group">
                  <label for="timestart" class="col-sm-2 control-label">Start Time:</label>

                  <div class="col-sm-10 bootstrap-timepicker">
                    <input type="text" class="form-control timepicker" value="03:00 PM" name="timestart" id="timestart" required="">

                  </div>
                  <!-- /.input group -->
                <!-- /.form group -->
                </div>
                <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">End Time:</label>

                    <div class="col-sm-10 bootstrap-timepicker">
                      <input type="text" class="form-control timepicker" value="09:00 PM" name="timeend" id="timeend" required="">

                    </div>
                    <!-- /.input group -->
                  <!-- /.form group -->
                </div>

              </div>
              <!-- /.box-body -->
               <div class="box-footer">
                <a href="<?php echo base_url('Welcome/editor/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
<?php
	}

  function showEditor($data){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/editor/add') ?>" class="btn bg-black btn-flat">Add New Editor</a></h3>

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
                    <th>Email</th>
                    <th>Password</th>
                    <th>Activity Status</th>
                    <th>Position</th>
                    <th>Delete</th>
                  </tr>
                  <?php
                    $inc = 0;
                   foreach($data as $data){ 
                      $inc++;
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($data->time_start));
                      $timeend  = date("g:i a", strtotime($data->time_end));
                  ?>

                  <tr id="d-<?php echo $data->user_id ?>">
                    <td><?php echo $inc; ?></td>
                    <td><?php echo $timestart ?></td>
                    <td><?php echo $timeend ?></td>
                    <td><?php echo $data->user_name ?></td>
                    <td><?php echo $data->user_email ?></td>
                    <td><?php echo $data->user_password ?></td>
                    <td><?php 
                        if($data->activity_status == 1){
                    ?>
                          <span class="badge bg-green"><?php echo "Online" ?></span>
                      <?php
                        } else {
                      ?>
                          <span class="badge bg-red"><?php echo "Offline" ?></span>
                      <?php  
                        }
                    ?></td>
                    <td><span class="btn bg-orange btn-flat"><?php echo $data->position ?></span></td>
                    <td><a onclick="deletefunc(<?php echo $data->user_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  }

  function showBatchCode($data, $class){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/batchCode/add') ?>" class="btn bg-black btn-flat">Add New Batch</a> <a href="<?php echo base_url('Welcome/batchCode/viewTrash') ?>" class="btn bg-red btn-flat">Trash</a></h3>

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
                    <th>Batch Code</th>
                    <th>Batch Days</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Teacher</th>
                    <th>Timings</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Batch Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  <?php
                   foreach($data as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($data[$key]->start_time));
                      $timeend  = date("g:i a", strtotime($data[$key]->end_time));
                  ?>

                  <tr id="d-<?php echo $data[$key]->batch_id ?>">
                    <td><?php echo $data[$key]->batch_id; ?></td>
                    <td><?php echo $data[$key]->batch_code; ?></td>
                    <td><?php echo $data[$key]->batch_days; ?></td>
                    <td><?php echo $class[$key]; ?></td>
                    <td><?php echo $data[$key]->department; ?></td>
                    <td><?php echo $data[$key]->teacher; ?></td>
                    <td><?php echo $timestart . ' to ' . $timeend; ?></td>
                    <td><?php echo $data[$key]->start_date; ?></td>
                    <td><?php echo $data[$key]->end_date; ?></td>
                    <td><?php 
                        if($data[$key]->batch_status == 'Open'){
                    ?>
                          <span class="badge bg-green"><?php echo $data[$key]->batch_status ?></span>
                      <?php
                        } else {
                      ?>
                          <span class="badge bg-red"><?php echo $data[$key]->batch_status ?></span>
                      <?php  
                        }
                    ?></td>
                    <td><a class="btn bg-blue btn-flat">Edit</a></td>
                    <td><a onclick="deleteBatch(<?php echo $data[$key]->batch_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  }
?>



<?php 
  function addBatchCode($class, $department, $faculty){
?>    
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Batch</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/batchCode/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-2 control-label">Start Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left" id="datepicker" required="" name="startdate">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="enddate" class="col-sm-2 control-label">End Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left" id="datepicker2" required="" name="enddate">
                    </div>
                    <!-- /.input group -->
                  </div>
                <div class="form-group is-empty">
                  <label for="batchCode" class="col-sm-2 control-label">Batch Code:-</label>

                  <div class="col-sm-10">
                    <input type="text" name="batchCode" class="form-control" id="batchCode" required="" placeholder="Enter Batch Code Here..">
                  </div>
                </div>
                <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" name="class" style="width: 100%;" required="">
                        <option value="">Select Class</option>
                        <?php 

                          foreach($class as $class){
                         ?>
                            <option value="<?php echo $class->class_id; ?>"><?php echo $class->class_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-10 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" required="" name="department" style="width: 100%;" >
                        <option value="">Select Department</option>
                        <?php 

                          foreach($department as $department){
                         ?>
                            <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="timestart" class="col-sm-2 control-label">Start Time:</label>

                    <div class="col-sm-10 bootstrap-timepicker">
                      <input type="text" class="form-control timepicker" value="03:00 PM" name="timestart" id="timestart" required="">

                    </div>
                    <!-- /.input group -->
                  <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="timeend" class="col-sm-2 control-label">End Time:</label>

                      <div class="col-sm-10 bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" value="09:00 PM" name="timeend" id="timeend" required="">

                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">Days</label>
                    <div class="col-sm-10 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="days" required="" >
                        <option value="">Select Class Days</option>
                        <option>MWF</option>
                        <option>TTS</option>
                        <option>Mon to Fri</option>
                        <option>Mon to Sat</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">Faculty</label>
                    <div class="col-sm-10 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" required="" name="faculty" style="width: 100%;" >
                        <option value="">Select Faculty</option>
                        <?php 
                          foreach($faculty as $faculty){
                         ?>
                            <option value="<?php echo $faculty->faculty_id; ?>"><?php echo $faculty->faculty_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
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
  function viewTrashBatchCode($page_status,$page_data){
?>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/batchCode/view') ?>" class="btn bg-red btn-flat">View All Batch Code</a></h3>

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
                    <th>Batch Code</th>
                    <th>Batch Days</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Teacher</th>
                    <th>Timings</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Batch Status</th>
                    <th>Restore</th>
                    <th>Delete</th>
                  </tr>
                  <?php
                  // print_r($data);
                   foreach($page_data as $data){ 
                      // 24-hour time to 12-hour time 
                      // $timestart  = date("g:i a", strtotime($data[$key]->start_time));
                      // $timeend  = date("g:i a", strtotime($data[$key]->end_time));
                  ?>

                  <tr id="d-<?php echo $data->batch_id; ?>">
                    <td><?php echo $data->batch_id; ?></td>
                    <td><?php echo $data->batch_code; ?></td>
                    <td><?php echo $data->batch_days; ?></td>
                    <td><?php echo $data->class; ?></td>
                    <td><?php echo $data->department; ?></td>
                    <td><?php echo $data->teacher; ?></td>
                    <td><?php echo $data->start_time . ' to ' . $data->end_time; ?></td>
                    <td><?php echo $data->start_date; ?></td>
                    <td><?php echo $data->end_date; ?></td>
                    <td><?php 
                        if($data->batch_status == 'Open'){
                    ?>
                          <span class="badge bg-green"><?php echo $data->batch_status ?></span>
                      <?php
                        } else {
                      ?>
                          <span class="badge bg-red"><?php echo $data->batch_status ?></span>
                      <?php  
                        }
                    ?></td>
                    <td><a onclick="restoreBatch(<?php echo $data->batch_id ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td><a onclick="removeBatch(<?php echo $data->batch_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
    </div>
  </div>
<?php } ?>

