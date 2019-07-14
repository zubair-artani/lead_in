<?php   
function showexpense($page_status, $page_data) {
  ?>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/expense/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="expense_name" placeholder="Add Expense" required="">
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
                <a href="<?php echo base_url('Welcome/expense/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <tbody>
                  <tr>
                    <th width="10%">ID</th>
                    <th width="60%">Expense</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Delete</th>
                  </tr>
                  <?php 
                  foreach($page_data as $result) { 
                    ?>
                  <tr id="d-<?php echo $result->expense_id; ?>">
                    <td width="10%"><?php echo $result->expense_id; ?></td>
                    <td width="60%"><?php echo $result->expense_name; ?></td>
                    <td width="15%"><a href="<?php echo base_url('Welcome/expense/'); echo $result->expense_id; ?>" class="btn bg-blue btn-flat">Edit</a></td>
                    <td width="15%"><a onclick="delExpense(<?php echo $result->expense_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
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

function viewTrash($page_status, $page_data) {
  ?>
  <br>
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
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <a href="<?php echo base_url('Welcome/expense/view'); ?>" class="btn bg-maroon btn-flat margin" >View All expense </a>
                
                <table class="table table-hover" >
                  <tbody>
                  <tr>
                    <th width="15%">ID</th>
                    <th width="60%">Expense</th>
                    <th width="25%">RESTORE</th>
                    <th width="15%">DELETE</th>
                  </tr>
                  <?php 
                  foreach($page_data as $result) { 
                    ?>
                  <tr id="d-<?php echo $result->expense_id; ?>">
                    <td width="15%"><?php echo $result->expense_id; ?></td>
                    <td width="70%"><?php echo $result->expense_name; ?></td>
                    <td width="15%"><a onclick="restoreExpense(<?php echo $result->expense_id; ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td width="15%"><a onclick="removeExpense(<?php echo $result->expense_id; ?>)" class="btn bg-red btn-flat">delete</a></td>
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
function editexpense($page_status,$query) {
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/expense/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="class" name="expense_name" placeholder="Edit Expense" required="" value="<?php echo $query[0]->expense_name; ?>">
                    <input type="hidden" class="form-control" id="class" name="expense_id" placeholder="Edit Expense" required="" value="<?php echo $query[0]->expense_id; ?>">
                  </div>  
                  <div class=" col-sm-4">
                    <a href="<?php echo base_url('Welcome/expense/view') ?>" class="btn bg-red pull-right">Cancel</a>
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