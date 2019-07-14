<?php 
	function showtask($getdata,$users){
?>
	<div class="row">
      <div class="col-xs-12">
			<div class="box clearfix">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url('Welcome/alltask/add') ?>" class="btn bg-navy">Add New</a></h3>
              </div>
              <!-- /.box-header -->
              <div class="col-xs-12">
                <?php foreach($getdata as $key => $value ){ ?>
              <ul class="timeline">
                      <?php 
                      // print_r($getdata);
                        $date  = date("Y/m/d", strtotime($getdata[$key]->date));
                      ?>
    <!-- timeline time label -->
      			    <li class="time-label">
      			        <span class="bg-red">
      			            <?php echo $date; ?>
      			        </span>
      			    </li>
      			    <!-- /.timeline-label -->

      			    <!-- timeline item -->
      			    <li>
      	              <i class="fa fa-envelope bg-blue"></i>
                            <?php 
                            // print_r($getdata);
                              $time  = date("H:i", strtotime($getdata[$key]->time));
                            ?>
      	              <div class="timeline-item">
      	                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $time; ?></span>

      	                <h3 class="timeline-header">Sent Task to <a href="#"><?php echo $users[$key][0]->user_name; ?></a></h3>

      	                <div class="timeline-body">
                          <?php echo $getdata[$key]->msg; ?>
      	                </div>
      	                <div class="timeline-footer">
      	                  <?php if($getdata[$key]->status == 'pending'){
                            ?>
                          <a href='javascript:viod(0)' class="btn btn-danger bg-red btn-xs">PENDING</a>
                          <a style="display: none;" href='javascript:viod(0)' class="btn btn-sucess btn-xs"><i class="fa fa-check fa-2x"></i></a>
                            <?php 
                          }else {
                            ?>
                          <a href='javascript:viod(0)' class="btn btn-sucess btn-sm">Completed <i class="fa fa-check-square fa-1x" style="color:green;"></i></a>
                          <?php 
                          } ?>
      	                </div>
      	              </div>
      	            </li>

      			    <!-- END timeline item -->

      			    ...

      			</ul>
      <?php } ?>
			</div>
              <!-- /.box-body -->
            </div>
		</div>
	</div>
<?php
	}

 ?>

<?php 
 	function addtask($getUsers){
?>		
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Welcome/alltask/send', ['class'=>'form-horizontal']); ?>
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Faculty:</label>
                    <div class="col-sm-9 control-label" style="text-align: left !important;">
                      <select class="form-control select2 select2-hidden-accessible" name="faculty" style="width: 100%;" required="">
                        <option value="">Select Faculty</option>
                        <?php 
                          foreach($getUsers as $user){
                         ?>
                            <option value="<?php echo $user->user_id; ?>"><?php echo $user->user_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="form-group is-empty">
                  <label for="msg" class="col-sm-2 control-label">Message:</label>

                  <div class="col-sm-9">
                    <textarea name="msg" class="form-control" cols="30" rows="10"></textarea>
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
<?php 
  function showeditortask($getdata,$users){
?>
  <div class="row">
      <div class="col-xs-12">
      <div class="box clearfix">
              <div class="box-header">
              </div>
              <!-- /.box-header -->
              <div class="col-xs-12">
                <?php foreach($getdata as $key => $value ){ ?>
              <ul class="timeline">
                      <?php 
                      // print_r($getdata);
                        $date  = date("Y/m/d", strtotime($getdata[$key]->date));
                      ?>
    <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-red">
                        <?php echo $date; ?>
                    </span>
                </li>
                <!-- /.timeline-label -->

                <!-- timeline item -->
                <li>
                      <i class="fa fa-envelope bg-blue"></i>
                            <?php 
                            // print_r($getdata);
                              $time  = date("H:i", strtotime($getdata[$key]->time));
                            ?>
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo $time; ?></span>

                        <h3 class="timeline-header"><a href="javascript:void(0)">ADMIN</a> sent you an task</h3>

                        <div class="timeline-body">
                          <?php echo $getdata[$key]->msg; ?>
                        </div>
                        <div class="timeline-footer">
                          <?php if($getdata[$key]->status == 'pending') { ?>
                            <a href='<?php echo base_url('Welcome/alltask/') ?><?php echo $getdata[$key]->sms_id ?>' class="btn btn-sucess bg-green btn-xs">SUBMIT</a>
                          <?php  } else {  ?>
                            <a href='javascript:viod(0)' class="btn btn-sucess btn-sm">Completed <i class="fa fa-check-square fa-1x" style="color:green;"></i></a>
                          <?php } ?>
                        </div>
                      </div>
                    </li>

                <!-- END timeline item -->

                ...

            </ul>
      <?php } ?>
      </div>
              <!-- /.box-body -->
            </div>
    </div>
  </div>
<?php
  }

 ?>