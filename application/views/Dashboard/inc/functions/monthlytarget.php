<?php 
function showmonthlytarget($data, $class){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">

              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/monthlytarget/add') ?>" class="btn bg-red btn-flat">Add New Target</a> <a href="<?php echo base_url('Welcome/monthlytarget/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash <i class="fa fa-trash"></i></a></h3>

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
                    <th>Date</th>
                    <th>Target No</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   foreach($class as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($class[$key]->m_target_date));
                  ?>

                  <tr id="d-<?php echo $class[$key]->m_target_id ?>">
                    <td><?php echo $class[$key]->m_target_id; ?></td>
                    <td><?php echo $class[$key]->m_target_date; ?></td>
                    <td><?php echo $class[$key]->m_target; ?></td>
                    <td><?php echo $class[$key]->m_status_complete; ?></td>
                    <td><?php echo $class[$key]->m_remarks; ?></td>
                    <td><a class="btn bg-blue btn-flat" href="<?php echo $class[$key]->m_target_id ?>">Edit</a></td>
                    <td><a onclick="deleteMtarget(<?php echo $class[$key]->m_target_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function addMonthlytarget($page_status,$role){
?>    
          <div class="box box-info">
            <?php echo form_open_multipart('Welcome/monthlytarget/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>

                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo date('m/d/Y'); ?>" required=""  name="m_target_date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Target:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="m_target">
                      </div>
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Status:</label>
                      <div class="col-sm-9">
                        <select name="m_status_complete" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Status</option>
                          <option value="Complete">Complete</option>
                          <option value="Not Complete">Not Complete</option>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Remarks:</label>
                      <div class="col-sm-11">
                        <!-- <input type="number" class="form-control"  name="" id="" required=""> -->
                        <textarea name="m_remarks" id="" class="text-borders" cols="30" rows="10"></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/monthlytarget/view'); ?>" class="btn btn-default">Cancel</a>
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
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/monthlytarget/view') ?>" class="btn bg-red btn-flat">All Monthly Targets</a> </h3>

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
                    <th>Target No</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Restore</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   foreach($class as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($class[$key]->m_target_date));
                  ?>

                  <tr id="d-<?php echo $class[$key]->m_target_id ?>">
                    <td></td>
                    <td><?php echo $class[$key]->m_target_id; ?></td>
                    <td><?php echo $class[$key]->m_target_date; ?></td>
                    <td><?php echo $class[$key]->m_target; ?></td>
                    <td><?php echo $class[$key]->m_status_complete; ?></td>
                    <td><?php echo $class[$key]->m_remarks; ?></td>
                    <td><a class="btn bg-green btn-flat" onclick="restoremonthlytarget(<?php echo $class[$key]->m_target_id ?>)">Restore</a></td>
                    <td><a onclick="permanentlydelmonthlytarget(<?php echo $class[$key]->m_target_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function editMonthlytarget($page_status,$query,$role){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/monthlytarget/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
<?php 
                      $timestart  = date("m/d/Y", strtotime($query[0]->m_target_date));
 ?>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo $timestart; ?>"  name="m_target_date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Target:</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?php echo $query[0]->m_target; ?>" class="form-control" name="m_target">
                        <input type="hidden" value="<?php echo $query[0]->m_target_id; ?>" name="m_target_id">
                      </div>
                  </div>
              </div><!-- col-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Status:</label>
                      <div class="col-sm-9">
                        <select name="m_status_complete" required="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Status</option>

                          <option <?php if($query[0]->m_status_complete == 'Complete') { echo 'selected';}?> value="Complete">Complete</option>
                          <option <?php if($query[0]->m_status_complete == 'Not Complete') { echo 'selected';}?> value="Not Complete">Not Complete</option>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Remarks:</label>
                      <div class="col-sm-11">
                        <!-- <input type="number" class="form-control"  name="" id="" required=""> -->
                        <textarea name="m_remarks" id="" class="text-borders" cols="30" rows="10"><?php echo $query[0]->m_remarks; ?></textarea>
                      </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/monthlytarget/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  ?>