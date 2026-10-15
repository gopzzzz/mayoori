
 
 <?php $data['leftmenu']='staffcreation'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">All Item Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'staff';?>">All Item</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
	<?php
    /*if ($this->session->flashdata( 'error_msg' )) {
        echo $this->session->flashdata('error_msg');
    }*/
	if($msg==0)
	{
		echo 'Uploaded Successffully';
	}
	elseif($msg==1)
	{
	echo $this->session->flashdata('error_msg');
	}
	elseif($msg==3)
	{
	echo '';
	}

    ?>
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:80%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('all_item');?>>
						
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">All Item Creation</h4>
							</div>
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Item Details</h4>
							  <hr>
							   
								
								
								
								
								
								
								
								
								
								
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Add Excel</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="file" class="form-control" name="userfile" required>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Select Table</label>
								</div>
								<div class="form-group col-sm-8">
								<select class="form-control" name="tablename" required>
								<option value="tbl_sales_master">sales master</option>
								<option value="tbl_sales_trans">sales items</option>
								</select>
								</div>
								
								
								
								</div>
							    
								
							</div>

							<div class="col-sm-6" >

								
								
								

								
						
							</div>
							
							
						    <div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							
								
							
						</div>
						</form>
					</div>
		</div>
		
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Item</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
			  <thead>
                <tr>
                  <th>#</th>
				  <th>Id</th>
				  <th>File Name</th>
				  
                 
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
				$i=1;
				foreach($item as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->id;?></td>
				  <td><?php echo $key->file;?></td>
				  

                 
                  <td><?php echo anchor('delete_item/'.$key->id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <a href="<?php echo base_url('readexcel/').$key->id;?>"><button type="button" class="btn btn-info btn-sm" >update</button></a>
				  <!-- <a href="<?php echo base_url('importsale/').$key->id;?>"><button type="button" class="btn btn-info btn-sm" >Import</button></a>
				  <a href="<?php echo base_url('clearsale/').$key->id;?>"><button type="button" class="btn btn-info btn-sm" >Clear</button></a> -->
				 </td>
                </tr>
				
		
				
					
				<?php
				$i++;
				}
				?>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
        </div>
		</div>
     
    </section>


<script>

  function deletechecked(){
  if(confirm("Do you really want to delete?")){




return true;



  } 

  else{

    

    return false;

  }

    

  }

  

 

  

  </script>

<!-- jQuery 3 -->

<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->

<script src="<?php echo base_url();?>admin_styles/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url();?>admin_styles/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url();?>admin_styles/dist/js/demo.js"></script>
<script>
function validateForm() {
 var fn = document.forms["myForm"]["name"].value;
 var fn_count=fn.length;
 var letters  = /^[A-Z\s]+$/;
 if(fn.match(letters) || fn_count==0){
  	
  }
  else{
  	alert("Use capital letters and space");
  	return false;
  }
  var add=document.forms["myForm"]["stf_add"].value;
  var add_count=add.length;
  var letters1 = /^[A-Z\s(,)]+$/;
  if(add.match(letters1) || add_count==0){
  	
  }
  else{
  	alert("Use capital letters,space and commas");
  	return false;
  }
  var place=document.forms["myForm"]["place"].value;
  var place_count=place.length;
  
  if(place.match(letters) || place_count==0){
  	
  }
  else{
  	alert("Use Place name capital letters Only");
  	return false;
  }
  var dist=document.forms["myForm"]["dist"].value;
  var dist_count=dist.length;
  
  if(dist.match(letters) || dist_count==0){
  	
  }
  else{
  	alert("Use District name capital letters Only");
  	return false;
  }
  var email_1=document.forms["myForm"]["email"].value;
  var email_count=email_1.length;
  var letters_email=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email_1.match(letters_email) || email_count==0){
  	
  }
  else{
  	alert("incorrect email check it");
  	return false;
  }
  var ph=document.forms["myForm"]["phnum"].value;
  var ph_count =ph.length; 
  if(ph_count==10 || ph_count==0){

  }
  else{
  	alert("incorrect Phone number");
  	return false;
  }
  var mob=document.forms["myForm"]["mbnum"].value;
  var mob_count =mob.length; 
  if(mob_count==10 || mob_count==0){

  }
  else{
  	alert("incorrect Mobile number");
  	return false;
  }
  var adhar=document.forms["myForm"]["adhr"].value;
  var adhar_count=adhar.length;
  if(adhar_count==12 || adhar_count==0){

  }
  else{
  	alert("incorrect Adhar number");
  	return false;
  }
  var br_name=document.forms["myForm"]["branch"].value;
  var br_namecount=br_name.length;
  
  if(br_name.match(letters) || br_namecount==0){
  	
  }
  else{
  	alert("Use Branch in capital letters Only");
  	return false;
  }
    var dipartname=document.forms["myForm"]["dept"].value;
  var dipart_count=dipartname.length;
  
  if(dipartname.match(letters) || dipart_count==0){
  	
  }
  else{
  	alert("Use Department in capital letters Only");
  	return false;
  }
  var position=document.forms["myForm"]["postn"].value;
  var position_count=position.length;
  
  if(position.match(letters) || position_count==0){
  	
  }
  else{
  	alert("Use Position in capital letters Only");
  	return false;
  }
  var bank1=document.forms["myForm"]["bank"].value;
  var bank_count=bank1.length;
  
  if(bank1.match(letters) || bank_count==0){
  	
  }
  else{
  	alert("Use Bank name in capital letters Only");
  	return false;
  }
  var branchname=document.forms["myForm"]["branch_name"].value;
  var branchname_count=branchname.length;
  
  if(branchname.match(letters) || branchname_count==0){
  	
  }
  else{
  	alert("Use Bank Branch  capital letters Only");
  	return false;
  }
  var accountname=document.forms["myForm"]["ac_name"].value;
  var accountname_count=accountname.length;
  
  if(accountname.match(letters) || accountname_count==0){
  	return true;
  }
  else{
  	alert("Use Account Name capital letters Only");
  	return false;
  }
  }
 
 
  
 
