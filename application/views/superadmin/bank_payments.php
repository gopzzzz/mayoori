

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">BANK PAYMENTS<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="<?php echo base_url().'bank_payments';?>">BANK PAYMENTS</a></li>



      </ol>



    </section><br>



  <style>

 

  table, td, th {

  border: 1px solid #cac6c6;

}



#example2 {

  border-collapse: separate;

}

.box-body{

    margin: 22px;

}

.divtext{

    margin-top: 21px;

}

  </style>



    <!-- Main content -->



    <section class="content">

      

		<div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">BANK PAYMENTS</h3>

			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





              <div class="box-tools">

                <!--<div class="input-group input-group-sm" style="width: 150px;">

                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">



                  <div class="input-group-btn">

                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                  </div>

                </div>-->

              </div>

            </div>

            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding row">

           
            <form name="myForm" id="myFormId" onsubmit="return validateForm1()" method="post" action="<?php echo site_url('bank_paymentsadd');?>" >
				

            <div class="col-sm-12">

            <div class="col-sm-3 labeltext divtext">

            <label>Date</label>

            </div>

            

            

            <div class="col-sm-3 divtext">

            <input class="form-control" type="text" name="date1view" value="<?php echo date('d-m-Y');?>" readonly>
            <input type="hidden" name="date1" value="<?php echo date('Y-m-d');?>" readonly>

            </div>

			<div class="col-sm-3 labeltext divtext">

            <label>Referal Number</label>

            </div>

            <div class="col-sm-3 divtext">

            <input class="form-control" name="refno1view" placeholder="Referal Number" value="BPAY<?php if($last_id==null){echo "1";}else{ foreach($last_id as $key3){ echo $key3->referalnumber + 1;}}?>" readonly>
            <input type="hidden" name="refno1" placeholder="Referal Number" value="<?php if($last_id==null){echo "1";}else{ foreach($last_id as $key3){ echo $key3->referalnumber + 1;}}?>" readonly>

           

            </div>

           <div class="col-sm-3 labeltext divtext"><label >Bank Account</label>

            </div>

            

            <div class="col-sm-3 divtext">

           <select name="bank1" class="form-control" id="bankaccount">

             <option value="0">select bank account</option>

             <?php foreach($bankaccount as $key1){?>

             <option value="<?php echo $key1->ba_id;?>"><?php echo  $key1->bank_name.'-'.substr($key1->ba_acnumber, -4);?></option>

             <?php } ?>

</select>

            </div>

           

			<div class="col-sm-3 labeltext divtext">

            <label>Bank Balance</label>

            </div>

            

           

            <div class="col-sm-3 divtext">

            <input class="form-control" name="bankbal" id="bankbalance" readonly>

            </div>

            </div>

			<div class="col-sm-12">

      <div class="col-sm-3 labeltext divtext">
							<label class="exampleInputEmail1">PAYMENT</label>
              </div>
              <div class="col-sm-3 divtext">
							<select class="form-control" name="payorrepton" id="pron">
                    <option value="0">Select</option>
                    <option value="1">Normal</option>
                  <option value="2">Against B2B sale</option>
                    <option value="3">Against B2C sale</option>
                  <option value="4">Against Purchase Bill</option>
                  <option value="5">Salary Ledger</option>
                  <option value="7">Sales Order</option>
              </select>
							</div>

         

            <div class="col-sm-3 labeltext divtext">

            <label>Ledger</label>

            </div>

            <div class="col-sm-3 divtext">

          <select name="ledger1" class="form-control" id="ledger" >

          <option value="0">Select Ledger</option>

            <?php foreach($ledger as $key2){?>

            <option value="<?php echo $key2->le_id ;?>"><?php echo $key2->le_name;?></option>

            <?php } ?>

             </select>

            </div>

			<div class="col-sm-3 labeltext divtext">

            <label>Ledger Balance</label>

            </div>

           

          

            <div class="col-sm-3 divtext">

            <input class="form-control" name="ledger_bal" id="ledgerbalance" readonly>

            </div>

            <div class="col-sm-3 labeltext divtext">

<label>Bill/Voucher Number</label>

</div>

<div class="col-sm-3 divtext">

<input class="form-control" name="vouchernum" placeholder="Voucher Number" required>

