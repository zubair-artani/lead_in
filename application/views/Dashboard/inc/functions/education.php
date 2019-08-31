<?php 
function showeducation($page_status,$page_data) {
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/education/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="class" name="education_name" placeholder="Add education" required="">
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
                <a href="<?php echo base_url('Welcome/education/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th width="10%">ID</th>
                    <th width="30%">education</th>
                    <th width="15%">Edit</th>
                    <th width="10%">Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach($page_data as $result) { ?>
                  <tr id="d-<?php echo $result->education_id; ?>">
                  	<td><?php echo $result->education_id; ?></td>
                    <td><?php echo $result->education_name; ?></td>
                  	<td><a href="<?php echo base_url('Welcome/education/'); echo $result->education_id; ?>" class="btn bg-blue btn-flat">Edit</a></td>
                  	<td><a onclick="deleducation(<?php echo $result->education_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
function vieweducation($page_status,$page_data) {
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
                <a href="<?php echo base_url('Welcome/education/view'); ?>" class="btn bg-maroon btn-flat margin" >View All Education</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th width="15%">ID</th>
                    <th width="30%">EDUCATION</th>
                    <th width="10%">RESTORE</th>
                    <th width="10%">DELETE</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach($page_data as $result) { ?>
                  <tr id="d-<?php echo $result->education_id; ?>">
                    <td><?php echo $result->education_id; ?></td>
                    <td><?php echo $result->education_name; ?></td>
                    <td><a onclick="restoreeducation(<?php echo $result->education_id; ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td><a onclick="removeeducation(<?php echo $result->education_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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
function editeducation($page_status,$query) {
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open_multipart('Welcome/education/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="class" name="education_name" required="" value="<?php echo $query[0]->education_name; ?>">
                    <input type="hidden" class="form-control" id="class" name="education_id" required="" value="<?php echo $query[0]->education_id; ?>">
                  </div>  
                  <div class=" col-sm-4">
                    <a href="<?php echo base_url('Welcome/education/view') ?>" class="btn bg-red pull-right">Cancel</a>
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