<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Faculties
        <?php } elseif($page_status == 'viewTrash'){ ?>
           View Trashes
         <?php } elseif($page_status == 'edit'){ ?>
           Edit Faculty
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Faculty</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      if($page_status == 'view') { 
           showFaculty($page_status,$page_data);
      } else if($page_status == 'viewTrash') {
          viewTrashFaculty($page_status,$page_data);
      } else if($page_status == 'edit'){
        editFaculty($page_status,$query);
      }
        ?>

    </section>
    <!-- /.content -->
  </div>
<?php include('inc/footer.php'); ?>
<script>
  function delfaculty(param1){
    if(confirm('Are you sure you want to delete this Faculty?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/faculty/delete",
        type: 'GET',
        data: { userid: param1} ,
         success: function(result){
            if(result == "ok"){
              $('#d-'+ param1).hide('slow');
            }
         }
      });
    }
  }

  function restorefaculty(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/faculty/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function permanentlydelfaculty(param1){
    if(confirm('Are you sure you want to delete this Faculty Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/faculty/permanentdel",
        type: 'GET',
        data: { userid: param1} ,
         success: function(result){
            if(result == "ok"){
              $('#d-'+ param1).hide('slow');
            }
         }
      });
    }
  }
  
</script>
<script>
        function VoucherSourcetoPrint(name,id) {
            return "<html><head><script>function step1(){\n" +
                    "setTimeout('step2()', 10);}\n" +
                    "function step2(){window.print();window.close()}\n" +
                    "</scri" + "pt></head><body onload='step1()'>\n" +
                    "<div style='position: relative;text-align: center;color: white;'><img src='<?php echo base_url('Uploads/landscape.jpg'); ?>' /><div style='position: absolute;bottom: 570px;right: 27%;font-size:100px;color:black;'>12-8-2019</div><h4 style='position: absolute;bottom: 450px;left: 27%;font-size:100px;color:black;'>" + name + "</h4></div></body></html>";
        }
        function VoucherPrint(vname, vid) {
            Pagelink = "about:blank";
            var pwa = window.open(Pagelink, "_new");
            pwa.document.open();
            pwa.document.write(VoucherSourcetoPrint(vname, vid));
            pwa.document.close();
        }
    </script>
</body>
</html>