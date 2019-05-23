<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $this->session->userdata('pic'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo base_url('Welcome/index'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php 
          if($this->session->userdata('role') == 'admin'){
         ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Page Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Welcome/addEditor') ?>"><i class="fa fa-circle-o"></i> Add Editor</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Fee Structure</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Enquiry Status</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Department</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Class/Course</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Marketing Source</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Student Status</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Batch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Batch Code</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Class</span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Days</span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Staff</span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Expense Type</span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Education</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span> Subject</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span> PIC Form</span>
          </a>
        </li>
        <li class="treeview">
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
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Students Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Register</a></li>
            <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i> Admission</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Fees Slip</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Create Markesheet</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Create Performance</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Certification</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> PVC Card</a></li>
          </ul>
        </li>
        <li class="treeview">
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
        </li>
        <li class="header">ADMINSTRATION</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Message</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Complain Box</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Target</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Bank System</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Rep Report <br>Bank System</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Fees Structure</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Create Accounts</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Backups</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Parent Login</span></a>
        </li>
        <li class="header">ACCOUNTS</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Expense</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Salary</span></a>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Capital</span></a>
        </li>
<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Students Fees Ledger/a></li>
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
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>