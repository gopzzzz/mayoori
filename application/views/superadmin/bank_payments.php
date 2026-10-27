

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  
<!-- Modern blue-and-white theme matching the other redesigned pages -->
<style>
.content-wrapper{background:#f4f7fb;}
.content-header h1{color:#1f4e79;font-weight:700;letter-spacing:.2px;}
.content-header h1 small{color:#5c7894;}
.content .box{border-top:3px solid #3c8dbc;border-radius:6px;box-shadow:0 2px 12px rgba(30,70,110,.08);background:#fff;}
.content .box-header{padding:15px 18px;border-bottom:1px solid #e5edf5;}
.content .box-title,.content .modal-title{color:#1f4e79;font-weight:700;}
.content .box-body{padding:15px;}
.content .divtext{margin-top:14px;margin-bottom:8px;}
.content label{color:#334e68;font-weight:600;}
.content .form-control{border:1px solid #cbd7e3;border-radius:4px;box-shadow:none;min-height:36px;}
.content .form-control:focus{border-color:#3c8dbc;box-shadow:0 0 0 2px rgba(60,141,188,.12);}
.content textarea.form-control{min-height:70px;}
.content .btn-primary,.content .btn-info,.content .btn-success,.content .btn-warning{border-radius:4px;box-shadow:none;font-weight:600;}
/* Use blue for every action button; keep delete/danger buttons red. */
.content .btn-primary,
.content .btn-info,
.content .btn-success,
.content .btn-warning {
    background: #287db5;
    border-color: #287db5;
    color: #fff;
}
.content .btn-primary:hover,
.content .btn-info:hover,
.content .btn-success:hover,
.content .btn-warning:hover,
.content .btn-primary:focus,
.content .btn-info:focus,
.content .btn-success:focus,
.content .btn-warning:focus {
    background: #1f6798;
    border-color: #1f6798;
    color: #fff;
}
.content .btn-danger,
.content .btn-danger:hover,
.content .btn-danger:focus {
    background: #d9534f;
    border-color: #d43f3a;
    color: #fff;
}
.content table.table{width:100%;background:#fff;border-collapse:collapse;margin-bottom:12px;}
.content table.table>thead>tr>th{background:#eaf3fb;color:#214f78;font-weight:700;white-space:nowrap;border:1px solid #c9d9e8!important;padding:10px 8px;vertical-align:middle;}
.content table.table>tbody>tr>td{border:1px solid #d5e0ea!important;padding:8px;vertical-align:middle;}
.content table.table>tbody>tr:nth-child(even){background:#f7faff;}
.content table.table>tbody>tr:hover{background:#edf6ff;}
.content .modal-content{border:0;border-radius:7px;box-shadow:0 8px 28px rgba(20,50,80,.18);overflow:hidden;}
.content .modal-header{background:#eaf3fb;border-bottom:1px solid #d4e2ef;padding:15px 20px;}
.content .modal-footer{border-top:1px solid #e5edf5;}
.content input[type=radio]{accent-color:#287db5;width:17px;height:17px;vertical-align:middle;margin-right:5px;}
#ac_grouplist{background:#fff;border:1px solid #d5e0ea;border-radius:4px;}
@media(max-width:767px){.content{padding:10px;}.content .box-body{padding:10px;}.content .divtext{margin-top:8px;}.content .btn-lg{font-size:14px;padding:8px 10px;margin-bottom:6px;}.content .modal-dialog{width:auto!important;margin:10px;}.content table.table{min-width:850px;}}
</style>

<style id="bank-payments-button-spacing">
/* Keep each bank-payment action in its own clearly separated button box. */
.content .bank-payment-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
}
.content .bank-payment-actions > div {
    float: none;
    width: auto;
    padding-left: 0;
    padding-right: 0;
}
.content .bank-payment-actions .btn {
    margin: 0;
    border-radius: 5px;
    box-shadow: none;
    font-weight: 600;
    padding: 8px 14px;
}
.content .bank-payment-actions .btn-warning {
    background: #287db5;
    color: #fff;
    border: 1px solid #287db5;
}
.content .bank-payment-actions .btn-warning:hover,
.content .bank-payment-actions .btn-warning:focus,
.content .bank-payment-actions .btn-primary:hover,
.content .bank-payment-actions .btn-info:hover,
.content .bank-payment-actions .btn-success:hover {
    background: #1f6798;
    color: #fff;
    border-color: #1f6798;
}
</style>


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

            <div class="col-sm-12 bank-payment-actions">

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




<style id="delivery-challan-matching-final-style">
/* Delivery Challan-inspired blue/white styling for Bank Payments */
.content-wrapper{background:#f2f6fc!important;}
.content-header h1{color:#214f78!important;font-weight:700;letter-spacing:.2px;}
.content-header h1 small{color:#607d98!important;}
.content .box{
  background:#fff!important;border-top:3px solid #287db5!important;
  border-radius:10px!important;box-shadow:0 5px 22px rgba(24,67,105,.09)!important;
  overflow:hidden;
}
.content .box-header{padding:15px 18px!important;border-bottom:1px solid #e2ebf4!important;}
.content .box-title,.content .modal-title{color:#214f78!important;font-weight:700!important;}
.content .box-body{padding:15px!important;margin:0!important;}
.content .divtext{margin-top:14px!important;margin-bottom:8px!important;}
.content label{color:#334e68!important;font-weight:600!important;}
.content .form-control{border:1px solid #cbd7e3!important;border-radius:5px!important;box-shadow:none!important;min-height:36px;}
.content .form-control:focus{border-color:#287db5!important;box-shadow:0 0 0 2px rgba(40,125,181,.13)!important;}
.content table.table,.content table#example2{background:#fff;border-collapse:collapse;}
.content table.table>thead>tr>th,.content table#example2>thead>tr>th{
  background:#e8f2fc!important;color:#214f78!important;font-weight:700!important;
  white-space:nowrap;border:1px solid #c9d9e8!important;padding:10px 8px!important;
}
.content table.table>tbody>tr>td,.content table#example2>tbody>tr>td{
  border:1px solid #d5e0ea!important;padding:8px!important;vertical-align:middle;
}
.content table.table>tbody>tr:nth-child(even),.content table#example2>tbody>tr:nth-child(even){background:#f7faff!important;}
.content table.table>tbody>tr:hover,.content table#example2>tbody>tr:hover{background:#edf6ff!important;}
.content .btn{border-radius:5px!important;box-shadow:none!important;font-weight:600;}
.content .btn-primary,.content .btn-info,.content .btn-success,.content .btn-warning{
  background:#287db5!important;border-color:#287db5!important;color:#fff!important;
}
.content .btn-primary:hover,.content .btn-info:hover,.content .btn-success:hover,.content .btn-warning:hover{
  background:#1f6798!important;border-color:#1f6798!important;color:#fff!important;
}
.content .btn-danger,.content .btn-danger:hover{background:#d9534f!important;border-color:#d43f3a!important;color:#fff!important;}
.content .modal-content{border:0!important;border-radius:9px!important;box-shadow:0 8px 28px rgba(20,50,80,.18)!important;overflow:hidden;}
.content .modal-header{background:#e8f2fc!important;border-bottom:1px solid #d4e2ef!important;padding:15px 20px!important;}
.content .modal-footer{border-top:1px solid #e5edf5!important;}
#ac_grouplist{background:#fff;border:1px solid #d5e0ea;border-radius:5px;}

/* Each action button is an individual box with visible space between buttons */
.content .bank-payment-actions{
  display:flex!important;flex-wrap:wrap!important;align-items:center!important;
  gap:10px!important;padding:12px 15px!important;
}
.content .bank-payment-actions>div{
  float:none!important;width:auto!important;padding-left:0!important;padding-right:0!important;
  margin:0!important;
}
.content .bank-payment-actions .btn{
  display:inline-block!important;margin:0!important;padding:8px 14px!important;
  min-height:36px;border:1px solid #287db5!important;border-radius:5px!important;
}
.content .bank-payment-actions .btn-warning{background:#287db5!important;border-color:#287db5!important;}
.content .bank-payment-actions .btn-warning:hover{background:#1f6798!important;border-color:#1f6798!important;}
@media(max-width:767px){
  .content{padding:10px;}
  .content .box-body{padding:10px!important;}
  .content .bank-payment-actions{gap:8px!important;}
  .content .bank-payment-actions .btn-lg{font-size:14px;padding:8px 10px!important;}
  .content .modal-dialog{width:auto!important;margin:10px!important;}
  .content table.table,.content table#example2{min-width:850px;}
}
</style>

</body>



</html>



