<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="text-align: center;">
        <div class="image">
          <img src="<?php echo $this->session->userdata('pic'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <p><?php echo $this->session->userdata('name'); ?></p>
          <a href="#" style="font-size: 13px;"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">
          <a href="<?php echo base_url('Welcome/index'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Fee Structure</span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Welcome/department/view'); ?>"><i class="fa fa-circle-o"></i> Department</a></li>
            <li><a href="<?php echo base_url('Welcome/classes/view'); ?>"><i class="fa fa-circle-o"></i> Class/Course</a></li>
            <li><a href="<?php echo base_url('Welcome/batchdays/view'); ?>"><i class="fa fa-circle-o"></i> Batch Days</a></li>
            <li><a href="<?php echo base_url('Welcome/source/view'); ?>"><i class="fa fa-circle-o"></i> Marketing Source</a></li>
            <li><a href="<?php echo base_url('Welcome/inquiry_status/view'); ?>"><i class="fa fa-circle-o"></i> Inquiry Status</a></li>
            <!-- <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Student Status</a></li> -->
            <li>
              <a href="<?php echo base_url('Welcome/faculty/view'); ?>">
                <!-- <i class="fa fa-calendar"></i> -->
                <i class="fa fa-circle-o"></i>
                 <span>Faculty</span>
              </a>
            </li>
            <li>
            <a href="<?php echo base_url('Welcome/education/view'); ?>">
              <i class="fa fa-circle-o"></i> <span>Education</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('Welcome/religion/view'); ?>">
              <i class="fa fa-circle-o"></i> <span>Religion</span>
            </a>
          </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Create Batch Code</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Welcome/batchCode/view'); ?>"><i class="fa fa-circle-o"></i> Batch Code</a></li>
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Class</span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Days</span>
          </a>
        </li> -->
        
        
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span> Subject</span>
          </a>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Per PIC Report</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> DTD</a>
              <a href="#"><i class="fa fa-circle-o"></i> Status</a>
              <a href="#"><i class="fa fa-circle-o"></i> Department</a>
              <a href="#"><i class="fa fa-circle-o"></i> Class/Course</a>
              <a href="#"><i class="fa fa-circle-o"></i> Source</a>
            </li>
          </ul>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Students Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="">
                <a href="<?php echo base_url('Welcome/inquiry_form/view'); ?>">
                  <i class="fa fa-circle-o"></i> <span> PIC Form</span>
                </a>
              </li>
            <li><a href="<?php echo base_url('Welcome/registration/view'); ?>"><i class="fa fa-circle-o"></i> Registeration</a></li>
              <li><a href="<?php echo base_url('Welcome/admission/view'); ?>"><i class="fa fa-circle-o"></i> Admission</a></li>
              <li><a href="<?php echo base_url('Welcome/fee_slip/add'); ?>"><i class="fa fa-circle-o"></i> Fees Slip</a></li>
              
              <li><a href="#"><i class="fa fa-circle-o"></i> Create Markesheet</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Create Performance</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Certification</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> PVC Card</a></li>
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Registration DTD</a></li>
            <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i> Admission DTD</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Fees DTD</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Batch Report -<br> Active Students</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Test Report Batch Wise</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Test Report Registeration <br> Number Wise</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Student Status Report</a></li>
          </ul>
        </li> -->
        <li class="header">ADMINSTRATION</li>
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Message</span></a>
        </li> -->
      <?php 
          if($this->session->userdata('role') == 'admin'){
       ?>
        <li>
          <a href="<?php echo base_url('Welcome/alltask/view') ?>"><i class="fa fa-edit"></i> <span>Send Message</span></a>
        </li>
      <?php } ?>
        <li>
         <a href="<?php echo base_url('Welcome/monthlyTarget/view'); ?>"><i class="fa fa-edit"></i> <span>Monthly Target</span></a>
       </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Bank System</span></a>
        </li>
        <li class="treeview">
          <!-- <a href="#"><i class="fa fa-edit"></i> <span>Rep Report <br>Bank System</span></a> -->
        </li>
        <li class="treeview">
          <!-- <a href="#"><i class="fa fa-edit"></i> <span>Fees Structure</span></a> -->
        </li>
        <?php 
          if($this->session->userdata('role') == 'admin'){
         ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Create Account</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('Welcome/editor/view') ?>"><i class="fa fa-circle-o"></i> Add New Account</a></li>
              </ul>
            </li>
        <?php } ?>
        <li>
          <a href="<?php echo base_url('Welcome/backupdatabase/') ?>"><i class="fa fa-edit"></i> <span>Backups</span></a>
        </li>
        <li class="treeview">
          <!-- <a href="#"><i class="fa fa-edit"></i> <span>Parent Login</span></a> -->
        </li>
        <?php if($this->session->userdata('role') == 'admin'){ ?>
            
        <li class="header">ACCOUNTS</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Expense Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
             <a href="<?php echo base_url('Welcome/mexpense/view') ?>"><i class="fa fa-edit"></i> <span>Expense</span></a>
           </li>
            <li class="">
             <a href="<?php echo base_url('Welcome/expense/view') ?>"><i class="fa fa-edit"></i> <span>Expense Type</span></a>
           </li>    
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Fees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
             <a href="<?php echo base_url('Welcome/fees_remaining/view') ?>"><i class="fa fa-edit"></i> <span>Remaining</span></a>
           </li>
            <li class="">
             <a href="<?php echo base_url('Welcome/fees_collected/view') ?>"><i class="fa fa-edit"></i> <span>Collected</span></a>
           </li>    
          </ul>
        </li>

        
        <li>
         <a href="<?php echo base_url('Welcome/salary/view'); ?>"><i class="fa fa-edit"></i> <span>Salary</span></a>
       </li>
        <li>
          <a href="<?php echo base_url('Welcome/capital/view'); ?>"><i class="fa fa-edit"></i> <span>Capital</span></a>
        </li>
        <?php } ?>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Students Fees Ledger</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Fee Detail</a>
              <a href="#"><i class="fa fa-circle-o"></i> Fee Detail by Batch Wise</a>
              <a href="#"><i class="fa fa-circle-o"></i> Student's Due Date Wise</a>
              <a href="#"><i class="fa fa-circle-o"></i> DTD Expense </a>
              <a href="#"><i class="fa fa-circle-o"></i> DTD Capital</a>
              <a href="#"><i class="fa fa-circle-o"></i> Salary DTD</a>
              <a href="#"><i class="fa fa-circle-o"></i> DTD Adminstration <br>User Report</a>
              <a href="#"><i class="fa fa-circle-o"></i> By Month Fees</a>
              <a href="#"><i class="fa fa-circle-o"></i> Profil Loss Report </a>
            </li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>