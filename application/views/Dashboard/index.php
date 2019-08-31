<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-sm-6 col-xs-12" align="center">
          <!-- small box -->
          <div class="bg-white" style="background: white;padding:20px;margin-bottom: 20px;">
            <div>
              <h4 class="thumb-heading">TARGET ACHIEVED </h4>
              <div class="progress" style="height: 150px;">
                <div id='pro' class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuemin="0" style="height: 100%;font-size: 33px;">
                </div>
              </div>
            </div>
            <h4 class="thumb-heading">CURRENT MONTHLY TARGET</h4>
            <div class="widget-thumb-wrap">
            <div class="widget-thumb-body">
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                  <?php if($currentTarget != 0){
                    echo $currentTarget[0]->allTagets;
                  } ?>
                </span>
            <h4 class="thumb-heading">REMAINING MONTHLY TARGET</h4>
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                  <?php  
                    if($currentTarget != 0){
                      $add = $currentAdmissions[0]->allAdmissions;
                          $tar  = $currentTarget[0]->allTagets;
                          $total = $tar - $add;
                          echo $total;
                    }
                   ?>
                </span>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <a href="<?php echo base_url('Welcome/capital/view'); ?>">
          <!-- small box -->
            <div class="bg-white" style="background: white;padding:20px;margin-bottom: 20px;" >
            <h4 class="thumb-heading" style="text-transform: uppercase;">CAPITAL OF <?php echo date('M Y'); ?></h4>
            <div class="widget-thumb-wrap">
            <i class="fa fa-usd bg-green"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-subtitle">RS</span>
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                  <?php if($currentCapital[0]->capital_amount > '0') {
                    echo $currentCapital[0]->capital_amount;
                  } else {
                    echo '0';
                  } ?>
                </span>
            </div>
            </div>
          </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="bg-white" style="background: white;padding:20px;margin-bottom: 20px;">
            <h4 class="thumb-heading">CURRENT MONTH ADMISSION</h4>
            <div class="widget-thumb-wrap">
            <i class="fa fa-male bg-navy"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-subtitle">&nbsp;</span>
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                  <?php echo $currentAdmissions[0]->allAdmissions; ?>
                </span>
            </div>
            </div>
          </div>
        </div>
      </div><!-- row -->
      <div class='row'>
        <section class="content-header">
          <h1>
            All Departments
          </h1>
            <br>
        </section>
        <?php foreach($allDepartments as $key => $value){ ?>
        <!-- ./col -->
        <?php if($departmentAdmission[$key][0]->totalAdmissions > 0){ ?>
          <a href="<?php echo base_url('Welcome/department/view'); ?>">
            <div class="col-lg-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-university"></i></span>

                <div class="info-box-content" style="color:#333;padding-top:20px;">
                  <span class="info-box-text"><?php echo $allDepartments[$key]->department_name; ?></span>
                  <span class="info-box-number"><?php print_r($departmentAdmission[$key][0]->totalAdmissions); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
        </a>
      <?php } 
      }?>
      </div>
      <!-- /.row (main row) -->
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
              <div class="box-header">
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="form-group is-empty"><input type="text" name="table_search" id="search_table" class="form-control pull-right" placeholder="Search"></div>
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <a href="<?php echo base_url('Welcome/inquiry_form/add'); ?>" class="btn bg-black btn-flat margin" >Add New Inquiry Form</a>
                  <a href="<?php echo base_url('Welcome/inquiry_form/viewTrash'); ?>" class="btn bg-maroon btn-flat margin" >Trash <i class="fa fa-trash-o"></i></a>
                  <button id="searchbyme" class="btn bg-red btn-flat margin">Search By date </i></button>
                </div>
                <?php echo form_open_multipart('Welcome/index', ['class'=>'form-horizontal']); ?>
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
                    <th >ID</th>
                    <th >Stu. Name</th>
                    <th >F. Name</th>
                    <th >Mobile No</th>
                    <th >Admission Fee</th>
                    <th >Monthly Fee</th>
                    <th >Source</th>
                    <th >Class</th>
                    <th >Inquiry_Status</th>
                    <th >Department</th>
                    <th >Edit</th>
                    <th >Delete</th>
                  </tr>
                  </thead>
                  <?php if($search_data == '0'){
                    ?>
                  <?php foreach($currentInquiries as $key => $value) { 
                      if(!empty($department[$key]) && !empty($class[$key]) && !empty($source[$key]) && !empty($inqstatus[$key])){
                  ?>
                  <tr id="d-<?php echo $currentInquiries[$key]->inquiry_id; ?>">
                    <td><?php echo $currentInquiries[$key]->inquiry_id; ?></td>
                    <td><?php echo $currentInquiries[$key]->student_name; ?></td>
                    <td><?php echo $currentInquiries[$key]->father_name; ?></td>
                    <td><?php echo $currentInquiries[$key]->mobile_no; ?></td>
                    <td><?php echo $currentInquiries[$key]->admission_fee; ?></td>
                    <td><?php echo $currentInquiries[$key]->monthly_fee; ?></td>
                    <td><?php echo $source[$key][0]->source_name; ?></td>
                    <td><?php echo $class[$key][0]->class_name; ?></td>
                    <td><span class="btn" style="background-color:<?php echo $inqstatus[$key][0]->inquiry_color?>; color:white;"><?php echo $inqstatus[$key][0]->inquiry_name ?></span></td>
                    <td><?php echo $department[$key][0]->department_name; ?></td>
                    <td><a href="<?php echo base_url('Welcome/inquiry_form/'); echo $currentInquiries[$key]->inquiry_id; ?>" class="btn bg-blue btn-flat">Edit / Call</a></td>
                    <td><a onclick="delinquiryform(<?php echo $currentInquiries[$key]->inquiry_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                  </tr>
                  <?php }
                  } ?>
                </tbody>
                  <?php }else { ?>
                        <tbody>
                          <?php foreach($search_data as $result) { ?>
                          <tr id="d-<?php echo $result->inquiry_id; ?>">
                            <td><?php echo $result->inquiry_id; ?></td>
                            <td><?php echo $result->student_name; ?></td>
                            <td><?php echo $result->father_name; ?></td>
                            <td><?php echo $result->mobile_no; ?></td>
                            <td><?php echo $result->admission_fee; ?></td>
                            <td><?php echo $result->monthly_fee; ?></td>
                            <td><?php echo $result->source; ?></td>
                            <td><?php echo $result->class; ?></td>
                            <td><?php echo $result->inquiry_status; ?></td>
                            <td><?php echo $result->department; ?></td>
                            <td><a href="<?php echo base_url('Welcome/inquiry_form/'); echo $result->inquiry_id; ?>" class="btn bg-blue btn-flat">Edit / Call</a></td>
                            <td><a onclick="delinquiryform(<?php echo $result->inquiry_id; ?>)" class="btn bg-red btn-flat">Delete</a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                  <?php } ?>
              </table>
              </div>
            </div>
    </div>
  </div>
    </section>
  </div>
<?php include('inc/footer.php'); ?>
<script>
  var multiply = <?php echo $add; ?> * 100;
  var divide = multiply / <?php echo $currentTarget[0]->allTagets; ?>;
  var round = Math.round(divide);
  document.getElementById('pro').style.width = round + '%';
  document.getElementById('pro').style.padding = '58px';
  document.getElementById('pro').innerHTML = round + '%';
</script>
</body>
</html>