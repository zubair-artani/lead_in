<?php 
function showdepartment($page_status,$page_data) {
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/department/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="class" name="department_name" placeholder="Add Department" required="">
                  </div>  
                  <div class=" col-sm-4">
                    <button type="reset" class="btn bg-red pull-right">Reset</button>
                    <button class="btn bg-black pull-right">Add</button>
                  </div>
                </div>
              </div>

            <?php echo form_close(); ?>

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <a href="<?php echo base_url('Welcome/department/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <tbody>
                  <tr>
                    <th width="10%">ID</th>
                    <th width="60%">Department</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Delete</th>
                  </tr>
                  <?php foreach($page_data as $result) { ?>
                  <tr id="d-<?php echo $result->department_id; ?>">
                  	<td><?php echo $result->department_id; ?></td>
                  	<td><?php echo $result->department_name; ?></td>
                  	<td><a href="<?php echo base_url('Welcome/department/'); echo $result->department_id; ?>" class="btn bg-blue btn-flat">Edit</a></td>
                  	<td><a onclick="delDepartment(<?php echo $result->department_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
function viewTrashDepartment($page_status,$page_data) {
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <a href="<?php echo base_url('Welcome/department/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >View All Departments</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <tbody>
                  <tr>
                    <th width="15%">ID</th>
                    <th width="70%">Department</th>
                    <th width="15%">Delete</th>
                  </tr>
                  <?php foreach($page_data as $result) { ?>
                  <tr id="d-<?php echo $result->department_id; ?>">
                  	<td><?php echo $result->department_id; ?></td>
                  	<td><?php echo $result->department_name; ?></td>
                  	<td><a onclick="restoreDepartment(<?php echo $result->department_id; ?>)" class="btn bg-green btn-flat">Restore</a></td>
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
function editDepartment($page_status,$query) {
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/department/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="class" name="department_name" required="" value="<?php echo $query[0]->department_name; ?>">
                    <input type="hidden" class="form-control" id="class" name="department_id" required="" value="<?php echo $query[0]->department_id; ?>">
                  </div>  
                  <div class=" col-sm-4">
                    <a href="<?php echo base_url('Welcome/department/view') ?>" class="btn bg-red pull-right">Cancel</a>
                    <button class="btn bg-black pull-right">Update</button>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
              </div>
              <!-- /.box-header -->
            </div>
    </div> 
  </div>
<?php 
}

  ?>