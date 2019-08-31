<?php 
function showremaining($page_status,$data,$registrationData,$search_data) {
  if(!empty($data)){
    $pendingtotal = 0;
    if(!empty($data[1])){
      foreach($data[1] as $key => $value){
          if(sizeof($data[1][$key]) > 1){
            for($i = 0; $i < sizeof($data[1][$key]); $i++){
              $pendingtotal +=  $data[1][$key][$i]->pending_fee;
            }
          } else {
            $pendingtotal += $data[1][$key][0]->pending_fee;
          }
      }
    }
    if(!empty($data[0])){

      foreach($data[0] as $key => $value){
        if($data[0][$key]->a_payment == 'non_paid'){
          $pendingtotal += $data[0][$key]->a_student_monthly_fees + $data[0][$key]->a_student_adm_fees;
        }
      }
    }
  }
 ?>
 <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="box-body">
                  <h1 align="center"> TOTAL REMAINING FEES : <?php echo $pendingtotal; ?>Rs</h1>
                </div>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <a href="<?php echo base_url('Welcome/department/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
                <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date<i class="fa fa-calender"></i></button>
              <?php echo form_open_multipart('Welcome/searchByDate/fee', ['class'=>'form-horizontal']); ?>
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
                    <th width="10%">ID</th>
                    <th width="15%">Name</th>
                    <!-- <th width="15%">Total Fee Collected</th> -->
                    <th width="15%">Remaining  Fee</th>
                    <th width="15%">Date</th>
                    <!-- <th width="15%">Fee Status</th> -->
                    <th width="15%">Update</th>
                  </tr>
                  </thead>
                  <?php if($search_data == '0'){
                    ?>
                    <tbody>
                  
                  <?php 
                  if($data[1] != 0){
                    foreach($data[1] as $key => $value){
                      $pendingtotal = 0;
                      if(sizeof($data[1][$key]) > 1){
                        for($i = 0; $i < sizeof($data[1][$key]); $i++){
                          $pendingtotal +=  $data[1][$key][$i]->pending_fee;
                        }
                      } else {
                        $pendingtotal = $data[1][$key][0]->pending_fee;
                      }
                     ?>
                      <tr>
                        <td><?php echo $data[1][$key][0]->fee_id; ?></td>
                        <td><?php echo $data[1][$key][0]->student_name; ?></td>
                        <!-- <td><?php echo $data[1][$key][0]->total_fee; ?></td> -->
                        <td><?php echo $pendingtotal; ?></td>
                        <td><?php echo $data[1][$key][0]->date; ?></td>
                        <td><a href="<?php echo base_url("Welcome/fees_remaining/" . $data[1][$key][0]->admission_id) ?>" class="btn bg-green">UPDATE</a></td>
                      </tr>
                  
                  <?php } 
                  }
                  ?>
                  <?php 
                  if($data[0] != 0){
                    foreach($data[0] as $key => $value){
                      if($data[0][$key]->a_payment == 'non_paid'){
                        $total = $data[0][$key]->a_student_monthly_fees + $data[0][$key]->a_student_adm_fees;
                     ?>
                      <tr>
                        <td><?php echo $data[0][$key]->a_student_id; ?></td>
                        <td><?php echo $registrationData[$key][0]->r_student_name ?></td>
                        <!-- <td><?php echo $total; ?></td> -->
                        <td><?php echo $total; ?></td>
                        <td><?php echo $data[0][$key]->a_student_currentdate; ?></td>
                        <td><a href="<?php echo base_url("Welcome/fee_slip/add"); ?>" class="btn bg-green">UPDATE</a></td>
                      </tr>
                  <?php
                      }
                      }
                   } ?>
                  </tbody>
                  <?php } else {?> 
                    <!-- <tbody>
                  
                  <?php foreach($search_data as $data[$key][0]) { ?>
                  <tr id="d-<?php echo $data[$key][0]->a_student_id; ?>">
                    <td><?php echo $data[$key][0]->a_student_id; ?></td>
                    <td><?php echo $data[$key][0]->a_student_registration_id; ?></td>
                    <td><?php echo $data[$key][0]->a_student_currentdate; ?></td>
                    <td><?php echo $data[$key][0]->a_student_adm_fees; ?></td>
                    <td><?php echo $data[$key][0]->a_student_monthly_fees; ?></td>
                    <td><?php echo $data[$key][0]->a_payment; ?></td>
                    <td><?php if($data[$key][0]->a_payment == 'non_paid'){ ?>
                      <a disabled='' href="<?php echo base_url('Welcome/fees_remaining/'); echo $data[$key][0]->a_student_id; ?>" class="btn bg-blue btn-flat">Pay Now</a>
                    <?php } else {?>
                      <a href="<?php echo base_url('Welcome/fees_remaining/'); echo $data[$key][0]->a_student_id; ?>" class="btn bg-blue btn-flat">Pay Now</a>
                    <?php } ?>
                    </td>
                    <td><a onclick="delDepartment(<?php echo $data[$key][0]->a_student_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                  <?php } ?>
                  </tbody> -->
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
function editRemaining($page_status,$query) {
?>
<br>
<div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <?php 
                  $totalpending = 0;
                  for($i = 0; $i < sizeof($query); $i++){
                    $totalpending += $query[$i]->pending_fee;
                  }

                 ?>
           <?php echo form_open('Welcome/fees_remaining/update', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group is-empty">
                  <div class="col-sm-12">
                    <label>Remaining Fee:</label><input type="text" class="form-control" disabled="" required="" value="<?php echo $totalpending; ?>">
                    <input type="hidden" class="form-control" id="class" name="fee_id" required="" value="<?php echo $query[0]->fee_id; ?>">
                    <input type="hidden" class="form-control" id="class" name="admission_id" required="" value="<?php echo $query[0]->admission_id; ?>">
                  </div>  
                  <div class=" col-sm-12">
                    <label>Pay Now : </label><input type="text" class="form-control" name="pending_fee" required="">
                    <a href="<?php echo base_url('Welcome/fees_remaining/view') ?>" class="btn bg-red pull-right">Cancel</a>
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