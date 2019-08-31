 <?php 
 foreach($feedata as $key => $value){
  ?>
<div style="width:100%; border:1px solid red;height:300px;box-sizing: border-box;padding:30px;text-align:right;">
	<div style="display:block;width:100%;float:left;">
		<div style="float:left;">Name</div>
		<input type="text" value="<?php echo $feedata[$key]->student_name; ?>" style="width:90%;float:right;border-top:0;border-right:0;border-left:0;">
	</div>
	<br>
	<br>
	<div style="display:block;width:100%;float:left;">
		<div style="float:left;">Class</div>
		<input type="text" value="<?php echo $class[$key][0]->class_name ?>" style="width:90%;float:right;border-top:0;border-right:0;border-left:0;">
	</div>
</div>
<?php } ?>
<script>
	window.print();
</script>