function validateFormedit() {
  var x = document.forms["myForm_edit"]["gst"].value;
 
  var count_gst=x.length;
  
  if (count_gst !== 15) {
    alert("GST number is invalid");
    return false;
  }
 
}
/*function myFunction() {
  var x = document.getElementById("pin").value;
   var count_pin=x.length;

   if(count_pin==6 || count_pin==0){
    
    document.getElementById("pin").style.color = "black";
   	document.getElementById("pin").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("pin").style.color = "red";
   	document.getElementById("pin").style.border = "2px solid red";
   	
   }
  
}*/
function myFunction1(){
	var y = document.getElementById("phnum_1").value;
   var count_phone=y.length;

   if(count_phone==10 || count_phone==0 ){
    
   	 document.getElementById("phnum_1").style.color = "black";
   	  document.getElementById("phnum_1").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("phnum_1").style.color = "red";
     document.getElementById("phnum_1").style.border = "2px solid red";
   }
}
function myFunction2(){
	var y = document.getElementById("mbnum").value;
   var count_mobile=y.length;

   if(count_mobile==10 || count_mobile==0 ){
    
   	 document.getElementById("mbnum").style.color = "black";
   	  document.getElementById("mbnum").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("mbnum").style.color = "red";
     document.getElementById("mbnum").style.border = "2px solid red";
   }
}
function myFunction3(){
	var y = document.getElementById("adhr").value;
   var count_adhar=y.length;

   if(count_adhar==12 || count_adhar==0 ){
    
   	 document.getElementById("adhr").style.color = "black";
   	  document.getElementById("adhr").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("adhr").style.color = "red";
     document.getElementById("adhr").style.border = "2px solid red";
   }
}
function panfunction(){
	var p = document.getElementById("pan").value;
   var pancount=p.length;

   if(pancount==10 || pancount==0 ){
    
   	 document.getElementById("pan").style.color = "black";
   	  document.getElementById("pan").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("pan").style.color = "red";
     document.getElementById("pan").style.border = "2px solid red";
   }
}
function gstfunction(){
	var g = document.getElementById("gst").value;
   var gstcount=g.length;

   if(gstcount==15 || gstcount==0 ){
    
   	 document.getElementById("gst").style.color = "black";
   	  document.getElementById("gst").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("gst").style.color = "red";
     document.getElementById("gst").style.border = "2px solid red";
   }
}
function fullnamefunction(){
	var name=document.getElementById("fullname").value;
	var namecount=name.length;
	var letters = /^[A-Z\s]+$/;

	if(name.match(letters) || namecount==0){
     document.getElementById("fullname").style.color = "black";
     document.getElementById("fullname").style.border = "1px solid #d2d6de";
	}
	else {
		 document.getElementById("fullname").style.color = "red";
		 document.getElementById("fullname").style.border = "2px solid red";

	}

}
function addressfunction(){
	var address=document.getElementById("add").value;
	var addcount=address.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(address.match(letters) || addcount==0){
     document.getElementById("add").style.color = "black";
     document.getElementById("add").style.border = "1px solid #d2d6de";
	
	}
	else {
		document.getElementById("add").style.color = "red";
		document.getElementById("add").style.border = "2px solid red";
	}
           
}
function emailfuncion(){
	var email=document.getElementById("em").value;
	var emailcount=email.length;
	var letters=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if(email.match(letters) || emailcount==0){
		document.getElementById("em").style.color = "black";
        document.getElementById("em").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("em").style.color = "red";
		document.getElementById("em").style.border = "2px solid red";
	}
}
function placefunction(){
	var plc=document.getElementById("place").value;
	var plccount=plc.length;
	var letters = /^[A-Z\s]+$/;

	if(plc.match(letters) || plccount==0){
		document.getElementById("place").style.color = "black";
        document.getElementById("place").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("place").style.color = "red";
		document.getElementById("place").style.border = "2px solid red";
	}
}
function districtfunction(){
	var distri=document.getElementById("dist").value;
	//alert(distri);
	var distri_count=distri.length;
	var letters = /^[A-Z\s]+$/;

	if(distri.match(letters) || distri_count==0){
		document.getElementById("dist").style.color = "black";
        document.getElementById("dist").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("dist").style.color = "red";
		document.getElementById("dist").style.border = "2px solid red";
	}
}
function branchfunction(){
	var branch=document.getElementById("bran").value;
	//alert(distri);
	var branch_count=branch.length;
	var letters = /^[A-Z\s]+$/;

	if(branch.match(letters) || branch_count==0){
		document.getElementById("bran").style.color = "black";
        document.getElementById("bran").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("bran").style.color = "red";
		document.getElementById("bran").style.border = "2px solid red";
	}
}
function departmentfunction(){
	var department=document.getElementById("depart").value;
	//alert(distri);
	var department_count=department.length;
	var letters = /^[A-Z\s]+$/;

	if(department.match(letters) || department_count==0){
		document.getElementById("depart").style.color = "black";
        document.getElementById("depart").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("depart").style.color = "red";
		document.getElementById("depart").style.border = "2px solid red";
	}
}
function positionfunction(){
	var position=document.getElementById("posi").value;
	//alert(distri);
	var position_count=position.length;
	var letters = /^[A-Z\s]+$/;

	if(position.match(letters) || position_count==0){
		document.getElementById("posi").style.color = "black";
        document.getElementById("posi").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("posi").style.color = "red";
		document.getElementById("posi").style.border = "2px solid red";
	}
}
function banckfunction(){
	var bank=document.getElementById("bank").value;
	//alert(distri);
	var bank_count=bank.length;
	var letters = /^[A-Z\s]+$/;

	if(bank.match(letters) || bank_count==0){
		document.getElementById("bank").style.color = "black";
        document.getElementById("bank").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("bank").style.color = "red";
		document.getElementById("bank").style.border = "2px solid red";
	}
}
function bankbranchfunction(){
	var b_branch=document.getElementById("bnkbranch").value;
	//alert(distri);
	var b_branchcount=b_branch.length;
	var letters = /^[A-Z\s]+$/;

	if(b_branch.match(letters) || b_branchcount==0){
		document.getElementById("bnkbranch").style.color = "black";
        document.getElementById("bnkbranch").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("bnkbranch").style.color = "red";
		document.getElementById("bnkbranch").style.border = "2px solid red";
	}
}
function accholdnamefunction(){
	var accountholdername=document.getElementById("achname").value;
	//alert(distri);
	var acholna_count=accountholdername.length;
	var letters = /^[A-Z\s]+$/;

	if(accountholdername.match(letters) || acholna_count==0){
		document.getElementById("achname").style.color = "black";
        document.getElementById("achname").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("achname").style.color = "red";
		document.getElementById("achname").style.border = "2px solid red";
	}
}
$('.staffname').keyup(function(){
	var name=$(this).val();
	var namecount=name.length;
	var letters = /^[A-Z\s]+$/;
	if(name.match(letters) || (namecount==0)){
		$('.staffname').css("border","1px solid #d2d6de");
		$('.staffname').css("color","black");
	}
	else{
		$('.staffname').css("border","2px solid red");
		$('.staffname').css("color","red");
	}
	//alert(namecount);
});
$('.staffadd').keyup(function(){
	var addstaf=$(this).val();
	var addstafcount=addstaf.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(addstaf.match(letters) || (addstafcount==0)){
		$('.staffadd').css("border","1px solid #d2d6de");
		$('.staffadd').css("color","black");
	}
	else{
		$('.staffadd').css("border","2px solid red");
		$('.staffadd').css("color","red");
	}
	//alert(namecount);
});
$('.staffplace').keyup(function(){
	var stplace=$(this).val();
	var stplacecount=stplace.length;
	var letters = /^[A-Z\s]+$/;
	if(stplace.match(letters) || (stplacecount==0)){
		$('.staffplace').css("border","1px solid #d2d6de");
		$('.staffplace').css("color","black");
	}
	else{
		$('.staffplace').css("border","2px solid red");
		$('.staffplace').css("color","red");
	}
	//alert(namecount);
});
$('.staffdist').keyup(function(){
	var stdist=$(this).val();
	var stdistcount=stdist.length;
	var letters = /^[A-Z\s]+$/;
	if(stdist.match(letters) || (stdistcount==0)){
		$('.staffdist').css("border","1px solid #d2d6de");
		$('.staffdist').css("color","black");
	}
	else{
		$('.staffdist').css("border","2px solid red");
		$('.staffdist').css("color","red");
	}
	//alert(namecount);
});
$('.staffemail').keyup(function(){
	//alert();
	var stafmail=$(this).val();
	var stafmailcount=stafmail.length;
	var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(stafmail.match(letters) || (stafmailcount==0)){
		$('.staffemail').css("border","1px solid #d2d6de");
		$('.staffemail').css("color","black");
	}
	else{
		$('.staffemail').css("border","2px solid red");
		$('.staffemail').css("color","red");
	}
	//alert(namecount);
});
$('.staffphnum').keyup(function(){
	//alert();
	var stphnum=$(this).val();
	var stphnumcount=stphnum.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(stphnumcount==10 || (stphnumcount==0)){
		$('.staffphnum').css("border","1px solid #d2d6de");
		$('.staffphnum').css("color","black");
	}
	else{
		$('.staffphnum').css("border","2px solid red");
		$('.staffphnum').css("color","red");
	}
	//alert(namecount);
});
$('.staffmobnum').keyup(function(){
	//alert();
	var stmob=$(this).val();
	var stmobcount=stmob.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(stmobcount==10 || (stmobcount==0)){
		$('.staffmobnum').css("border","1px solid #d2d6de");
		$('.staffmobnum').css("color","black");
	}
	else{
		$('.staffmobnum').css("border","2px solid red");
		$('.staffmobnum').css("color","red");
	}
	//alert(namecount);
});
$('.staffadhar').keyup(function(){
	//alert();
	var stadhar=$(this).val();
	var stadharcount=stadhar.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(stadharcount==12 || (stadharcount==0)){
		$('.staffadhar').css("border","1px solid #d2d6de");
		$('.staffadhar').css("color","black");
	}
	else{
		$('.staffadhar').css("border","2px solid red");
		$('.staffadhar').css("color","red");
	}
	//alert(namecount);
});
$('.staffbranch').keyup(function(){
	var stbranch=$(this).val();
	var stbranchcount=stbranch.length;
	var letters = /^[A-Z\s]+$/;
	if(stbranch.match(letters) || (stbranchcount==0)){
		$('.staffbranch').css("border","1px solid #d2d6de");
		$('.staffbranch').css("color","black");
	}
	else{
		$('.staffbranch').css("border","2px solid red");
		$('.staffbranch').css("color","red");
	}
	//alert(namecount);
});
$('.staffdepar').keyup(function(){
	var stdepar=$(this).val();
	var stdeparcount=stdepar.length;
	var letters = /^[A-Z\s]+$/;
	if(stdepar.match(letters) || (stdeparcount==0)){
		$('.staffdepar').css("border","1px solid #d2d6de");
		$('.staffdepar').css("color","black");
	}
	else{
		$('.staffdepar').css("border","2px solid red");
		$('.staffdepar').css("color","red");
	}
	//alert(namecount);
});
$('.staffposi').keyup(function(){
	var stpos=$(this).val();
	var stposcount=stpos.length;
	var letters = /^[A-Z\s]+$/;
	if(stpos.match(letters) || (stposcount==0)){
		$('.staffposi').css("border","1px solid #d2d6de");
		$('.staffposi').css("color","black");
	}
	else{
		$('.staffposi').css("border","2px solid red");
		$('.staffposi').css("color","red");
	}
	//alert(namecount);
});
$('.staffbank').keyup(function(){
	var stbank=$(this).val();
	var stbankcount=stbank.length;
	var letters = /^[A-Z\s]+$/;
	if(stbank.match(letters) || (stbankcount==0)){
		$('.staffbank').css("border","1px solid #d2d6de");
		$('.staffbank').css("color","black");
	}
	else{
		$('.staffbank').css("border","2px solid red");
		$('.staffbank').css("color","red");
	}
	//alert(namecount);
});
$('.staffbankbranch').keyup(function(){
	var stbankbrnch=$(this).val();
	var stbankbrnchcount=stbankbrnch.length;
	var letters = /^[A-Z\s]+$/;
	if(stbankbrnch.match(letters) || (stbankbrnchcount==0)){
		$('.staffbankbranch').css("border","1px solid #d2d6de");
		$('.staffbankbranch').css("color","black");
	}
	else{
		$('.staffbankbranch').css("border","2px solid red");
		$('.staffbankbranch').css("color","red");
	}
	//alert(namecount);
});
$('.staffacname').keyup(function(){
	var stacname=$(this).val();
	var stacnamecount=stacname.length;
	var letters = /^[A-Z\s]+$/;
	if(stacname.match(letters) || (stacnamecount==0)){
		$('.staffacname').css("border","1px solid #d2d6de");
		$('.staffacname').css("color","black");
	}
	else{
		$('.staffacname').css("border","2px solid red");
		$('.staffacname').css("color","red");
	}
	//alert(namecount);
});
</script>
 
   <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/dbjs/jquery.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  })
</script>
</body>

</html>

