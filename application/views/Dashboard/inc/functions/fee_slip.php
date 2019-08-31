<?php 
  function addFeeSlip($page_status,$role,$feedetail){
?>    
          <div class="box box-info">
            <?php echo form_open_multipart('Welcome/fee_slip/insert', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Select Student:</label>
                      <div class="col-sm-9">
                        <select id="student_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                          <option value="">Select Student</option>
                          <?php 
                            foreach($feedetail as $key => $value){ ?>
                              <option value="<?php echo $feedetail[$key][0]->r_student_id; ?>"><?php echo $feedetail[$key][0]->r_student_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Batch Code:</label>
                      <div class="col-sm-9">
                        <select id="batch_code" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                          <option value="">Select Batch Code</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="student_name" id="name" required="" >
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" readonly="" value="" required=""  name="date" <?php 
                          $x = $role == 'admin';
                          echo $x ? 'id="datepicker"' : '';
                       ?>>
                    </div>
                  </div>
                  
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">Admission Fee:</label>
                  <div class="col-sm-9">
                    <input type="text" id="admission_fee" name="admission_fee"  class="form-control"  >
                  </div>
                </div>
                  
              </div><!-- col-6 -->
                <div class="col-md-6">
                <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Monthly Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="monthly_fee" id="monthly_fee" >
                        <input type="hidden" name="admission_id" id="admission_id">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Other Fee:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" name='other_fee' class="form-control" value="0">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Certification Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="certification_fee" id="" value="0" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Late Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="late_fee" id="" value="0">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Notes Fee:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="notes_fee" id="" value="0">
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Remarks:</label>
                      <div class="col-sm-11">
                        <textarea name="remarks" id="" class="text-borders" cols="30" rows="10"></textarea>
                      </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/fee_slip/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Add</button>
              </div>
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  ?>