</div>

            </div>

            <div class="col-sm-12">

           

            <div class="col-sm-3 labeltext divtext">

            <label>Cheque Number</label>

            </div>

            <div class="col-sm-3 divtext">

            <input class="form-control" name="cheque1" placeholder="Cheque Number">

            </div>

			<div class="col-sm-3 labeltext divtext">

            <label>Amount</label>

            </div>

			<div class="col-sm-3 divtext">

            <input class="form-control" name="amount1" placeholder="Amount">

            </div>

            

            </div>

            

            <div class="col-sm-12">

            

            <!--<div class="col-sm-3 labeltext divtext">

            <label>Amount</label>

            </div>

            <div class="col-sm-3 divtext">

            <input class="form-control" name="amount" placeholder="Amount">

            </div>-->

            </div>

            <div class="col-sm-12">

            <div class="col-sm-3 labeltext divtext">

            <label>Narration</label>

            </div>

            <div class="col-sm-3 divtext">

            <textarea class="form-control" name="narration" placeholder="Narration"></textarea>

            </div>

            <div class="col-sm-3 labeltext divtext">

            <label>Cheque Date</label>

            </div>

            

            

            <div class="col-sm-3 divtext">

            <input class="form-control" name="chqudate1" type="date" placeholder="Date">

            </div>

            </div>

            <div class="col-sm-12">

            <div class="col-sm-3 divtext"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Create Ledger</buuton></div>

            <div class="col-sm-8 divtext"></div>
            <input type="hidden" name="savetype" id="savetype" />
            <div class="col-sm-2 divtext"><button type="submit" id="saveprint" name="submit"  class="btn btn-success btn-lg">SAVE & PRINT</button></div>

			<!--<div class="col-sm-1 divtext"><button type="button" class="btn btn-warning btn-lg" onclick="window.location.href = 'http://localhost/mayoori_sw/bank_paymentslist'"></buuton></div>-->

            <div class="col-sm-1 divtext"><a href="<?php echo base_url('bank_paymentslist');?>"><input type="button" class="btn btn-warning btn-lg" value='View'></a></div>

			<div class="col-sm-1 divtext"><button type="submit"  id="saveonly" name="save" class="btn btn-info btn-lg">Save</buuton></div>

            </div>

       

            </form>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

		</div>

		

    <div class="modal fade" id="myModal" role="dialog">

					<div class="modal-dialog" style="width:80%;">

						<!-- Modal content-->

						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('bank_payments');?>>

						<div class="modal-content">

						

							<div class="modal-header">

								<button type="button" class="close" data-dismiss="modal">&times;</button>

								<h4 class="modal-title">Ledger Creation</h4>

							</div>

							<div class="col-sm-6" >

							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">

							  <h4 class="text-success">Ledger Details</h4>

							  <hr>

								<div class="col-sm-4">

								<label class="exampleInputEmail1" > Name</label>

								</div>

								<div class="form-group col-sm-8">

								<input type="text" class="form-control" name="name"  onkeyup="fullnamefunction()" id="fullname">

								</div>

								<div class="col-sm-4">

								<label class="exampleInputEmail1">Opening Balance</label>

								</div>

								<div class="form-group col-sm-8">

								<input type="text" class="form-control" name="opbal" >

								</div>

								<div class="col-sm-4">

								<label class="exampleInputEmail1">Payment Type</label>

								</div>

								<div class="form-group col-sm-8">

								<input type="radio" name="paytype" value="1">Debit

								<input type="radio" name="paytype" value="2">Credit

								</div>

								<div class="col-sm-4">

								<label class="exampleInputEmail1">Notes</label>

								</div>

								<div class="form-group col-sm-8">

								<textarea class="form-control" name="notes" onkeyup="addressfunction()"  id="note"></textarea>

								</div>

								

								<!--<div class="col-sm-4">

								<label class="exampleInputEmail1">Pincode</label>

								</div>

								<div class="form-group col-sm-8">

								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">

								</div>-->

								

								

								</div>

								

							</div>

							<div class="col-sm-6" >

							

								

								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">

								<h4 class="text-success">Account Group</h4>

							  <hr>

							    

								<div class="col-sm-4">

								<label class="exampleInputEmail1">Account Group Details</label>

								</div>

								<div class="form-group col-sm-8">

								<input type="hidden" class="form-control" name="acc_group" id="ac_group_id">

								<input type="text" class="form-control" id="ac_group" placeholder="Enter Accout Group"  >

								<div id="ac_grouplist"></div>

								</div>

								</div>

								

								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">

								<h4 class="text-success">Financial Year Details</h4>

							  <hr>

							    <!--<div class="col-sm-4">

								<label class="exampleInputEmail1">PAN number</label>

								</div>

								<div class="form-group col-sm-8">

								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan" >

								</div>-->

								<div class="col-sm-4">

								<label class="exampleInputEmail1">Financial Year</label>

								</div>

								<div class="form-group col-sm-8">

								<select class="form-control" name="year">

								<option>Select Financial Year</option>

								<?php foreach($fyear as $key1){ ?>

								<option value="<?php echo $key1->fy_id;?>"><?php echo $key1->fn_year;?></option>

								<?php } ?>

								</select>

								</div>

								</div>



								

						

							</div>

							

							



								

							<div class="modal-footer">

								<button type="submit" name="submit_ledger" class="btn btn-primary">Submit</button>

								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>

						</div>

						</form>

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

