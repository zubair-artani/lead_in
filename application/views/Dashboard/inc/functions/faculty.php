<?php 
function showFaculty($page_status,$page_data) {
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open_multipart('Welcome/faculty/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="class" name="faculty_name" placeholder="Add faculty" required="">
                  </div>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" id="class" name="userfile" required="">
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
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <a href="<?php echo base_url('Welcome/faculty/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th width="10%">ID</th>
                    <th width="30%">faculty</th>
                    <th width="35%">Signature</th>
                    <th width="15%">Salary Status</th>
                    <th width="15%">Edit</th>
                    <th width="10%">Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach($page_data as $result) {
                    if($result->faculty_salary_status == 'Pending'){
                      $color = 'red';
                    } else {
                      $color = 'green';
                    }?>
                  <tr id="d-<?php echo $result->faculty_id; ?>">
                  	<td><?php echo $result->faculty_id; ?></td>
                    <td><?php echo $result->faculty_name; ?></td>
                  	<td><img src="<?php echo $result->faculty_signature; ?>" style='width: 90px;height:85px;' alt=""></td>
                    <td>
                      <span class="badge bg-<?php echo $color; ?>">
                        <?php echo $result->faculty_salary_status; ?>
                      </span>
                    </td>
                  	<td><a href="<?php echo base_url('Welcome/faculty/'); echo $result->faculty_id; ?>" class="btn bg-blue btn-flat">Edit</a></td>
                  	<td><a onclick="delfaculty(<?php echo $result->faculty_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
function viewTrashFaculty($page_status,$page_data) {
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <!-- <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
                <a href="<?php echo base_url('Welcome/faculty/view'); ?>" class="btn bg-maroon btn-flat margin" >View All faculties</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th width="15%">ID</th>
                    <th width="30%">FACULTY</th>
                    <th width="10%">RESTORE</th>
                    <th width="10%">DELETE</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach($page_data as $result) { ?>
                  <tr id="d-<?php echo $result->faculty_id; ?>">
                    <td><?php echo $result->faculty_id; ?></td>
                    <td><?php echo $result->faculty_name; ?></td>
                     <td><a onclick="restorefaculty(<?php echo $result->faculty_id; ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td><a onclick="permanentlydelfaculty(<?php echo $result->faculty_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
function editFaculty($page_status,$query) {
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open_multipart('Welcome/faculty/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="class" name="faculty_name" required="" value="<?php echo $query[0]->faculty_name; ?>">
                    <input type="hidden" class="form-control" id="class" name="faculty_id" required="" value="<?php echo $query[0]->faculty_id; ?>">
                    <input type="file" class="form-control" id="class" name="userfile">
                  </div>  
                  <div class=" col-sm-4">
                    <a href="<?php echo base_url('Welcome/faculty/view') ?>" class="btn bg-red pull-right">Cancel</a>
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