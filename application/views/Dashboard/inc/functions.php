<?php 
  include('functions/class.php');
  include('functions/department.php');
  include('functions/faculty.php');
  include('functions/batchdays.php');
  include('functions/source.php');
  include('functions/inquiry_status.php');
  include('functions/religion.php');
  include('functions/education_function.php');
  include('functions/registration.php');
  include('functions/admission.php');
 ?>
<?php 
	function addEditor(){
?>
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Account</h3>
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
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/editor/add') ?>" class="btn bg-black btn-flat">Create an Account</a></h3>

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
                    <th>Time Starts</th>
                    <th>Time End</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Activity Status</th>
                    <th>Position</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
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

  function showBatchCode($data, $class, $department, $days, $teacher){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/batchCode/add') ?>" class="btn bg-black btn-flat">Add New Batch</a> <a href="<?php echo base_url('Welcome/batchCode/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash <i class="fa fa-trash-o"></i></a></h3>

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
                    <th>Batch Code</th>
                    <th>Batch Days</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Teacher</th>
                    <th>Timings</th>
                    <th>From</th>
                    <th>To</th>
                    <th>View Student</th>
                    <th>Batch Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   foreach($data as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($data[$key]->start_time));
                      $timeend  = date("g:i a", strtotime($data[$key]->end_time));
                  if(!empty($department[$key]) && !empty($class[$key]) && !empty($days[$key]) && !empty($teacher[$key])){
                  ?>
    
                  <tr id="d-<?php echo $data[$key]->batch_id ?>">
                    <td><?php echo $data[$key]->batch_id; ?></td>
                    <td><?php echo $data[$key]->batch_code; ?></td>
                    <td><?php echo $days[$key][0]->batch_days; ?></td>
                    <td><?php echo $class[$key][0]->class_name; ?></td>
                    <td><?php echo $department[$key][0]->department_name; ?></td>
                    <td><?php echo $teacher[$key][0]->faculty_name; ?></td>
                    <td><?php echo $timestart . ' to ' . $timeend; ?></td>
                    <td><?php echo $data[$key]->start_date; ?></td>
                    <td><?php echo $data[$key]->end_date; ?></td>
                    <td><a href="<?php echo base_url('Welcome/viewStudent/').$data[$key]->batch_code ?>" class="btn bg-green btn-flat">View</a></td>
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
                    <td><a class="btn bg-blue btn-flat" href="<?php echo $data[$key]->batch_id ?>">Edit</a></td>
                    <td><a onclick="deleteBatch(<?php echo $data[$key]->batch_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                  <?php }
                  } ?>
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
  function editBatch($id,$data,$class,$department,$faculty,$batchdays) {
    ?>
    <br><div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Batch</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/batchCode/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-2 control-label">Start Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <?php 
                        $timestart  = date("m/d/Y", strtotime($data[0]->start_date));
                        $timeend  = date("m/d/Y", strtotime($data[0]->end_date));
                     ?>
                      <input type="text" value="<?php echo $timestart; ?>" class="form-control pull-right pad-left" id="datepicker3" required="" name="startdate">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="enddate" class="col-sm-2 control-label">End Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" value="<?php echo $timeend; ?>" class="form-control pull-right pad-left" id="datepicker4" required="" name="enddate">
                    </div>
                    <!-- /.input group -->
                  </div>
                <div class="form-group is-empty">
                  <label for="batchCode" class="col-sm-2 control-label">Batch Code:-</label>

                  <div class="col-sm-10">
                    <input type="text" name="batchCode" class="form-control" value="<?php echo $data[0]->batch_code; ?>" id="batchCode" required="" placeholder="Enter Batch Code Here..">
                    <input type="hidden" name="batch_id" value="<?php echo $data[0]->batch_id; ?>">
                  </div>
                </div>
                <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible"  name="class" style="width: 100%;" required="">
                        <option value="">Select Class</option>
                        <?php 
                          foreach($class as $class){
                         ?>
                            <option value="<?php echo $class->class_id; ?>" <?php if($class->class_id == $data[0]->class){ echo "selected";} ?>><?php echo $class->class_name; ?></option>
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
                            <option value="<?php echo $department->department_id; ?>" <?php if($department->department_id == $data[0]->department){ echo "selected";} ?>><?php echo $department->department_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="timestart" class="col-sm-2 control-label">Start Time:</label>

                    <div class="col-sm-10 bootstrap-timepicker">
                      <input type="text" class="form-control timepicker" value="<?php echo $data[0]->start_time; ?>" name="time_start" id="timestart" required="">

                    </div>
                    <!-- /.input group -->
                  <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="timeend" class="col-sm-2 control-label">End Time:</label>

                      <div class="col-sm-10 bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" value="09:00 PM" name="time_end" id="timeend" value="<?php echo $data[0]->start_time; ?>" required="">

                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                    <label for="timeend" class="col-sm-2 control-label">Days</label>
                    <div class="col-sm-10 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="days" required="" >
                        <option value="">Select Class Days</option>
                        <?php 
                          foreach($batchdays as $batchdays){
                         ?>
                            <option value="<?php echo $batchdays->batchdays_id; ?>" <?php if($batchdays->batchdays_id == $data[0]->batch_days){ echo "selected";} ?>><?php echo $batchdays->batch_days; ?></option>
                        <?php } ?>
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
                            <option value="<?php echo $faculty->faculty_id; ?>" <?php if($faculty->faculty_id == $data[0]->teacher){ echo "selected";} ?>><?php echo $faculty->faculty_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div> 
                  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/batchcode/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">UPDAte</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
<?php 
  }
 ?>


<?php 
  function addBatchCode($class, $department, $faculty, $days){
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
                        <?php 
                          foreach($days as $days){
                         ?>
                            <option value="<?php echo $days->batchdays_id; ?>"><?php echo $days->batch_days; ?></option>
                        <?php } ?>
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
                <a href="<?php echo base_url('Welcome/batchcode/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  function viewTrashBatchCode($page_status,$page_data, $class, $department, $days, $teacher){
    // print_r($class);
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/batchCode/view') ?>" class="btn bg-maroon btn-flat">View All Batch Code</a></h3>

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
                  </thead>
                  <tbody>
                  <?php
                  // print_r($data);
                   foreach($page_data as $key => $value){ 
                  ?>

                  <tr id="d-<?php echo $page_data[$key]->batch_id; ?>">
                    <td><?php echo $page_data[$key]->batch_id; ?></td>
                    <td><?php echo $page_data[$key]->batch_code; ?></td>
                    <td><?php echo $batch_days[$key][0]->batch_days; ?></td>
                    <td><?php echo $class[$key][0]->class_name; ?></td>
                    <td><?php echo $department[$key][0]->department_name; ?></td>
                    <td><?php echo $page_data[$key]->teacher; ?></td>
                    <td><?php echo $page_data[$key]->start_time . ' to ' . $page_data[$key]->end_time; ?></td>
                    <td><?php echo $page_data[$key]->start_date; ?></td>
                    <td><?php echo $page_data[$key]->end_date; ?></td>
                    <td><?php 
                        if($page_data[$key]->batch_status == 'Open'){
                    ?>
                          <span class="badge bg-green"><?php echo $page_data[$key]->batch_status ?></span>
                      <?php
                        } else {
                      ?>
                          <span class="badge bg-red"><?php echo $page_data[$key]->batch_status ?></span>
                      <?php  
                        }
                    ?></td>
                    <td><a onclick="restoreBatch(<?php echo $page_data[$key]->batch_id ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td><a onclick="removeBatch(<?php echo $page_data[$key]->batch_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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

<?php 
  function addInquiryForm($class, $department, $faculty,$inquiry_status,$source){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/batchCode/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" id="datepicker" required="" name="startdate">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">Father Name:</label>

                  <div class="col-sm-9">
                    <input type="text"  class="form-control" required="" >
                  </div>
                </div>
                <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Admission Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Monthly Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                
                  
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Mobile Number:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Select Source:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible"  style="width: 100%;" required="">
                        <option value="">Select Source</option>
                        <?php 

                          foreach($source as $source){
                         ?>
                            <option value="<?php echo $source->source_id; ?>"><?php echo $source->source_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Class:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
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
                    <label for="timeend" class="col-sm-3 control-label">Inquiry Status:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible"  style="width: 100%;" required="">
                        <option value="">Select Inquiry Status</option>
                        <?php 

                          foreach($inquiry_status as $inquiry_status){
                         ?>
                            <option value="<?php echo $inquiry_status->inquiry_id; ?>"><?php echo $inquiry_status->inquiry_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Department:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
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
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="timeend" class="col-sm-1 control-label">Remarks:</label>
                      <div class="col-sm-11">
                        <!-- <input type="number" class="form-control"  name="" id="" required=""> -->
                        <textarea name="" id="" class="text-borders" cols="30" rows="10"></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
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