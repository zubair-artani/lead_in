<?php include('inc/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/croppie.css">
<?php include('inc/sidebar.php'); ?>  
<?php include('inc/functions.php'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($page_status == 'view'){ ?>
          All Registration
        <?php } else if($page_status == 'add') { ?>
           Add New Register
         <?php } ?>
        <!-- <small>Dashboard Controllers</small> -->
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Welcome/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Register</li>
      </ol>
      
      <br>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($page_status == 'view'){
        showRegistration($data, $currentedu,$search_data);
      } else if($page_status == 'viewTrash'){
        if($data == 0 || $currentedu == 0){
          echo "No Record Found";
        } else {
          viewTrashRegistration($data,$currentedu);
        }
        // echo "<pre>";
        // print_r($data);
      } else if($page_status == 'add') {
        $role = $this->session->userdata('role');
        addRegistraionForm($religion,$education,$last_edu, $role);
      } else if($page_status == 'edit') {
        $role = $this->session->userdata('role');
        editRegistraion($id,$query,$religion,$currentedu,$lastedu, $role);

      }
      ?>
    </section>
    <!-- /.content -->
  </div>


<div id="uploadimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload & Crop Image</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-8 text-center">
              <div id="image_demo" style="width:350px; margin-top:30px"></div>
            </div>
            <div class="col-md-4" style="padding-top:30px;">
              <br />
              <br />
              <br/>
              <button class="btn btn-success crop_image">Crop & Upload Image</button>
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>
<script>
  $(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"<?php echo base_url(); ?>/upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          var imgsrc = document.getElementById('uploaded_image').value += '/' + data;
          document.getElementById('blah').src = imgsrc;
          // alert(data);
        }
      });
    })
  });

});

</script>


<?php if($page_status == 'add'){ ?>
<script>
  function pageleave(){
    return "Write something clever here...";

  }
</script>
<?php } ?>
<script>
  function deleteregistration(param1){
    if(confirm('Are you sure you want to delete this registration?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/registration/delete",
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

  function retoreregistration(param1){
    $.ajax({
      url: "http://[::1]/lead_in/index.php/Welcome/registration/restore",
      type: 'GET',
      data: { userid: param1} ,
       success: function(result){
          if(result == "ok"){
            $('#d-'+ param1).hide('slow');
          }
       }
    });
  }
  function permanentlydelregistration(param1){
    if(confirm('Are you sure you want to delete this registration Parmenently?')){
      $.ajax({
        url: "http://[::1]/lead_in/index.php/Welcome/registration/remove",
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
</body>
</html>