  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://www.facebook.com/hamariacademy">Hamari Academy</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Material Design -->
<script src="<?php echo base_url(); ?>dist/js/material.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/ripples.min.js"></script>
<script>
    $.material.init();
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<script>
  var excrpt = document.getElementsByClassName('excerpt')[0].innerHTML;
  if(excrpt.length > 15){
    var slc = excrpt.slice(0, 15);
    document.getElementsByClassName('excerpt')[0].innerHTML = slc + ' ... ';
    

    // var span = document.createElement("span");
    // var node = document.createTextNode("Read More.");
    // span.appendChild(node);

    // var span2 = document.createElement("attr");
    // // var attr = span.addAttribute('style', 'color:red;');
    // var node2 = document.createTextNode(excrpt);
    // span2.appendChild(node2);
    
    // var element = document.getElementsByClassName("excerpt")[0];
    // element.appendChild(span);
    // element.appendChild(span2);
    
    // $('.excerpt > span').attr('onclick', 'showmore(this)');
    // $('.excerpt > attr').attr('style', 'display:none;');
  } 

  // function showmore(span){
  	// var sdata = $(span).parent().find('attr').html();
  	// $(span).parent().html(sdata);
  	// alert(sdata);
  	// $('.dropdown.tasks-menu').addClass('open');
  // }
</script>
