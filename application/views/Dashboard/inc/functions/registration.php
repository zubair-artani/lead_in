<?php 
  function addRegistraionForm($religion, $education,$last_edu){
?>    
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/registration/add', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Enter Date:</label>
                    <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" id="datepicker" required="" name="startdate">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Student Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">Father Name:</label>

                  <div class="col-sm-9">
                    <input type="text"  class="form-control" required="" >
                  </div>
                </div>
                <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Student M.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Father M.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Emergency C.No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">WhatsApp No:</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"  name="" id="" required="">
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Date Of Birth:</label>
                      <div class="input-group date col-sm-9">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar icon1"></i>
                      </div>
                      <input type="text" class="form-control pull-right pad-left" autocomplete="off" id="datepicker2" required="" name="dateofbirth">
                    </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                
                  
              </div><!-- col-6 -->
                <div class="col-md-6">
                  
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Gender:</label>
                      <div class="col-sm-9">
                        <select name="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Gender</option>
                          <option value="">Male</option>
                          <option value="">Female</option>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Select Image:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="file" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Enter CNIC:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Martial Status:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible"  style="width: 100%;" required="">
                        <option value="">Select Status</option>
                        <option value="">Single</option>
                        <option value="">Married</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="timeend" class="col-sm-3 control-label">Nationality:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Religion:</label>
                      <div class="col-sm-9">
                        <select name="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Religion</option>
                          <?php 
                            foreach($religion as $religion){ ?>
                              <option value=""><?php echo $religion->religion_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Current Education:</label>
                      <div class="col-sm-9">
                        <select name="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Current Education</option>
                          <?php 
                            foreach($education as $education){ ?>
                              <option value=""><?php echo $education->education_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Last Education:</label>
                      <div class="col-sm-9">
                        <select name="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="">
                          <option value="">Select Last Education</option>
                          <?php 
                            foreach($last_edu as $educations){ ?>
                              <option value=""><?php echo $educations->education_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="" class="col-sm-1 control-label">Address:</label>
                      <div class="col-sm-11">
                        <!-- <input type="number" class="form-control"  name="" id="" required=""> -->
                        <textarea name="" id="" class="text-borders" cols="30" rows="10"></textarea>
                      </div>
                      <!-- /.input group -->
                    <!-- /.form group -->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('Welcome/alltask/view'); ?>" class="btn btn-default">Cancel</a>
                <button type="reset" class="btn bg-red pull-right">Reset</button>
                <button class="btn bg-black pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>  <!-- /.row -->
<?php     
  }
  ?>