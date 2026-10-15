
 <?php $data['leftmenu']='suppliercreation'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Supplier Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'supplier';?>">Supplier Creation</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:80%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('supplier');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Supplier Creation</h4>
							</div>
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;">
							  <h4 class="text-success">Supplier Details</h4>
							  <hr>
							   <div class="col-sm-4">

								<label class="exampleInputEmail1">Supplier Code</label>
								</div>
								<div class="form-group col-sm-8">
								<?php foreach($supcount as $supkey){
								if($supkey->MyCount==0){
								?>
								<input type="text" class="form-control" name="code" value="1" readonly>
								<?php } else{ ?>

								<input type="text" class="form-control" name="code" value="<?php foreach($lastid as $suplastkey){echo ($suplastkey->sup_code)+1;}?>" readonly>

							    <?php }} ?>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" >Full Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name" onkeyup="fullnamefunction()" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1"> Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="sup_add" onkeyup="addressfunction()" id="add"></textarea>
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email Id</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email" onkeyup="emailfuncion()"  id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" onkeyup="myFunction1()" id="phnum" > 
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Mobile Number 1 </label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="mbnum" onkeyup="myFunction2()" id="mbnum" > 
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Mobile Number 2 </label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="mbnum2" > 
								</div>
								
								
								</div>

								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Bill</h4>
							  <hr>
							  
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Maintain Balance Bill By Bill</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio" name="mnbill" value="1" required>Yes
								<input type="radio" name="mnbill" value="2" required>No
								</div>
								
							</div>
								
								
							</div>

							<div class="col-sm-6" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;">
								<h4 class="text-success">Account Details</h4>
							  <hr>
							  <div class="col-sm-4">
								<label class="exampleInputEmail1">Bank Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="bank" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_number" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC Code</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" >
								</div>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">Payment Type</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio" name="crde" value="1" required>Debit
								<input type="radio" name="crde" value="2" required>Credit
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" >
								</div>
								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="gst" onkeyup="gstfunction()" id="gst" >
								</div>
								</div>

						
							</div>

							
						
							
								
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary" onclick="myFunction()">Submit</button>
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
              <h3 class="box-title">Supplier Creation</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
               <!-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
			  <thead>
                <tr>
                  <th>#</th>
				  <th>Supplier Code</th>
				  <th>Supplier Name</th>
				  <th>Address</th>
				  <th>Phone Number</th>
				  <th>Mobile Number</th>
				  <th>Email</th>
				  <th>GST</th>
				  <th>PAN</th>
				  <th>Bank</th>
				  <th>A/C No.</th>
				  <th>IFSC</th>
				  <th>Opening Balance</th>
				  <th>Maintain Balance Bill</th>
				  <th>Payment Type</th>
                 
				  <th>Action</th>
                  
                </tr>
				</thead>
				
				<?php
			$i=1;
			foreach($suplr as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td>SUP-<?php echo $key->sup_code;?></td>
				   <td><?php echo $key->sup_name;?></td>
					 <td><?php echo $key->sup_address;?></td>
					  <td><?php echo $key->sup_phoneno;?></td>
					   <td><?php echo $key->sup_mobileno;?></td>
					   <td><?php echo $key->sup_email;?></td>
				  <td><?php echo $key->sup_gst;?></td>
				   <td><?php echo $key->sup_pan;?></td>
					 <td><?php echo $key->sup_bank;?></td>
					  <td><?php echo $key->sup_acno;?></td>
					   <td><?php echo $key->sup_ifsc;?></td>
					   <td><?php echo $key->sup_opbalance;?></td>
					   <td><?php echo $key->sup_mainbill;?></td>
					   <td><?php echo $key->sup_paytype;?></td>                 
                  <td><?php echo anchor('del_supplier/'.$key->sup_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->sup_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->sup_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:80%;">
					 <?php
    $id=$key->sup_id;
    $edit_area=$this->Admin_model->supplier_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm_edit" onsubmit="return validateFormedit()" <?php echo form_open_multipart('supplier');?>>
						<div class="modal-content" >
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Supplier Registration</h4>
							</div>
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;">
							  <h4 class="text-success">Supplier Details</h4>
							  <hr>
							  <input type="hidden" class="form-control" name="sup_id" value="<?php echo $key2->sup_id;?>"/>
							  <div class="col-sm-4">
								<label class="exampleInputEmail1">Supplier Code</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="code" value="<?php echo $key2->sup_code;?>" readonly>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" >Full Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control supnameedit" name="name" value="<?php echo $key2->sup_name;?>" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1"> Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control supaddedit" name="sup_add"  id="add"><?php echo $key2->sup_address;?></textarea>
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email Id</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control supemailedit" name="email" value="<?php echo $key2->sup_email;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control supphnoedit" name="phnum" value="<?php echo $key2->sup_phoneno;?>" id="phnum" > 
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Mobile Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control supmobedit" name="mbnum" value="<?php echo $key2->sup_mobileno;?>" id="phnum" > 
								</div>
								
								
								</div>

								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Bill</h4>
							  <hr>
							   
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Maintain Balance Bill By Bill</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio"  name="mnbill" value="1" <?php if($key2->sup_mainbill==1){ ?> checked=checked <?php } ?>  />Yes
								<input type="radio"  name="mnbill" value="2" <?php if($key2->sup_mainbill==2) {?> checked=checked <?php } ?> />No
								</div>
								
							</div>
								
								
							</div>
							<div class="col-sm-6" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;">
								<h4 class="text-success">Account Details</h4>
							  <hr>
							  <div class="col-sm-4">
								<label class="exampleInputEmail1">Bank Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control supbankedit" value="<?php echo $key2->sup_bank;?>" name="bank" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_number" value="<?php echo $key2->sup_acno;?>" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC Code</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" value="<?php echo $key2->sup_ifsc;?>">
								</div>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">Payment Type</label>
								</div>
								<div class="form-group col-sm-8">
                                <input type="radio"  name="crde" value="1" <?php if($key2->sup_paytype==1) {?> checked=checked <?php } ?>  />Credit
								<input type="radio"  name="crde" value="2" <?php if($key2->sup_paytype==2) {?> checked=checked <?php } ?> />Debit
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" value="<?php echo $key2->sup_opbalance;?>">
								</div>
								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control suppanedit" name="pan" value="<?php echo $key2->sup_pan;?>" id="pan" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control supgstedit" name="gst" value="<?php echo $key2->sup_gst;?>" onkeyup="gstfunction()" id="gst" >
								</div>
								</div>

						
							</div>
							
							
							
							<div class="modal-footer">
								<button type="submit" name="submit_edit" class="btn btn-primary" onclick="myFunction()">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
					
		</div>
					
				
				
				
			
	  
	  
	
               
                
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

  if(confirm("Do you really want to delete this apartment?")){



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
  var address=document.forms["myForm"]["sup_add"].value;
 
  var add_count=address.length;
  var letters1 = /^[A-Z\s(,)0-9]+$/;
  if(address.match(letters1) || add_count==0){
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
   else{
  	alert("Use capital letters,space and commas");
  	return false;
  }
  
  var fn = document.forms["myForm"]["name"].value;
  var fn_count=fn.length;
  
  var letters  = /^[A-Z\s]+$/;
   
  if(fn.match(letters) || fn_count==0){
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
  else{
  	alert("Use capital letters and space");
  	return false;
  }
 
  var eml=document.forms["myForm"]["email"].value;
  var letters2 =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var em1_count=eml.length;
  if(eml.match(letters2) || em1_count==0){
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
  else{
  	alert("Email is incorrect plesae input email format");
  	return false;
  }
  var pnum=document.forms["myForm"]["phnum"].value;
  var phcount=pnum.length;
   if(phcount == 10 || phcount == 0){
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
  else{
  	alert("Phone Number is incorrect please check");
  	return false;
  }
  var mnum=document.forms["myForm"]["mbnum"].value;
  var mbcount=mnum.length;
  if(mbcount == 10 || mbcount == 0){
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
  else{
  	alert("Mobile Number is incorrect please check");
  	return false;
  }
  var pannum=document.forms["myForm"]["pan"].value;
  var pancount=pannum.length;
   if(pancount==10 || pancount==0){
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
  else{
  	alert("PAN Number is incorrect please check");
  	return false;
  }

  var x = document.forms["myForm"]["gst"].value;
  var count_gst=x.length;

  if (count_gst == 15 || count_gst == 0) {
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
  }
  else{
  	alert("GST is incorrect please check");
  	return false;
  }
 
 

}




function myFunction1(){
	var y = document.getElementById("phnum").value;
   var count_phone=y.length;

   if(count_phone==10 || count_phone==0 ){
    
   	 document.getElementById("phnum").style.color = "black";
   	  document.getElementById("phnum").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("phnum").style.color = "red";
     document.getElementById("phnum").style.border = "2px solid red";
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
	var letters = /^[A-Z\s(,)0-9]+$/;
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
$('.supnameedit').keyup(function(){
	var name=$(this).val();
	var namecount=name.length;
	var letters = /^[A-Z\s]+$/;
	if(name.match(letters) || (namecount==0)){
		$('.supnameedit').css("border","1px solid #d2d6de");
		$('.supnameedit').css("color","black");
	}
	else{
		$('.supnameedit').css("border","2px solid red");
		$('.supnameedit').css("color","red");
	}
	//alert(namecount);
});
$('.supaddedit').keyup(function(){
	var addsup=$(this).val();
	var addsupcount=addsup.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(addsup.match(letters) || (addsupcount==0)){
		$('.supaddedit').css("border","1px solid #d2d6de");
		$('.supaddedit').css("color","black");
	}
	else{
		$('.supaddedit').css("border","2px solid red");
		$('.supaddedit').css("color","red");
	}
	//alert(namecount);
});
$('.supemailedit').keyup(function(){
	//alert();
	var supemail=$(this).val();
	var supemailcount=supemail.length;
	var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(supemail.match(letters) || (supemailcount==0)){
		$('.supemailedit').css("border","1px solid #d2d6de");
		$('.supemailedit').css("color","black");
	}
	else{
		$('.supemailedit').css("border","2px solid red");
		$('.supemailedit').css("color","red");
	}
	//alert(namecount);
});
$('.supphnoedit').keyup(function(){
	//alert();
	var supphone=$(this).val();
	var supphonecount=supphone.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(supphonecount==10 || (supphonecount==0)){
		$('.supphnoedit').css("border","1px solid #d2d6de");
		$('.supphnoedit').css("color","black");
	}
	else{
		$('.supphnoedit').css("border","2px solid red");
		$('.supphnoedit').css("color","red");
	}
	//alert(namecount);
});
$('.supmobedit').keyup(function(){
	//alert();
	var supmobi=$(this).val();
	var supmobicount=supmobi.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(supmobicount==10 || (supmobicount==0)){
		$('.supmobedit').css("border","1px solid #d2d6de");
		$('.supmobedit').css("color","black");
	}
	else{
		$('.supmobedit').css("border","2px solid red");
		$('.supmobedit').css("color","red");
	}
	//alert(namecount);
});
$('.supbankedit').keyup(function(){
	var banksup=$(this).val();
	var banksupcount=banksup.length;
	var letters = /^[A-Z\s]+$/;
	if(banksup.match(letters) || (banksupcount==0)){
		$('.supbankedit').css("border","1px solid #d2d6de");
		$('.supbankedit').css("color","black");
	}
	else{
		$('.supbankedit').css("border","2px solid red");
		$('.supbankedit').css("color","red");
	}
	//alert(namecount);
});
$('.suppanedit').keyup(function(){
	//alert();
	var pansup=$(this).val();
	var pansupcount=pansup.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(pansupcount==10 || (pansupcount==0)){
		$('.suppanedit').css("border","1px solid #d2d6de");
		$('.suppanedit').css("color","black");
	}
	else{
		$('.suppanedit').css("border","2px solid red");
		$('.suppanedit').css("color","red");
	}
	//alert(namecount);
});
$('.supgstedit').keyup(function(){
	//alert();
	var gstsup=$(this).val();
	var gstsupcount=gstsup.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(gstsupcount==10 || (gstsupcount==0)){
		$('.supgstedit').css("border","1px solid #d2d6de");
		$('.supgstedit').css("color","black");
	}
	else{
		$('.supgstedit').css("border","2px solid red");
		$('.supgstedit').css("color","red");
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

