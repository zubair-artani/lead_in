<?php   
function showexpense($page_status, $page_data,$role,$getexpense, $exp_type,$search_data) {
  ?>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/mexpense/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>

                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="05/30/2019" required=""  name="expense_date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Amount:</label>
                    <div class="input-group col-sm-9">
                      <div class="input-group-addon">
                      </div>

                      <input type="number" class="form-control pull-right pad-left" autocomplete="off"  required=""  name="expense_amount">
                    </div>
                    <!-- /.input group -->
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Expense:</label>
                      <div class="col-sm-9">
                        <select name="expense_type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Expense</option>
                          <?php 
                            foreach($getexpense as $expense){ ?>
                              <option value="<?php echo $expense->expense_id; ?>"><?php echo $expense->expense_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <button type="reset" class="btn bg-red pull-right">Reset</button>
                      <button class="btn bg-black pull-right">Add</button>
                  </div>
              </div>
              </div>
              

            <?php echo form_close(); ?>

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" id="search_table" name="table_search" class="form-control pull-right" placeholder="Search"></div>

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-3">
                  <a href="<?php echo base_url('Welcome/mexpense/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
                  <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date </i></button>
                </div>
                <?php echo form_open_multipart('Welcome/searchByDate/expense', ['class'=>'form-horizontal']); ?>
                <div class="col-xs-3">
                 <div class="form-group searchmyDiv" style="display: none;">
                    <label for="startdate" class="col-sm-2 control-label">From:</label>
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" name="from_date"  class="form-control pull-right pad-left" autocomplete="off" id="datepicker3" required="" value="<?php echo date('m/d/Y'); ?>">
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
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-xs-3">
                  <div class="form-group searchmyDiv"  style="display: none;">
                    <div class="input-group date col-sm-10">
                      <div class="input-group-addon">
                      </div>
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
                    <th width="10%">ID</th>
                    <th width="10%">Expense Date</th>
                    <th width="15%">Expense Amount</th>
                    <th width="15%">Expense Type</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Delete</th>
                  </tr>
                 </thead>
                 <?php if($search_data == '0'){
                    ?>
                  <tbody>
                  
                  <?php 
                  foreach($page_data as $key => $value) { 
                    if(!empty($exp_type[$key][0])){
                    ?>
                  <tr id="d-<?php echo $page_data[$key]->m_expense_id; ?>">
                    <td width="10%"><?php echo $page_data[$key]->m_expense_id; ?></td>
                    <td width="10%"><?php echo $page_data[$key]->expense_date; ?></td>
                    <td width="15%"><?php echo $page_data[$key]->expense_amount; ?></td>
                    <td width="15%"><?php echo $exp_type[$key][0]->expense_name ?></td>
                    <td width="15%"><a href="<?php echo base_url('Welcome/mexpense/'); echo $page_data[$key]->m_expense_id; ?>" class="btn bg-blue btn-flat">Edit</a></td>
                    <td width="15%"><a onclick="delMonthlyExpense(<?php echo $page_data[$key]->m_expense_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                <?php } 
                }?>
                </tbody>
                  <?php }else { ?>
                 <tbody>
                  
                  <?php 
                  foreach($page_data as $key => $value) { 
                    if(!empty($exp_type[$key][0])){
                    ?>
                  <tr id="d-<?php echo $page_data[$key]->m_expense_id; ?>">
                    <td width="10%"><?php echo $page_data[$key]->m_expense_id; ?></td>
                    <td width="10%"><?php echo $page_data[$key]->expense_date; ?></td>
                    <td width="15%"><?php echo $page_data[$key]->expense_amount; ?></td>
                    <td width="15%"><?php echo $exp_type[$key][0]->expense_name ?></td>
                    <td width="15%"><a href="<?php echo base_url('Welcome/mexpense/'); echo $page_data[$key]->m_expense_id; ?>" class="btn bg-blue btn-flat">Edit</a></td>
                    <td width="15%"><a onclick="delMonthlyExpense(<?php echo $page_data[$key]->m_expense_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                <?php } 
                }?>
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

function viewTrash($page_status, $page_data) {
  ?>
  <br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <!-- /.box-header -->
              <div class="box-body table-responsive padding">
                <a href="<?php echo base_url('Welcome/mexpense/view'); ?>" class="btn bg-maroon btn-flat margin" >View All expense </a>
                
                <table class="table table-hover" >
                  <tbody>
                  <tr>
                    <th width="10%">ID</th>
                    <th width="15%">Expense Date</th>
                    <th width="15%">Expense Amount</th>
                    <th width="15%">Expense Type</th>
                    <th width="15%">RESTORE</th>
                    <th width="15%">DELETE</th>
                  </tr>
                  <?php 
                  foreach($page_data as $result) { 
                    ?>
                  <tr id="d-<?php echo $result->m_expense_id; ?>">
                    <td width="10%"><?php echo $result->m_expense_id; ?></td>
                    <td width="15%"><?php echo $result->expense_date; ?></td>
                    <td width="15%"><?php echo $result->expense_amount; ?></td>
                    <td width="15%"><?php echo $result->expense_type; ?></td>
                    <td width="15%"><a onclick="restoreMonthlyExpense(<?php echo $result->m_expense_id; ?>)" class="btn bg-green btn-flat">Restore</a></td>
                    <td width="15%"><a onclick="removeMonthlyExpense(<?php echo $result->m_expense_id; ?>)" class="btn bg-red btn-flat">delete</a></td>
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
function editexpense($page_status,$id,$query,$role, $expense_type) {
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
           <?php echo form_open('Welcome/mexpense/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
<?php 
                      $timestart  = date("m/d/Y", strtotime($query[0]->expense_date));
 ?>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="<?php echo $timestart; ?>" required=""  name="expense_date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Amount:</label>
                    <div class="input-group col-sm-9">
                      <div class="input-group-addon">
                      </div>

                      <input type="number" value="<?php echo $query[0]->expense_amount; ?>" class="form-control pull-right pad-left" autocomplete="off"  required=""  name="expense_amount">
                      <input type="hidden" value="<?php echo $query[0]->m_expense_id; ?>" class="form-control pull-right pad-left" autocomplete="off"  name="m_expense_id">
                    </div>
                    <!-- /.input group -->
                  </div>
              </div>  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Expense Type:</label>
                      <div class="col-sm-9">
                        <select name="expense_type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Expense Type</option>
                          <?php 
                            foreach($expense_type as $exp_type){ ?>
        <option value="<?php echo $exp_type->expense_id; ?>" <?php if($query[0]->expense_type == $exp_type->expense_id){ echo "selected"; } ?>><?php echo $exp_type->expense_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                    
                  </div>
                  <div class=" col-sm-12">
                    <a href="<?php echo base_url('Welcome/mexpense/view') ?>" class="btn bg-red pull-right">Cancel</a>
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