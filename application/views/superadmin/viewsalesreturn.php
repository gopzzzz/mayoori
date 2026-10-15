<?php $data['leftmenu']='bankaccountcreate';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

   <h1 align="center">SALES RETURN LIST<small>Preview</small></h1>

   <ol class="breadcrumb">

      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

      <li><a href="<?php echo base_url().'bank_payments';?>">SALES RETURN LIST</a></li>

   </ol>

</section>

<br>

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

<style>
p a {
    color: #3c8dbc;
    padding: 11px;
    border: 1px solid #3c8dbc;
    background-color: #3c8dbc;
    color: white;
}
b, strong {
    font-weight: 700;
    margin: 10px;
}
</style>

<!-- Main content -->

<section class="content">

   <div class="row">

   <div class="col-xs-12">

      <div class="box">

         <div class="box-header">

            <h3 class="box-title">SALES RETURN LIST</h3>

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

                <a href="<?php echo base_url('sales_rtn');?>"><button type="button" class="btn btn-success btn-sm">Back to SALES RETURN</button></a>

            </div> 

		<br><br>

         <!-- /.box-header -->

         <div class="box-body table-responsive no-padding">

		  

            <table  class="table table-hover">

               <thead>

                  <tr>

                     <th>#</th>

                     <th>Bill No</th>

                     <th>Bill Date</th>

                     <th>Customer Name</th>

                     <th>Grand Total</th>

                     

                     <th>Notes</th>

                     <th>Action</th>

                  </tr>

               </thead>
               <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Grand Total:</td>
                  <td><?php  $total=0;
                  foreach($salesreturn as $key1){
                     $total+=$key1->sales_return_grandtotal;
                   }echo $total;?></td>
                  <td></td>
                  <td></td>
                  
                 
               <?php
                            $i=1;
                            foreach($salesreturn as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $key->sales_retuurn_bill_no;?></td>
                        <td><?php echo date("d-m-Y", strtotime($key->sales_return_date)); ?></td>
								<td><?php echo $key->salesreturn_customername;?></td>
								<td><?php echo $key->sales_return_grandtotal;?></td>
								
								<td><?php echo $key->sales_return_note;?></td>
                        
								<td> <a href="<?php echo base_url('salesreturnprint/').$key->sales_return_id;?>"

>&nbsp;
                        <i class="fa fa-print"></i></a>
                        <a href="<?php echo base_url('salesreturnedit/').$key->sales_return_id;?>" ><li class="fa fa-pencil"></li></a>
								
								</td>
							</tr>
							<?php
				$i++;
				}
				?>
             

               </tbody>
            </table>
            <p><?php echo $links; ?></p>
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
   function viewpayment(id){
      $('#'+id).modal('show');
      $('#'+id+ ' .submit_edit').hide();
      //$('#'+id+ ' .modal-title').html('View Bank Payment');
   }
   
</script>

</body>

</html>