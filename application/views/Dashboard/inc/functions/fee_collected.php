<?php 
function showtotalcollection($all_fees){
  if($all_fees != 0){
    $total_fee_sum = 0;
    foreach($all_fees as $key => $value){
      $total_fee_sum += $all_fees[$key]->total_fee;
    }  
  }
?>
  <div class="row">
      <div class="col-xs-12">
    <div class="box">
              <div class="box-header">
                <div class="box-body">
                  <h1 align="center"> TOTAL COLLECTED FEES : <?php echo $total_fee_sum; ?>Rs</h1>
                </div>
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
              <div class="box-body table-responsive padding">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                    <th width="10%">ID</th>
                    <th width="15%">Name</th>
                    <th width="15%">Collected  Fee</th>
                    <th width="15%">Date</th>
                    <th width="15%">Fee Slip</th>
                  </tr>
                  </thead>
                    <tbody>
                  
                  <?php 
                  if($all_fees != 0){
                    foreach($all_fees as $key => $value){
                      $id = $all_fees[$key]->fee_id;
                     ?>
                      <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $all_fees[$key]->student_name; ?></td>
                        <td><?php echo $all_fees[$key]->total_fee; ?></td>
                        <td><?php echo $all_fees[$key]->date; ?></td>
                        <td><a href="<?php echo base_url("Welcome/printfee/$id") ?>" class="btn bg-blue">Print Slip</a></td>
                      </tr>
                  
                  <?php } 
                  }
                  ?>
                  </tbody>
              </table>
              </div>
            </div>
    </div>
    
  </div>
<?php
}
  ?>