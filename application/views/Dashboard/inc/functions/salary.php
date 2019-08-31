<?php 
function showsalary($data, $class){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">

              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/salary/add') ?>" class="btn bg-black btn-flat">Add New Salary</a> <a href="<?php echo base_url('Welcome/salary/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash <i class="fa fa-trash"></i></a></h3>

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
                    <th></th>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Faculty</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                   foreach($class as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($class[$key]->salary_date));
                  ?>

                  <tr id="d-<?php echo $class[$key]->salary_id ?>">
                    <td></td>
                    
                    <td><?php echo $class[$key]->salary_id; ?></td>
                    <td><?php echo $class[$key]->salary_date; ?></td>
                    <td><?php echo $class[$key]->salary_faculty; ?></td>
                    <td><?php echo $class[$key]->salary_amount; ?></td>
                    <td><?php echo $class[$key]->salary_total; ?></td>
                    <td><a class="btn bg-blue btn-flat" href="<?php echo base_url('Welcome/salary/'). $class[$key]->salary_id; ?>">Edit</a></td>
                    <td><a onclick="deleteSalary(<?php echo $class[$key]->salary_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function addsalary($page_status,$faculty,$role){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/salary/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>

                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo date('d/m/Y') ?>" required=""  name="salary_date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Amount:</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control bg-grey"  name="salary_amount" id="salary_amount" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->

                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Total:</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control bg-grey"  name="salary_total" id="salary_total" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Faculty:</label>
                      <div class="col-sm-9">
                        <select name="salary_faculty" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="" required="">
                          <option value="">Select Faculty</option>
                          <?php 
                            foreach($faculty as $faculty){ ?>
                              <option value="<?php echo $faculty->faculty_id; ?>"><?php echo $faculty->faculty_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Per Lecture:</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control bg-grey" onclick="quantity(this)" onkeyup="quantity(this)" name="per_lecture" id="per_lecture" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                  
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/salary/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  ?>

  <?php 
function viewTrashtarget($data, $class){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">

              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/salary/view') ?>" class="btn bg-red btn-flat">View All Salary</a> </h3>

                <!-- <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Faculty</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Restore</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   foreach($class as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($class[$key]->salary_date));
                  ?>

                  <tr id="d-<?php echo $class[$key]->salary_id ?>">
                    <td><?php echo $class[$key]->salary_id; ?></td>
                    <td><?php echo $class[$key]->salary_date; ?></td>
                    <td><?php echo $class[$key]->salary_faculty; ?></td>
                    <td><?php echo $class[$key]->salary_amount; ?></td>
                    <td><?php echo $class[$key]->salary_amount; ?></td>
                    <td><a class="btn bg-green btn-flat" onclick="restoresalary(<?php echo $class[$key]->salary_id ?>)">Restore</a></td>
                    <td><a onclick="permanentlydelsalary(<?php echo $class[$key]->salary_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function editsalary($page_status,$id,$role,$get_faculty,$query){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/salary/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
<?php 
                      $timestart  = date("m/d/Y", strtotime($query[0]->salary_date));
 ?>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo $timestart; ?>" required=""  name="salary_date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Amount:</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $query[0]->salary_amount; ?>"  class="form-control bg-grey"  name="salary_amount" id="salary_amount" required="">
                        
                        <input type="hidden" value="<?php echo $id ?>" name="salary_id">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->

                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Total:</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $query[0]->salary_total; ?>" class="form-control bg-grey"  name="salary_total" id="salary_total" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Faculty:</label>
                      <div class="col-sm-9">
                        <select name="salary_faculty" required="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Expense Type</option>
                          <?php 
                            foreach($get_faculty as $get_faculty){ ?>
        <option value="<?php echo $get_faculty->faculty_id; ?>" <?php if($query[0]->salary_faculty == $get_faculty->faculty_id){ echo "selected"; } ?>><?php echo $get_faculty->faculty_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Per Lecture:</label>
                      <div class="col-sm-9">
                        
                        <input type="text" value="<?php echo $query[0]->per_lecture; ?>" class="form-control bg-grey" onclick="quantity(this)" onkeyup="quantity(this)" name="per_lecture" id="per_lecture" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                  
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/salary/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  ?>