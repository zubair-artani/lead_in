<?php 
function showcapital($data, $class){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">

              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/capital/add') ?>" class="btn bg-red btn-flat">Add New capital</a> <a href="<?php echo base_url('Welcome/capital/viewTrash') ?>" class="btn bg-maroon btn-flat">Trash <i class="fa fa-trash"></i></a></h3>

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
                      <th>Capital</th>
                      <th>Remarks</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                   foreach($class as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($class[$key]->date));
                  ?>

                  <tr id="d-<?php echo $class[$key]->capital_id ?>">
                    <td></td>
                    
                    <td><?php echo $class[$key]->capital_id; ?></td>
                    <td><?php echo $class[$key]->date; ?></td>
                    <td><?php echo $class[$key]->capital_amount; ?></td>
                    <td><?php echo $class[$key]->remarks; ?></td>
                    <td><a class="btn bg-blue btn-flat" href="<?php echo base_url('Welcome/capital/') . $class[$key]->capital_id ?>">Edit</a></td>
                    <td><a onclick="deletecapital(<?php echo $class[$key]->capital_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function addCapital($page_status,$role){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/capital/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>

                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="05/30/2019" required=""  name="date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="" class="col-sm-3 control-label">Amount:</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control bg-grey"  name="capital_amount" id="capital_amount" required="">
                          </div>
                      </div>
                  </div><!-- col-6 -->
                <div class="col-md-6">
                  
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Remarks:</label>
                      <div class="col-sm-9">
                        <textarea name="remarks" id="" cols="120" rows="10" style="border-radius: 10px;padding: 10px;"></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                  
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/capital/view'); ?>" class="btn btn-default">Cancel</a>
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
function viewTrashCapital($data, $class){
?>
    <div class="row">
      <div class="col-xs-12">
    <div class="box">

              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/capital/view') ?>" class="btn bg-red btn-flat">View All capital</a> </h3>

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
                      <th>Capital</th>
                      <th>Remarks</th>
                      <th>Restore</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   foreach($class as $key => $value){ 
                      // 24-hour time to 12-hour time 
                      $timestart  = date("g:i a", strtotime($class[$key]->date));
                  ?>

                  <tr id="d-<?php echo $class[$key]->capital_id ?>">
                    <td></td>
                    <td><?php echo $class[$key]->capital_id; ?></td>
                    <td><?php echo $class[$key]->date; ?></td>
                    <td><?php echo $class[$key]->capital_amount; ?></td>
                    <td><?php echo $class[$key]->remarks; ?></td>
                    <td><a class="btn bg-green btn-flat" onclick="restorecapital(<?php echo $class[$key]->capital_id ?>)">Restore</a></td>
                    <td><a onclick="permanentlydelcapital(<?php echo $class[$key]->capital_id ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
  function editCapital($page_status,$role,$class){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/capital/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
<?php 
                      $timestart  = date("m/d/Y", strtotime($class[0]->date));
 ?>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo $timestart; ?>" required=""  name="date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="" class="col-sm-3 control-label">Amount:</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $class[0]->capital_amount ?>"  class="form-control bg-grey"  name="capital_amount" id="capital_amount" required="">
                            <input type="hidden" value="<?php echo $class[0]->capital_id ?>" name="capital_id">
                          </div>
                      </div>
                  </div><!-- col-6 -->
                <div class="col-md-6">
                  
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Remarks:</label>
                      <div class="col-sm-9">
                        <textarea name="remarks" id="" cols="120" rows="10" style="border-radius: 10px;padding: 10px; "><?php echo $class[0]->remarks ?></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  
                  
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/capital/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  ?>
