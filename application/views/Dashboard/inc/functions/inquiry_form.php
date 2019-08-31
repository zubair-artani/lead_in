<?php 
  function addInquiryForm($class, $department, $faculty,$inquiry_status,$source){
?>    
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/inquiry_form/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text"  class="form-control pull-right pad-left" autocomplete="off" id="datepicker" required="" value="<?php echo date('m/d/Y'); ?>" name="date">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="student_name" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">Father Name:</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" required="" name="father_name">
                  </div>
                </div>
                <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Admission Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="admission_fee" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Monthly Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="monthly_fee" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Mobile Number:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="mobile_no" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Select Source:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" name="source" style="width: 100%;" required="">
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
                      <select class="form-control select2 select2-hidden-accessible" name="inquiry_status" style="width: 100%;" required="">
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
                        <textarea name="remarks" id="" class="text-borders" cols="30" rows="10"></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-default">Cancel</a>
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
function showInquiryForm($page_status,$page_data,$search_data, $class, $department, $inquiry_status,$source) {

 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <a href="<?php echo base_url('Welcome/inquiry_form/add'); ?>" class="btn bg-black btn-flat margin" >Add New Inquiry Form</a>
                  <a href="<?php echo base_url('Welcome/inquiry_form/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
                  <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date </i></button>
                </div>
                <?php echo form_open_multipart('Welcome/searchByDate/inquiry', ['class'=>'form-horizontal']); ?>
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
                

              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th >ID</th>
                    <th >Stu. Name</th>
                    <th >F. Name</th>
                    <th >Mobile No</th>
                    <th >Admission Fee</th>
                    <th >Monthly Fee</th>
                    <th >Source</th>
                    <th >Class</th>
                    <th >Inquiry_Status</th>
                    <th >Department</th>
                    <th >Edit</th>
                    <th >Delete</th>
                  </tr>
                  </thead>
                  <?php if($search_data == '0'){
                    ?>
                        <tbody>
                          <?php foreach($page_data as $key => $value) { ?>
                            <?php if(!empty($department[$key]) && !empty($class[$key]) && !empty($source[$key]) && !empty($inquiry_status[$key])){ ?>
                          <tr id="d-<?php echo $page_data[$key]->inquiry_id; ?>">
                            <td><?php echo $page_data[$key]->inquiry_id; ?></td>
                            <td><?php echo $page_data[$key]->student_name; ?></td>
                            <td><?php echo $page_data[$key]->father_name; ?></td>
                            <td><?php echo $page_data[$key]->mobile_no; ?></td>
                            <td><?php echo $page_data[$key]->admission_fee; ?></td>
                            <td><?php echo $page_data[$key]->monthly_fee; ?></td>
                            <td><?php echo $source[$key][0]->source_name; ?></td>
                            <td><?php echo $class[$key][0]->class_name; ?></td>
                            <td><span class="btn" style="background-color:<?php echo $inquiry_status[$key][0]->inquiry_color; ?>; color: white;"> <?php echo $inquiry_status[$key][0]->inquiry_name; ?></span></td>
                            <td><?php echo $department[$key][0]->department_name; ?></td>
                            <td><a href="<?php echo base_url('Welcome/inquiry_form/'); echo $page_data[$key]->inquiry_id; ?>" class="btn bg-blue btn-flat">Edit / Call</a></td>
                            <td><a onclick="delinquiryform(<?php echo $page_data[$key]->inquiry_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                          </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                  <?php }else { ?>
                        <tbody>
                          <?php foreach($search_data as $key => $value) { ?>
                            <?php if(!empty($department[$key]) && !empty($class[$key]) && !empty($source[$key]) && !empty($inquiry_status[$key])){ ?>
                          <tr id="d-<?php echo $search_data[$key]->inquiry_id; ?>">
                            <td><?php echo $search_data[$key]->inquiry_id; ?></td>
                            <td><?php echo $search_data[$key]->student_name; ?></td>
                            <td><?php echo $search_data[$key]->father_name; ?></td>
                            <td><?php echo $search_data[$key]->mobile_no; ?></td>
                            <td><?php echo $search_data[$key]->admission_fee; ?></td>
                            <td><?php echo $search_data[$key]->monthly_fee; ?></td>
                            <td><?php echo $source[$key][0]->source_name; ?></td>
                            <td><?php echo $class[$key][0]->class_name; ?></td>
                            <td><?php echo $inquiry_status[$key][0]->inquiry_name; ?></td>
                            <td><?php echo $department[$key][0]->department_name; ?></td>
                            <td><a href="<?php echo base_url('Welcome/inquiry_form/'); echo $search_data[$key]->inquiry_id; ?>" class="btn bg-blue btn-flat">Edit / Call</a></td>
                            <td><a onclick="delinquiryform(<?php echo $search_data[$key]->inquiry_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                          </tr>
                          <?php } ?>
                        <?php } ?>
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

<?php 
function showTrashInquiryForm($page_status,$page_data, $class, $department, $inquiry_status) {
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="box-tools">
                  
                </div>
                <a href="<?php echo base_url('Welcome/inquiry_form/view'); ?>" class="btn bg-red btn-flat margin" >View All Inquiry Form </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th >ID</th>
                    <th >Stu. Name</th>
                    <th >F. Name</th>
                    <th >Mobile No</th>
                    <th >Admission Fee</th>
                    <th >Monthly Fee</th>
                    <th >Class</th>
                    <th >Inquiry_Status</th>
                    <th >Department</th>
                    <th >Restore</th>
                    <th >Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($page_data as $key => $value) { ?>
                  <tr id="d-<?php echo $page_data[$key]->inquiry_id; ?>">
                    <td><?php echo $page_data[$key]->inquiry_id; ?></td>
                    <td><?php echo $page_data[$key]->student_name; ?></td>
                    <td><?php echo $page_data[$key]->father_name; ?></td>
                    <td><?php echo $page_data[$key]->mobile_no; ?></td>
                    <td><?php echo $page_data[$key]->admission_fee; ?></td>
                    <td><?php echo $page_data[$key]->monthly_fee; ?></td>
                    <td><?php echo $class[$key][0]->class_name; ?></td>
                    <td><?php echo $inquiry_status[$key][0]->inquiry_name; ?></td>
                    <td><?php echo $department[$key][0]->department_name; ?></td>
                    <td><a onclick="resoreInquiryForm(<?php echo $page_data[$key]->inquiry_id; ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td><a onclick="removeinquiryform(<?php echo $page_data[$key]->inquiry_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function editInquiryForm($id,$data,$class, $department, $faculty,$inquiry_status,$source,$inquiry_remarks){
?>    
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/inquiry_form/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <?php 
                        $timestart  = date("m/d/Y", strtotime($data[0]->date));
                       ?>
                      <input type="text"  readonly="" class="form-control pull-right pad-left" autocomplete="off"  required=""  value="<?php echo $timestart; ?>" name="date">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Enter Call Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text"  readonly="" class="form-control pull-right pad-left" autocomplete="off" required="" value="<?php echo date('m/d/Y'); ?>" name="call_date">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" readonly="" class="form-control" value="<?php echo $data[0]->student_name; ?>" name="student_name" id="" readonly="" required="">
                      </div>
                  </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">Father Name:</label>
                  <div class="col-sm-9">
                    <input type="text" readonly="" class="form-control" value="<?php echo $data[0]->father_name; ?>" required="" name="father_name">
                    <input type="hidden" value="<?php echo $data[0]->inquiry_id; ?>" name="inquiry_id">
                  </div>
                </div>
                <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Admission Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" readonly="" class="form-control" value="<?php echo $data[0]->admission_fee; ?>" name="admission_fee" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Monthly Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?php echo $data[0]->monthly_fee; ?>" name="monthly_fee"  readonly="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="timeend" class="col-sm-3 control-label">Mobile Number:</label>
                      <div class="col-sm-9">
                        <input type="number"  readonly="" class="form-control" value="<?php echo $data[0]->mobile_no; ?>" name="mobile_no" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Select Source:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select name="source" disabled="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Source</option>
                          <?php 
                            foreach($source as $exp_type){ ?>
                              <option value="<?php echo $exp_type->source_id; ?>" <?php if($data[0]->source == $exp_type->source_id){ echo "selected"; } ?>><?php echo $exp_type->source_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Class:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select name="class"  disabled="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Class</option>
                          <?php 
                            foreach($class as $exp_type){ ?>
                              <option value="<?php echo $exp_type->class_id; ?>" <?php if($data[0]->class == $exp_type->class_id){ echo "selected"; } ?>><?php echo $exp_type->class_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Inquiry Status:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select name="inquiry_status"  disabled="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Source</option>
                          <?php 
                            foreach($inquiry_status as $exp_type){ ?>
                              <option value="<?php echo $exp_type->inquiry_id; ?>" <?php if($data[0]->inquiry_status == $exp_type->inquiry_id){ echo "selected"; } ?>><?php echo $exp_type->inquiry_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Department:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select name="department" disabled="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Department</option>
                          <?php 
                            foreach($department as $exp_type){ ?>
                              <option value="<?php echo $exp_type->department_id; ?>" <?php if($data[0]->department == $exp_type->department_id){ echo "selected"; } ?>><?php echo $exp_type->department_name; ?></option>
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
                        <textarea name="remarks" id="" class="text-borders" cols="30" rows="10"><?php echo $data[0]->remarks; ?></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-default">Cancel</a>
                <button class="btn bg-black pull-right">UPDATE</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
          <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th >ID</th>
                    <th >Date</th>
                    <th >Time</th>
                    <th >Remarks</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=0; foreach($inquiry_remarks as $remarks){ $i++; ?>
                  <tr>
                    <?php 
                      $r_date  = date("m/d/Y", strtotime($remarks->date));
                      $r_time  = date("H:i", strtotime($remarks->time));
                   ?>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $remarks->date; ?></td>
                  <td><?php echo $remarks->time; ?></td>
                  <td><?php echo $remarks->remarks; ?></td>
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