<script>

  $('#bankaccount').on('change',function(){

 var bankaccount=$(this).val();

 if(bankaccount!=""){

					$.ajax({

						type:"POST",

						url:'<?php echo site_url('Admin/bankaccountnumberfetch');?>',

						data: { bankaccount : bankaccount},

							success:function(res){console.log(res);

               

							//alert(res);

              if (res) {

                      var obj = JSON.parse(res)

					  $('#bankbalance').val(obj.ba_opbalance);

					 

                    } 

							},

					});	



   

				}

			

  });

  $('#ledger').on('change',function(){

 var ledger=$(this).val();

 if(ledger!=""){

					$.ajax({

						type:"POST",

						url:'<?php echo site_url('Admin/ledgerfetch');?>',

						data: { ledger : ledger},

							success:function(res){console.log(res);

               

							//alert(res);

              if (res) {

                      var obj = JSON.parse(res)

					  $('#ledgerbalance').val(obj.le_opbalance);

					 

                    } 

							},

					});	



   

				}

			

  });

  $('#ac_group').keyup(function(){	

			//alert("success");

			// exit;

			var customer=$('#ac_group').val();

			

				if(customer!=""){

					$.ajax({

						type:"POST",

						url:'<?php echo site_url('Admin/search_account_group');?>',

						data: { search : customer},

							success:function(res){console.log(res);

							//alert(res);

								if(res){

									$('#ac_grouplist').show();

									$('#ac_grouplist').html(res);

								}else{

									$('#ac_grouplist').html("");

								}

							},

					});	

				}

				else{

					$('#ac_grouplist').html("");

				}	

				

				

	});

  $("html").on('click','.subSelect1',function(){

		var acgpname = $(this).closest('tr').find('#id_SCR').val();

		

		var acgpid = $(this).closest('tr').find('#fff').val();

		

		

		

		

		$('#ac_group').val(acgpname);

		$('#ac_group_id').val(acgpid);

		

		

		$('#ac_grouplist').hide();	

		

	});

  function validateForm() {

 

 var fn = document.forms["myForm"]["name"].value;

 var letters  = /^[A-Z\s]+$/;

 var fn_count=fn.length;

 if(fn.match(letters) || fn_count==0 ){



 }

   else{

       alert("Capital letters only");

       return false;

   }

   var add=document.forms["myForm"]["notes"].value;

   var letters1 = /^[A-Z\s(,)]+$/;

   var note_count=add.length;

   if(add.match(letters) || note_count==0 ){



  }

   else{

       alert("Capital letters only");

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

 var address=document.getElementById("note").value;

 var addcount=address.length;

 var letters = /^[A-Z\s(,)]+$/;

 if(address.match(letters) || addcount==0){

    document.getElementById("note").style.color = "black";

    document.getElementById("note").style.border = "1px solid #d2d6de";

 

 }

 else {

   document.getElementById("note").style.color = "red";

   document.getElementById("note").style.border = "2px solid red";

 }

          

}

$('.ledgername').keyup(function(){

 var ledname=$(this).val();

 var lednamecount=ledname.length;

 var letters = /^[A-Z\s(,)]+$/;

 if(ledname.match(letters) || (lednamecount==0)){

   $('.ledgername').css("border","1px solid #d2d6de");

   $('.ledgername').css("color","black");

 }

 else{

   $('.ledgername').css("border","2px solid red");

   $('.ledgername').css("color","red");

 }

 //alert(namecount);

});

$('#pron').on('change',function(){
	   
     var pay_type = $(this).val();;  
   
     $.ajax({
      type: "POST",
      dataType: "json",
      url: '<?php echo site_url('Admin/getledgerdropdrown');?>',
      data: { pay_type: pay_type },
      success: function (res) {
                 
                  $('#ledger').empty();
                  var html_each='<option value="0">select</option>';
                  if(pay_type==1){
                      $.each( res, function( key, value ) {
html_each +='<option value="'+value.le_id+'">'+value.le_name+'</option>';
});
                  }else if(pay_type==4){
                    $.each( res, function( key, value ) {
html_each +='<option value="'+value.sup_id+'">'+value.sup_name+'</option>';
});
                  }else if(pay_type==5){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.stf_id+'">'+value.stf_name+'</option>';
				    });
				                        }else{
                      $.each( res, function( key, value ) {
html_each +='<option value="'+value.customer_id+'">'+value.cus_name+'('+value.cus_phonenumber+')</option>';
});  
$('#ledgerbalance').val(0);
                  }
 
  $('#ledger').append(html_each);  
   }
   });
 
  });
  $('#saveprint').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 2) {
				event.preventDefault();
				$('#savetype').val(1);
				$('#saveprint').click();
			}
		});
		$('#saveonly').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 1) {
				event.preventDefault();
				$('#savetype').val(2);
				$('#saveonly').click();
			}
		});

    function validateForm1() {
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
}
  </script>



</body>



</html>



