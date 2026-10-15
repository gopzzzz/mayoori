

   <?php $data['leftmenu']='bankaccountcreate';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">BANK RECEIPTS<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="<?php echo base_url().'bank_receipts';?>">BANK RECEIPTS</a></li>



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

div.form-group {

  position: absolute;

  right: 100px;

  width: 100px;

  height: 100px;

  

} 

  </style>



    <!-- Main content -->



    <section class="content">

      

		<div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">BANK RECEIPTS</h3>

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

			<div class="form-group"> 

                <a href="<?php echo base_url('bank_receipts');?>"><button type="button" class="btn btn-success btn-sm">Back to Bank Receipts</button></a>

            </div> 

		<br><br>

            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

			 

			

              <table id="example2" class="table table-hover">

			  <thead>

                <tr>

                  <th>#</th>

				  <th>Date</th>

				  <th>Referal Number</th>

          <th>Receipt For</th>

				  <th>Bank Account</th>

				  <th>Cheque Date</th>

				  <th>Amount</th>

				  <th>Ledger</th>

				  <th>Narration</th>

				  

				  <th>Action</th>

                  

                </tr>

				 </thead>

				<?php

			$i=1;

			foreach($bankpaylist as $key){

					?>

                <tr>

                  <td><?php echo $i;?></td>

				  

				   <td><?php echo date('d-m-Y',strtotime($key->date));?></td>

					 <td>BRPT<?php echo $key->referalnumber;?></td>

           <td><?php if($key->receiptorpay_on==1){echo "Normal";}else if($key->receiptorpay_on==2){echo "B2B";}else if($key->receiptorpay_on==3){echo "B2C";}else if($key->receiptorpay_on==4){echo "Purchase";}else if($key->receiptorpay_on==5){echo "Salary";}else if($key->receiptorpay_on==7){echo "Sale Order";}?></td>


					  <td><?php echo $key->ba_acnumber;?></td>

            <td><?php if($key->cheque_date=='0000-00-00' || $key->cheque_date==null){ echo '0000-00-00';}else{ echo date('d-m-Y', strtotime($key->cheque_date)); }?></td>

					   <td><?php echo $key->amount;?></td>

						<td><?php if($key->receiptorpay_on==1){ echo $key->le_name; }else if($key->receiptorpay_on==4){echo $key->sup_name; }else if($key->receiptorpay_on==5){echo $key->stf_name;}else{ echo $key->cus_name; } ?></td>

						<td><?php echo $key->narration;?></td>

						

						<td>

                     <?php echo anchor('del_bank_receiptslist/'.$key->bp_id  ,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>

                     <li class="fa fa-pencil" data-toggle="modal" data-target="#myModal2<?php echo $key->bp_id;?>"></li>

                     </li>

                  </td>

                </tr>

				

				

				

				

				<div class="modal fade" id="myModal2<?php echo $key->bp_id;?>" role="dialog">

                  <div class="modal-dialog" style="width:80%;">

                     <?php

                        $id=$key->bp_id;

                        $edit_area=$this->Admin_model->bankreceiptlist_edit($id);

                        foreach($edit_area as $key2){ ?>

                            

                           

                      

                 

                     <form name="myForm" <?php echo form_open_multipart('bank_receiptslist');?>>

                        <div class="modal-content">

                           <div class="modal-header">

                              <button type="button" class="close" data-dismiss="modal">&times;</button>

                              <h4 class="modal-title">Edit Bank Receipt</h4>

                           </div>

                           <div class="col-sm-12">

                           <input type="hidden" class="form-control" name="brec_id" value="<?php echo $key2->bp_id;?>"/>

            <div class="col-sm-3 labeltext divtext">

            <label>Date</label>

            </div>

            

            

            <div class="col-sm-3 divtext">

            <input class="form-control" type="text" name="date1" value="<?php echo $key2->date;?>" readonly>

            </div>

			<div class="col-sm-3 labeltext divtext">

            <label>Referal Number</label>

            </div>

            <div class="col-sm-3 divtext">

            <input class="form-control" name="refno1" placeholder="Referal Number" value="<?php echo $key2->referalnumber;?>" readonly>

           

            </div>

           <!-- <div class="col-sm-3 labeltext divtext"><label >Bank Account</label>

            </div> -->

            

            <!-- <div class="col-sm-3 divtext">

           <select name="bank1" class="form-control bankaccount" id="bankaccount_<?php echo $key2->bp_id;?>" data-id="<?php echo $key2->bp_id;?>">

             <option value="0">select bank account</option>

             <?php foreach($bankaccount as $bankaccount){?>

             <option value="<?php echo $bankaccount->ba_id;?>" <?php if($key2->bp_bankaccountid == $bankaccount->ba_id){echo 'selected';}?>><?php echo $bankaccount->ba_acnumber;?></option>

             <?php } ?>

</select>

            </div> -->

           

			<div class="col-sm-3 labeltext divtext">

            <label>Bank Balance</label>

            </div>

            

           

            <div class="col-sm-3 divtext">

            <input class="form-control" name="bankbal" id="bankbalance_<?php echo $key2->bp_id;?>" value="<?php echo $key2->ba_opbalance;?>" readonly>

            </div>

            <div class="col-sm-3 labeltext divtext">

<label>Ledger Balance</label>

</div>





<div class="col-sm-3 divtext">

<input class="form-control" name="ledger_bal" id="ledgerbalance_<?php echo $key2->bp_id;?>" value="<?php echo $key2->le_opbalance;?>" readonly>

</div>

            </div>

	

            <div class="col-sm-12">

            
            <div class="col-sm-3 labeltext divtext">

            <label>Ledger</label>

            </div>

            <div class="col-sm-3 divtext">

       

             <input type="hidden" name="ledger1" value="<?php echo $key2->ledger; ?>">

             <?php if($key2->receiptorpay_on==1){ ?>
             
               <input type="text" class="form-control" value="<?php echo $key2->le_name; ?>" readonly>

				<?php }else if($key2->receiptorpay_on==2 || $key2->receiptorpay_on==3 ||$key2->receiptorpay_on==7){ ?>

               <input type="text" class="form-control" value="<?php echo $key2->cus_name; ?>" readonly>

               <?php }else if($key2->receiptorpay_on==4){ ?>
				
					 <input type="text" class="form-control" value="<?php echo $key2->sup_name;?>" readonly>

                <?php }else if($key2->receiptorpay_on==5){ ?>
				
                  <input type="text" class="form-control" value="<?php echo $key2->stf_name;?>" readonly>

                  <?php } ?>
				
            

            </div>

           

            <div class="col-sm-3 labeltext divtext">

            <label>Cheque Number</label>

            </div>

            <div class="col-sm-3 divtext">

            <input class="form-control" name="cheque1" placeholder="Cheque Number" value="<?php echo $key2->cheque_num;?>">

            </div>

			<div class="col-sm-3 labeltext divtext">

            <label>Amount</label>

            </div>

			<div class="col-sm-3 divtext">

            <input class="form-control" name="amount1" placeholder="Amount" value="<?php echo $key2->amount;?>">

            <input class="form-control" type="hidden" name="amount2" placeholder="Amount" value="<?php echo $key2->amount;?>">
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

            <textarea class="form-control" name="narration1" placeholder="Narration"><?php echo $key2->narration;?></textarea>

            </div>

            <div class="col-sm-3 labeltext divtext">

            <label>Cheque Date</label>

            </div>

            

            

            <div class="col-sm-3 divtext">

            <input class="form-control" name="chqudate1" type="date" placeholder="Date" value="<?php echo $key2->cheque_date;?>">

            </div>


            <div class="col-sm-3 labeltext divtext">

<label>Bill/Voucher Number</label>

</div>

<div class="col-sm-3 divtext">

<input class="form-control" name="vouchernum" placeholder="Voucher Number" value="<?php echo $key2->receiptnumber;?>" readonly>

            </div>

            </div>

                           

						   

                           <div class="modal-footer">

                              <button type="submit" name="submit_edit" class="btn btn-primary">Submit</button>

                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                           </div>

						 </div>

                     </form>

                     </div>

                  </div>
                  <?php 

                }

                        

                ?>

                

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

   $('.bankaccount').on('change',function(){

 var bankaccount=$(this).val();

 var id=$(this).data('id');

 if(bankaccount!=""){

					$.ajax({

						type:"POST",

						url:'<?php echo site_url('Admin/bankaccountnumberfetch');?>',

						data: { bankaccount : bankaccount},

							success:function(res){console.log(res);

               

							//alert(res);

              if (res) {

                      var obj = JSON.parse(res)

					  $('#bankbalance_'+id).val(obj.ba_opbalance);

					 

                    } 

							},

					});	



   

				}

			

  });

  $('.ledger').on('change',function(){

 var ledger=$(this).val();

 var id=$(this).data('id');

 if(ledger!=""){

					$.ajax({

						type:"POST",

						url:'<?php echo site_url('Admin/ledgerfetch');?>',

						data: { ledger : ledger},

							success:function(res){console.log(res);

               

							//alert(res);

              if (res) {

                      var obj = JSON.parse(res)

					  $('#ledgerbalance_'+id).val(obj.le_opbalance);

					 

                    } 

							},

					});	



   

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

  </script>



</body>



</html>



