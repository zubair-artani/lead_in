<?php 
  function addAdmissionForm($role, $registrationData, $faculty, $department, $class,$batch_code, $getClassArrData, $getDepartmentArrData, $getDaysArrData, $getTeacherArrData){
?>    
          <div class="box box-info">
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/admission/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="a_student_currentdate" class="col-sm-2 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left onlydate" autocomplete="off" readonly="" required=""  name="a_student_currentdate" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : 'id="currentdate"';
                       ?>>
                       <script> 
                        var x = document.getElementsByClassName('onlydate')[0];
                        var d = new Date();
                        var month = d.getMonth() + 1;
                        if(month > 12){
                          month = "0" + 1;
                        }
                        var date = d.getDate();
                          if(month < 10){
                            month = "0" + month;
                          }
                          if(date < 10){
                            date = "0" + date;
                          }
                          if(x.getAttribute('id') == 'currentdate'){
                            document.getElementById("currentdate").value = month + "/" + date + "/" + d.getFullYear();
                          } else {
                            document.getElementById("datepicker").value = month + "/" + date + "/" + d.getFullYear();
                          }
                       </script>
                    </div>
                    <!-- /.input group -->
                  </div>

                    <div class="form-group">
                      <label for="r_student_gender" class="col-sm-2 control-label">Batch:</label>
                      <div class="col-sm-10">
                        <select name="a_student_batch_code" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required="">
                          <option value="">Select Batch</option>
                          <?php   
                              foreach($batch_code as $key => $value){
                                if( !empty($getClassArrData[$key]) && !empty($getDepartmentArrData[$key]) && !empty($getDaysArrData[$key]) && !empty($getTeacherArrData[$key])){
                            ?>
                    <option value="<?php echo $batch_code[$key]->batch_code; ?>"><?php echo $batch_code[$key]->batch_code; ?></option>
                          <?php                            
                              }
                            }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_gender" class="col-sm-2 control-label">Registered:</label>
                      <div class="col-sm-10">
                        <select name="a_student_registration_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required="">
                          <option value="">Select Registration</option>
                          <?php   
                              foreach($registrationData as $rData){
                            ?>
                    <option value="<?php echo $rData->r_student_id; ?>"><?php echo $rData->r_student_id . ': ' . $rData->r_student_name  . ' ' . $rData->r_student_fathername ?></option>
                          <?php                            
                              }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  

                  <div class="form-group">
                      <label for="a_student_faculty" class="col-sm-2 control-label">Faculty:</label>
                      <div class="col-sm-10">
                        <select name="a_student_faculty" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="a_student_faculty" required="">
                          <option value="">Select Faculty</option>
                          <?php
                            if(!empty($faculty)){   
                              foreach($faculty as $faculty){
                            ?>
                    <option value="<?php echo $faculty->faculty_id; ?>"><?php echo $faculty->faculty_id . ': ' . $faculty->faculty_name ?></option>
                          <?php                            
                              }
                            }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                      <label for="a_student_department" class="col-sm-2 control-label">department:</label>
                      <div class="col-sm-10">
                        <select name="a_student_department" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="a_student_department" required="">
                          <option value="">Select department</option>
                          <?php   
                              foreach($department as $department){
                            ?>
                    <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_id . ': ' . $department->department_name ?></option>
                          <?php                            
                              }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                      <label for="a_student_class" class="col-sm-2 control-label">class:</label>
                      <div class="col-sm-10">
                        <select name="a_student_class" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="a_student_class" required="">
                          <option value="">Select class</option>
                          <?php   
                              foreach($class as $class){
                            ?>
                    <option value="<?php echo $class->class_id; ?>"><?php echo $class->class_id . ': ' . $class->class_name ?></option>
                          <?php                            
                              }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group is-empty">
                      <label for="a_student_adm_fees" class="col-sm-2 control-label">Admission Fees:</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="a_student_adm_fees" id="r_student_name" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group is-empty">
                      <label for="a_student_monthly_fees" class="col-sm-2 control-label">Monthly Fees:</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="a_student_monthly_fees" id="r_student_name" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <!-- <div class="form-group">
                      <label for="a_student_feestatus" class="col-sm-2 control-label">Fee Status:</label>
                      <div class="col-sm-10">
                        <select name="a_student_feestatus" class="form-control select2 select2-hidden-accessible" style="width: 100%;" onchange="checkFeeStatus(this)" required="">
                          <option value="">Select Fee Status</option>
                          <option value="1">Full Payment</option>
                          <option value="0">Monthly Payment</option>
                        </select>
                      </div>
                  </div>
 -->
                  <!-- <div class="form-group" id="duedate" style="display: none;"> -->
                      <!-- <label for="a_student_duedate" class="col-sm-2 control-label">Enter Fee Due Date:</label> --><!-- 
                      <div class="input-group date col-sm-10">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar icon1"></i>
                        </div>
 -->
                        <input type="hidden" class="form-control pull-right pad-left a_student_duedate" autocomplete="off" readonly="" name="a_student_duedate" id="datepicker2">
                        <script> 
                          var d = new Date();
                          var month = d.getMonth() + 2;
                          if(month > 12){
                            month = "0" + 1;
                          }
                          var date = d.getDate();
                          if(month < 10){
                            month = "0" + month;
                          }
                          if(date < 10){
                            date = "0" + date;
                          }
                          document.getElementById("datepicker2").value = month + "/" + date + "/" + d.getFullYear();
                       </script>
                    <!-- </div> -->
                  <!-- </div> -->
              </div><!-- col-12 -->
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/admission/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button onclick="document.getElementsByTagName('body')[0].removeAttribute('onbeforeunload')" class="btn bg-black pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }

  function showAdmission($stdata,$data,$search_data){
    // echo "<pre>";
    // print_r($stdata);
    // echo "</pre>";
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="col-xs-4">
                <h3 class="box-title">
                  <a href="<?php echo base_url('Welcome/admission/add') ?>" class="btn bg-black btn-flat">New Admission</a> 
                  <a href="<?php echo base_url('Welcome/admission/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash <i class="fa fa-trash"></i></a>
                  <?php 
                    if(!empty($data)){
                  ?>
                      <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date </i></button>
                  <?php
                    }
                  ?>
                </h3>
                </div>
                <?php echo form_open_multipart('Welcome/searchByDate/admission', ['class'=>'form-horizontal']); ?>
                <div class="col-xs-3">
                 <div class="form-group searchmyDiv" style="display: none;">
                    <label for="startdate" class="col-sm-2 control-label">From:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" name="from_date"  class="form-control pull-right pad-left" autocomplete="off" id="datepicker" required="" value="<?php echo date('m/d/Y'); ?>">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-xs-3">
                  <div class="form-group searchmyDiv"  style="display: none;">
                    <label for="startdate" class="col-sm-2 control-label">To:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" name="todate" class="form-control pull-right pad-left" autocomplete="off" id="datepicker2" required="" value="<?php echo date('m/d/Y'); ?>" >
                      <input type="submit" class="btn bg-green btn-flat margin" value="Search">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                </form>
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
                      <th>Admission Date</th>
                      <th>Name</th>
                      <th>Mobile NO</th>
                      <th>Father NO</th>
                      <th>Whatsapp NO</th>
                      <th>Image</th>
                      <th>Profile</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if($search_data == '0'){
                    ?>
                  <tbody>
                  <?php 
                  if(!empty($data)){
                    for($i=0;$i < sizeof($data);$i++) {
                      $id =$stdata[$i]->a_student_id; 
                      ?>
                      <tr id="d-<?php echo $id; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $stdata[$i]->a_student_currentdate; ?></td>
                        <td><?php echo $data[$i][0]->r_student_name; ?></td>
                        <td><?php echo $data[$i][0]->r_student_mobileno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_fatherno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_whatsappno; ?></td>
                        <td><img src="<?php echo $data[$i][0]->r_student_image; ?>" width='50' height='50'></td>
                        <td><a href="<?php echo base_url("Welcome/viewAdmissionProfile/$id") ?>" class="btn btn-flat bg-green">View Profile</a></td>
                        <td><a href="<?php echo base_url('Welcome/admission/') .$id ?>" class="btn btn-flat bg-blue">Edit</a></td>
                        <td><a onclick="deleteAdmission(<?php echo $id; ?>)" class="btn btn-flat bg-red">Delete</a></td>
                      </tr>
                      <?php 
                    }
                    }
                   ?>
                </tbody>
                <?php }else { ?>
                  <tbody>
                  <?php
                  if(!empty($search_data)){ 
                    for($i=0;$i < sizeof($search_data);$i++) {
                      $id =$search_data[$i]->a_student_id; 
                      ?>
                      <tr id="d-<?php echo $id; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $search_data[$i]->a_student_currentdate; ?></td>
                        <td><?php echo $data[$i][0]->r_student_name; ?></td>
                        <td><?php echo $data[$i][0]->r_student_mobileno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_fatherno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_whatsappno; ?></td>
                        <td><img src="<?php echo $data[$i][0]->r_student_image; ?>" width='50' height='50'></td>
                        <td><a href="<?php echo base_url("Welcome/viewAdmissionProfile/$id") ?>" class="btn btn-flat bg-green">View Profile</a></td>
                        <td><a href="<?php echo base_url('Welcome/admission/') .$id ?>" class="btn btn-flat bg-blue">Edit</a></td>
                        <td><a onclick="deleteAdmission(<?php echo $id; ?>)" class="btn btn-flat bg-red">Delete</a></td>
                      </tr>
                      <?php 
                    }
                    }
                   ?>
                </tbody>
                <?php } ?>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
    </div>
  </div>
<?php
  }

  function showAdmissionProfile($details,$data, $lastedu, $currentedu, $religion){
?>
      <div class="row">
        <div class="col-md-12">
          
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile text-left">
              <img class="profile-user-img img-responsive img-circle" style="width:200px; height:200px;" src="<?php echo $details[0]->r_student_image ?>" alt="User profile picture">

            </div>
            <!-- /.box-body -->
            <div class="box-header with-border text-center">
              <h3 class="box-title" style="text-transform: uppercase;"><?php echo $details[0]->r_student_name . ' ' . $details[0]->r_student_fathername ?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-6">
                <strong><i class="fa fa-book margin-r-5"></i>Phone Numbers</strong>

                <p class="text-muted" style="line-height: 40px;">
                  <strong>Contact No: </strong> <?php echo $details[0]->r_student_mobileno; ?> <br>
                  <strong>Whatsapp No: </strong> <?php echo $details[0]->r_student_whatsappno; ?> <br>
                  <strong>Father No: </strong> <?php echo $details[0]->r_student_fatherno; ?> <br>
                  <strong>Emergency No: </strong> <?php echo $details[0]->r_student_emergencyno; ?><br>
                </p>

                <hr>
                
                <strong><i class="fa fa-circle-o margin-r-5"></i> Other Details</strong>

                <p class="text-muted" style="line-height: 40px;">
                  <strong>Date Of Birth: </strong> <?php echo $details[0]->r_student_dob; ?> <br>
                  <strong>Marital Status: </strong> <?php echo $details[0]->r_student_maritalstat; ?> <br>
                  <strong>Gender: </strong> <?php echo $details[0]->r_student_gender; ?> <br>
                </p>

              </div><!-- col-md-6 -->
              <div class="col-md-6">
                <strong><i class="fa fa-book margin-r-5"></i>Education</strong>

                <p class="text-muted" style="line-height: 40px;">
                  <strong>Current Education: </strong> <?php echo $currentedu[0]->education_name; ?> <br>
                  <strong>Last Education: </strong> <?php echo $lastedu[0]->education_name; ?> <br>
                </p>

                <hr>
                                
                <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                <p class="text-muted" style="overflow-wrap: break-word; "><?php echo $details[0]->r_student_address; ?></p>

                <hr>


                <strong>&nbsp;</strong>

                <p class="text-muted" style="line-height: 40px;">
                  <strong>Cnic: </strong> <?php echo $details[0]->r_student_cnic; ?> <br>
                  <strong>Religion: </strong> <?php echo $religion[0]->religion_name; ?> <br>
                  <strong>Nationality: </strong> <?php echo $details[0]->r_student_nationality; ?> <br>
                </p>

              </div><!-- col-md-6 -->
            </div>

            <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/registration/view'); ?>" class="btn bg-red pull-right"><i class="fa fa-arrow-left"></i> &nbsp;Go Back</a>
              </div>
              <!-- /.box-footer -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

<?php
  }
   function viewTrashAdmission($stdata,$data){
    // echo "<pre>";
    // print_r($data);
?>
<br>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/admission/view') ?>" class="btn bg-red btn-flat">View All Admission</a>
                </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Admission Date</th>
                      <th>Name</th>
                      <th>Mobile NO</th>
                      <th>Father NO</th>
                      <th>Whatsapp NO</th>
                      <th>Image</th>
                      <th>Restore</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    for($i=0;$i < sizeof($data);$i++) {
                      $id =$stdata[$i]->a_student_id;   
                      ?>
                      <tr id="d-<?php echo $id; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $stdata[$i]->a_student_currentdate; ?></td>
                        <td><?php echo $data[$i]->r_student_name; ?></td>
                        <td><?php echo $data[$i]->r_student_mobileno; ?></td>
                        <td><?php echo $data[$i]->r_student_fatherno; ?></td>
                        <td><?php echo $data[$i]->r_student_whatsappno; ?></td>
                        <td><img src="<?php echo $data[$i]->r_student_image; ?>" width='50' height='50'></td>
                        <td><a  class="btn btn-flat bg-green" onclick="restoreAdmission(<?php echo $id; ?>)">restore</a></td>
                        <td><a onclick="removeAdmission(<?php echo $id; ?>)" class="btn btn-flat bg-red">Delete</a></td>
                      </tr>
                      <?php 
                    }
                   ?>
                  
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
  function EditAdmission($role, $registrationData, $faculty, $department, $class){
?>   
<br>
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/admission/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="a_student_currentdate" class="col-sm-2 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
<?php 
                        $timestart  = date("m/d/Y", strtotime($registrationData[0]->a_student_currentdate));
                       ?>
 
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo $timestart; ?>" required=""  name="a_student_currentdate" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker2"' : 'id="currentdate"';
                       ?>>
                       <!-- <script> 
                        var d = new Date();
                        var month = d.getMonth() + 1;
                        if(month > 12){
                          month = "0" + 1;
                        }
                        var date = d.getDate();
                        if(month < 10){
                          month = "0" + month;
                        }
                        if(date < 10){
                          date = "0" + date;
                        }
                        document.getElementById("currentdate").value = month + "/" + date + "/" + d.getFullYear();
                       </script> -->
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="a_student_faculty" class="col-sm-2 control-label">Faculty:</label>
                      <div class="col-sm-10">
                        <select name="a_student_faculty" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="a_student_faculty" required="">
                          <option value="">Select Faculty</option>
                          <?php   
                              foreach($faculty as $faculty){
                            ?>
                    <option value="<?php echo $faculty->faculty_id; ?>" <?php if($faculty->faculty_id ==
                      $registrationData[0]->a_student_faculty ){echo 'selected';} ?>><?php echo $faculty->faculty_id . ': ' . $faculty->faculty_name ?></option>
                          <?php                            
                              }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                      <label for="a_student_department" class="col-sm-2 control-label">department:</label>
                      <div class="col-sm-10">
                        <select name="a_student_department" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="a_student_department" required="">
                          <option value="">Select department</option>
                          <?php   
                              foreach($department as $department){
                            ?>
                    <option value="<?php echo $department->department_id; ?>" <?php if($department->department_id ==
                      $registrationData[0]->a_student_department){echo 'selected';} ?>><?php echo $department->department_id . ': ' . $department->department_name ?></option>
                          <?php                            
                              }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                      <label for="a_student_class" class="col-sm-2 control-label">class:</label>
                      <div class="col-sm-10">
                        <select name="a_student_class" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="a_student_class" required="">
                          <option value="">Select class</option>
                          <?php   
                              foreach($class as $class){
                            ?>
                    <option value="<?php echo $class->class_id; ?>" <?php if($class->class_id == 
                      $registrationData[0]->a_student_class){ echo 'selected';} ?>><?php echo $class->class_id . ': ' . $class->class_name ?></option>
                          <?php                            
                              }
                           ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group is-empty">
                      <label for="a_student_adm_fees" class="col-sm-2 control-label">Admission Fees:</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" value="<?php echo $registrationData[0]->a_student_adm_fees  ?>" name="a_student_adm_fees" id="r_student_name" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <div class="form-group is-empty">
                      <label for="a_student_monthly_fees" class="col-sm-2 control-label">Monthly Fees:</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" value="<?php echo $registrationData[0]->a_student_monthly_fees;  ?>" name="a_student_monthly_fees" id="r_student_name" required="">
                        <input type="hidden" value="<?php echo $registrationData[0]->a_student_id;  ?>" name="a_student_id">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>

                  <!-- <div class="form-group">
                      <label for="a_student_feestatus" class="col-sm-2 control-label">Fee Status:</label>
                      <div class="col-sm-10">
                        <select name="a_student_feestatus" class="form-control select2 select2-hidden-accessible" style="width: 100%;" onchange="checkFeeStatus(this)" required="">
                          <option value="">Select Fee Status</option>
                          <option <?php if($registrationData[0]->a_student_feestatus == '1'){echo 'selected';} ?>value="1">Full Payment</option>
                          <option <?php if($registrationData[0]->a_student_feestatus == '0'){echo 'selected';} ?> value="0">Monthly Payment</option>
                        </select>
                      </div>
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="a_student_currentdate" class="col-sm-2 control-label">Due Date:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div> -->
<?php 
                        $duedate  = date("m/d/Y", strtotime($registrationData[0]->a_student_duedate));
                       ?>
 
                      <input type="hidden" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo $duedate; ?>" required=""  name="a_student_duedate" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker3"' : 'id="duedate"';
                       ?>>
                     
                    <!-- </div> -->
                    <!-- /.input group -->
                  <!-- </div> -->
              </div><!-- col-12 -->
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/admission/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button onclick="document.getElementsByTagName('body')[0].removeAttribute('onbeforeunload')" class="btn bg-black pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
?>

<?php     
  function viewStudent($stdata,$data,$search_data){
    // print_r($stdata);
?>
  <br>  <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="col-xs-4">
                <h3 class="box-title">
                  <a href="<?php echo base_url('Welcome/admission/add') ?>" class="btn bg-black btn-flat">New Admission</a> 
                  <a href="<?php echo base_url('Welcome/admission/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash <i class="fa fa-trash"></i></a>
                  <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date </i></button>
                </h3>
                </div>
                <?php echo form_open_multipart('Welcome/searchByDate/admission', ['class'=>'form-horizontal']); ?>
                <div class="col-xs-3">
                 <div class="form-group searchmyDiv" style="display: none;">
                    <label for="startdate" class="col-sm-2 control-label">From:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" name="from_date"  class="form-control pull-right pad-left" autocomplete="off" id="datepicker" required="" value="<?php echo date('m/d/Y'); ?>">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-xs-3">
                  <div class="form-group searchmyDiv"  style="display: none;">
                    <label for="startdate" class="col-sm-2 control-label">To:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" name="todate" class="form-control pull-right pad-left" autocomplete="off" id="datepicker2" required="" value="<?php echo date('m/d/Y'); ?>" >
                      <input type="submit" class="btn bg-green btn-flat margin" value="Search">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                </form>
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
                      <th>Admission Date</th>
                      <th>Name</th>
                      <th>Mobile NO</th>
                      <th>Father NO</th>
                      <th>Whatsapp NO</th>
                      <th>Image</th>
                      <th>Profile</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if($search_data == '0'){
                    ?>
                  <tbody>
                  <?php 
                  if($data != 0 && $stdata != 0){
                    for($i=0;$i < sizeof($data);$i++) {
                      $id =$stdata[$i]->a_student_id; 
                      ?>
                      <tr id="d-<?php echo $id; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $stdata[$i]->a_student_currentdate; ?></td>
                        <td><?php echo $data[$i][0]->r_student_name; ?></td>
                        <td><?php echo $data[$i][0]->r_student_mobileno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_fatherno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_whatsappno; ?></td>
                        <td><img src="<?php echo $data[$i][0]->r_student_image; ?>" width='50' height='50'></td>
                        <td><a href="<?php echo base_url("Welcome/viewAdmissionProfile/$id") ?>" class="btn btn-flat bg-green">View Profile</a></td>
                        <td><a href="<?php echo base_url('Welcome/admission/') .$id ?>" class="btn btn-flat bg-blue">Edit</a></td>
                        <td><a onclick="deleteAdmission(<?php echo $id; ?>)" class="btn btn-flat bg-red">Delete</a></td>
                      </tr>
                      <?php 
                    }
                    }
                   ?>
                </tbody>
                <?php }else { ?>
                  <tbody>
                  <?php 
                    for($i=0;$i < sizeof($search_data);$i++) {
                      $id =$search_data[$i]->a_student_id; 
                      ?>
                      <tr id="d-<?php echo $id; ?>">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $search_data[$i]->a_student_currentdate; ?></td>
                        <td><?php echo $data[$i][0]->r_student_name; ?></td>
                        <td><?php echo $data[$i][0]->r_student_mobileno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_fatherno; ?></td>
                        <td><?php echo $data[$i][0]->r_student_whatsappno; ?></td>
                        <td><img src="<?php echo $data[$i][0]->r_student_image; ?>" width='50' height='50'></td>
                        <td><a href="<?php echo base_url("Welcome/viewAdmissionProfile/$id") ?>" class="btn btn-flat bg-green">View Profile</a></td>
                        <td><a href="<?php echo base_url('Welcome/admission/') .$id ?>" class="btn btn-flat bg-blue">Edit</a></td>
                        <td><a onclick="deleteAdmission(<?php echo $id; ?>)" class="btn btn-flat bg-red">Delete</a></td>
                      </tr>
                      <?php 
                    }
                   ?>
                </tbody>
                <?php } ?>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
    </div>
  </div>
<?php
 }
?>