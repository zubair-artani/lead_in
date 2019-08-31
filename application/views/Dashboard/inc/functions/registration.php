<?php 
  function addRegistraionForm($religion, $education,$last_edu, $role){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/registration/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="r_student_currentdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>

                      <input type="text" class="form-control pull-right pad-left onlydate" autocomplete="off" required=""  name="r_student_currentdate" <?php 
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
                      <label for="r_student_name" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="r_student_name" id="r_student_name" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                <div class="form-group">
                  <label for="r_student_fathername" class="col-sm-3 control-label">Father Name:</label>

                  <div class="col-sm-9">
                    <input type="text"  class="form-control" required="" name="r_student_fathername">
                  </div>
                </div>
                <div class="form-group">
                      <label for="r_student_mobileno" class="col-sm-3 control-label">Student M.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="r_student_mobileno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_fatherno" class="col-sm-3 control-label">Father M.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="r_student_fatherno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_emergencyno" class="col-sm-3 control-label">Emergency C.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="r_student_emergencyno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_whatsappno" class="col-sm-3 control-label">WhatsApp No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="r_student_whatsappno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="r_student_dob" class="col-sm-3 control-label">Date of Birth:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>

                      <input type="text" class="form-control pull-right pad-left" autocomplete="off"  required=""  name="r_student_dob" id="datepicker2">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_religion" class="col-sm-3 control-label">Religion:</label>
                      <div class="col-sm-9">
                        <select name="r_student_religion" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="r_student_religion">
                          <option value="">Select Religion</option>
                          <?php 
                            foreach($religion as $religion){ ?>
                              <option value="<?php echo $religion->religion_id; ?>"><?php echo $religion->religion_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                
                  
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-sm-12 text-right">
                        <img id="blah" src="http://nrm.co.nz/wp-content/uploads/2017/08/facebook-avatar.jpg" width="150" height="125" alt="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                  <div class="form-group">
                    <label for="r_student_image" class="col-sm-3 control-label">Select Image:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <!-- <input type="file" class="form-control" name="upload_image"  onchange="readURL(this);"> -->
                      <input type="file" name="upload_image" id="upload_image" />
                      <input type="text" name="r_student_image" class="form-control" value="<?php echo base_url('uploads'); ?>" style="display:none;" id="uploaded_image">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="r_student_gender" class="col-sm-3 control-label">Gender:</label>
                      <div class="col-sm-9">
                        <select name="r_student_gender" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="r_student_gender">
                          <option value="">Select Gender</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="r_student_cnic" class="col-sm-3 control-label">Enter CNIC:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" class="form-control" name="r_student_cnic">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="r_student_maritalstat" class="col-sm-3 control-label">Marital Status:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" name="r_student_maritalstat" style="width: 100%;" required="">
                        <option value="">Select Status</option>
                        <option>Single</option>
                        <option>Married</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" for="r_student_nationality" class="col-sm-3 control-label">Nationality:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" class="form-control" name="r_student_nationality" required="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="r_student_currentedu" class="col-sm-3 control-label">Current Education:</label>
                      <div class="col-sm-9">
                        <select name="r_student_currentedu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Current Education</option>
                          <?php 
                            foreach($education as $education){ ?>
                              <option value="<?php echo $education->education_id; ?>"><?php echo $education->education_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_lastedu" class="col-sm-3 control-label">Last Education:</label>
                      <div class="col-sm-9">
                        <select name="r_student_lastedu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Last Education</option>
                          <?php 
                            foreach($last_edu as $educations){ ?>
                              <option value="<?php echo $educations->education_id; ?>"><?php echo $educations->education_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="r_student_address" class="col-sm-1 control-label">Address:</label>
                      <div class="col-sm-11">
                        <!-- <input type="number" class="form-control"  name="" id="" required=""> -->
                        <textarea name="r_student_address" id="r_student_address" class="text-borders" cols="30" rows="10"></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/registration/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button onclick="document.getElementsByTagName('body')[0].removeAttribute('onbeforeunload')" class="btn bg-black pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }

  function showRegistration($data, $currentedu,$search_data){
    // print_r($search_data);
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="col-xs-4">
                <h3 class="box-title">
                  <a href="<?php echo base_url('Welcome/registration/add') ?>" class="btn bg-black btn-flat">New Registration</a> 
                  <a href="<?php echo base_url('Welcome/registration/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash  <i class="fa fa-trash-o"></i></a>
                  <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date </i></button>
                </h3>
              </div>
              <?php echo form_open_multipart('Welcome/searchByDate/registration', ['class'=>'form-horizontal']); ?>
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
                    <th>Registration Date</th>
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
                   foreach($data as $key => $value){
                    $id = $data[$key]->r_student_id; 
                      if(!empty($currentedu[$key])){
                  ?>
                  <tr id="d-<?php echo $id ?>">
                    <td><?php echo $id ?></td>
                    <td><?php echo $data[$key]->r_student_currentdate ?></td>
                    <td><?php echo $data[$key]->r_student_name ?></td>
                    <td><?php echo $data[$key]->r_student_mobileno ?></td>
                    <td><?php echo $data[$key]->r_student_fatherno ?></td>
                    <td><?php echo $data[$key]->r_student_whatsappno ?></td>
                    <td><img src="<?php echo $data[$key]->r_student_image ?>" width="100px" height="100px"></td>
        <td><a class="btn bg-green btn-flat" href="<?php echo base_url("Welcome/viewRegistrationProfile/$id") ?>">View Profile</a></td>
                    <td><a class="btn bg-blue btn-flat" href="<?php echo $id ?>">Edit</a></td>
                    <td><a onclick="deleteregistration(<?php echo $id ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                    <?php
                      } 
                   } ?>
                </tbody>
                <?php }else { ?>
                  <tbody>
                  <?php
                   foreach($search_data as $key => $value){
                    $id = $search_data[$key]->r_student_id; 
                      if(!empty($currentedu[$key])){
                  ?>
                  <tr id="d-<?php echo $id ?>">
                    <td><?php echo $id ?></td>
                    <td><?php echo $search_data[$key]->r_student_currentdate ?></td>
                    <td><?php echo $search_data[$key]->r_student_name ?></td>
                    <td><?php echo $search_data[$key]->r_student_mobileno ?></td>
                    <td><?php echo $search_data[$key]->r_student_fatherno ?></td>
                    <td><?php echo $search_data[$key]->r_student_whatsappno ?></td>
                    <td><img src="<?php echo $search_data[$key]->r_student_image ?>" width="100px" height="100px"></td>
        <td><a class="btn bg-green btn-flat" href="<?php echo base_url("Welcome/viewRegistrationProfile/$id") ?>">View Profile</a></td>
                    <td><a class="btn bg-blue btn-flat" href="<?php echo $id ?>">Edit</a></td>
                    <td><a onclick="deleteregistration(<?php echo $id ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                    <?php
                      } 
                   } ?>
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

  function showRegistrationProfile($details, $lastedu, $currentedu, $religion){
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
  ?>
  <?php 
  function editRegistraion($id,$data,$religion, $education,$last_edu, $role){
    // echo '<pre>';
    // print_r();
    // echo '</pre>';
?>    
        <br>  <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/registration/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="r_student_currentdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
<?php 
                      $timestart  = date("m/d/Y", strtotime($data[0]->r_student_currentdate));
 ?>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" required="" value="<?php echo $timestart; ?>"  name="r_student_currentdate" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker2"' : 'id="currentdate"';
                       ?>>
                       <input type="hidden" name="r_student_id" value="<?php echo $id; ?>">
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
                      <label for="r_student_name" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $data[0]->r_student_name; ?>"  name="r_student_name" id="r_student_name" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                <div class="form-group">
                  <label for="r_student_fathername" class="col-sm-3 control-label">Father Name:</label>

                  <div class="col-sm-9">
                    <input type="text" name="r_student_fathername" class="form-control" required="" value="<?php echo $data[0]->r_student_fathername; ?>" >
                  </div>
                </div>
                <div class="form-group">
                      <label for="r_student_mobileno" class="col-sm-3 control-label">Student M.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?php echo $data[0]->r_student_mobileno; ?>"  name="r_student_mobileno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_fatherno" class="col-sm-3 control-label">Father M.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?php echo $data[0]->r_student_fatherno; ?>" name="r_student_fatherno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_emergencyno" class="col-sm-3 control-label">Emergency C.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="r_student_emergencyno" value="<?php echo $data[0]->r_student_emergencyno; ?>" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_whatsappno" class="col-sm-3 control-label">WhatsApp No:</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?php echo $data[0]->r_student_whatsappno; ?>" class="form-control"  name="r_student_whatsappno" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="r_student_dob" class="col-sm-3 control-label">Date of Birth:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                        
                      </div>
<?php 
                      $dob  = date("m/d/Y", strtotime($data[0]->r_student_dob));
 ?>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off"  required=""  name="r_student_dob" value="<?php echo $dob; ?>" id="datepicker4">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_religion" class="col-sm-3 control-label">Religion:</label>
                      <div class="col-sm-9">
                        <select name="r_student_religion" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="r_student_religion">
                          <option value="">Select Religion</option>
                          <?php 
                            foreach($religion as $religion){ ?>
                              <option value="<?php echo $religion->religion_id; ?>" <?php if($religion->religion_id == $data[0]->r_student_religion){ echo 'selected';} ?>><?php echo $religion->religion_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                
                  
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-sm-12 text-right">
                        <img id="blah" src="<?php echo $data[0]->r_student_image; ?>" width="150" height="125" alt="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                  <div class="form-group">
                    <label for="r_student_image" class="col-sm-3 control-label">Select Image:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <!-- <input type="file" class="form-control" name="upload_image"  onchange="readURL(this);"> -->
                      <input type="file" name="upload_image" id="upload_image" />
                      <input type="text" name="r_student_image" class="form-control" value="<?php echo base_url('uploads'); ?>" style="display:none;" id="uploaded_image">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="r_student_gender" class="col-sm-3 control-label">Gender:</label>
                      <div class="col-sm-9">
                        <select name="r_student_gender" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="r_student_gender">
                          <option value="">Select Gender</option>
                          <option <?php if($data[0]->r_student_gender== 'Male'){echo 'selected';} ?>>Male</option>
                        <option <?php if($data[0]->r_student_gender== 'Female'){echo 'selected';} ?>>Female</option>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="r_student_cnic" class="col-sm-3 control-label">Enter CNIC:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" class="form-control" name="r_student_cnic" value="<?php echo $data[0]->r_student_cnic; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="r_student_maritalstat" class="col-sm-3 control-label">Marital Status:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" name="r_student_maritalstat" style="width: 100%;" required="">
                        <option value="">Select Status</option>
                        <option <?php if($data[0]->r_student_maritalstat== 'Single'){echo 'selected';} ?>>Single</option>
                        <option <?php if($data[0]->r_student_maritalstat== 'Married'){echo 'selected';} ?>>Married</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" for="r_student_nationality" class="col-sm-3 control-label">Nationality:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" class="form-control" name="r_student_nationality" value="<?php echo $data[0]->r_student_nationality; ?>" required="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="r_student_currentedu" class="col-sm-3 control-label">Current Education:</label>
                      <div class="col-sm-9">
                        <select name="r_student_currentedu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Current Education</option>
                          <?php 
                            foreach($education as $education){ ?>
                              <option value="<?php echo $education->education_id; ?>" <?php if($education->education_id == $data[0]->r_student_currentedu){ echo 'selected';} ?>><?php echo $education->education_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="r_student_lastedu" class="col-sm-3 control-label">Last Education:</label>
                      <div class="col-sm-9">
                        <select name="r_student_lastedu" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Last Education</option>
                          <?php 
                            foreach($last_edu as $educations){ ?>
                              <option value="<?php echo $educations->education_id; ?> " <?php if($educations->education_id == $data[0]->r_student_lastedu){ echo 'selected';} ?>><?php echo $educations->education_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="r_student_address" class="col-sm-1 control-label">Address:</label>
                      <div class="col-sm-11">
                        <!-- <input type="number" class="form-control"  name="" id="" required=""> -->
                        <textarea name="r_student_address" id="r_student_address" class="text-borders" cols="30" rows="10"><?php echo $data[0]->r_student_address; ?></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/registration/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button onclick="document.getElementsByTagName('body')[0].removeAttribute('onbeforeunload')" class="btn bg-black pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
?>
<?php 
 function viewTrashRegistration($data, $currentedu){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/registration/view') ?>" class="btn bg-black btn-flat">View All Registration</a></h3>

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
                    <th>Registration Date</th>
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
                   foreach($data as $key => $value){
                    $id = $data[$key]->r_student_id; 
                      if(!empty($currentedu[$key])){

                  ?>
    
                  <tr id="d-<?php echo $id ?>">
                    <td><?php echo $id ?></td>
                    <td><?php echo $data[$key]->r_student_currentdate ?></td>
                    <td><?php echo $data[$key]->r_student_name ?></td>
                    <td><?php echo $data[$key]->r_student_mobileno ?></td>
                    <td><?php echo $data[$key]->r_student_fatherno ?></td>
                    <td><?php echo $data[$key]->r_student_whatsappno ?></td>
                    <td><img src="<?php echo $data[$key]->r_student_image ?>" width="100px" height="100px"></td>
                    <td><a onclick="retoreregistration(<?php echo $id; ?>)" class="btn bg-green btn-flat" >Restore</a></td>
                    <td><a onclick="permanentlydelregistration(<?php echo $id; ?>)" class="btn bg-red btn-flat">delete</a></td>
                  </tr>
                    <?php
                      } 
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