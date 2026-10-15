

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">LEDGER REPORT<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="<?php echo base_url('ledgereport')?>">LEDGER REPORT</a></li>



    </ol>



  </section><br>



<style>



table, td, th {

border: 1px solid #cac6c6;

}



#example2 {

border-collapse: separate;

}

</style>



  <!-- Main content -->



  <section class="content">

    

      <div class="row">

      <div class="col-xs-12">

        <div class="box">

          <div class="box-header">

            

            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





           
<section>
<?php echo form_open_multipart('ledgerreport');?>
              <div class="form-group col-sm-6">
                <div>
                <label>Account Type</label>
                <input type="hidden" value="<?php echo $acnum;?>" id="ledger1">
                <select class="form-control cleardata" name="payorrepton" id="pron" required>
                            <option value="" <?php if($actype==''){echo 'selected';}?>>Select</option>
                            <option value="1" <?php if($actype==1){echo 'selected';}?>>Normal</option>
							<!-- <option value="2" <?php if($actype==2){echo 'selected';}?>>Against B2B sale</option>
                            <option value="3" <?php if($actype==3){echo 'selected';}?>>Against B2C sale</option> -->
							<option value="4" <?php if($actype==4){echo 'selected';}?>>Against Purchase Bill</option>
              <option value="5" <?php if($actype==5){echo 'selected';}?>>Salary Ledger</option>
              <option value="6" <?php if($actype==6){echo 'selected';}?>>Finance</option>
              <!-- <option value="8" <?php if($actype==8){echo 'selected';}?>>Sales Order</option> -->
              <option value="9" <?php if($actype==9){echo 'selected';}?>>Customers</option>
              <!-- <option value="10" <?php if($actype==10){echo 'selected';}?>>Bank Ledger</option> -->
              <option value="11" <?php if($actype==11){echo 'selected';}?>>Branch Ledger</option>
              <!-- <option value="7" <?php if($actype==7){echo 'selected';}?>>All</option> -->
              </select>

							</div>
                            <div>
							<label class="exampleInputEmail1" >LEDGER AC</label>
							<select class="form-control cleardata" name="ledac" id="ledger" required>
                           
                           
                            </select>
							</div>
                            <div>
							<label class="exampleInputEmail1" >FROM DATE</label>
							<input type="date" class="form-control" value="<?php echo $from;?>" name="from" required>
							</div>
                            <div>
							<label class="exampleInputEmail1" >TO DATE</label>
							<input type="date" class="form-control" value="<?php echo $to;?>" name="to" required>
							</div>
                            <div>
                            <br></br>
                            <button type="submit" class="btn btn-sm btn-info" name="ledgersubmit">Search</button>
                            <a href="<?php echo base_url('supplier_accounts');?>"><button type="button" class="btn btn-sm btn-info" name="ledgersubmit">SUNDRY CREDITORS</button></a>
                            </div>
                            </div>
                            </form>
              </section>

            </div>
      

                       

          </div>

          <h3 class="box-title">LEDGER REPORT - <?php if($actype==4){echo $supplier->sup_name;}else if($actype==9){ echo $customer->cus_name; }else if($actype==1){echo  $ledgername->le_name;}else if($actype==5){echo $staff->stf_name;}else if($actype==6){ echo $finance->finance;}?></h3>

          <!-- /.box-header -->

          <div class="box-body table-responsive no-padding">

          <table id="example2" class="table table-hover">

         

       

         <tr>

         <th>SL NO</th>

         <th>DATE</th>

         <th>PERTICULAR</th>

         <th>VOUCHER TYPE</th>

         <th>VOUCHER NO</th>

         <th>DEBIT</th>

         <th>CREDIT</th>

         <th>BALANCE</th>

         </tr>

         
         <tbody>
         <!-- <?php if($actype==9 && $from < $from1){?>
         <tr>
         <td></td>
         <td></td>
         <td>Opening Balance:</td>
         <td></td>
         <td></td>
         <td><input type="text" class="form-control debitbal " value="<?php if($opbalance>0 ){echo $opbalance;}?>"></td>
         <td><input type="text" class="creditbal form-control" value="<?php if($opbalance<0){echo abs($opbalance);}?>"></td>
         
         <td></td>
         </tr>
         <?php } ?> -->
          <?php 
              $i=1;
              $credittotal=0;
              $debittotal=0;
              if(!empty($ledgerreport)){
              foreach($ledgerreport as $key){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key->date));?></td>

          <td><?php echo $key->narration	;?></td>

          <td><?php if($key->payment_type==1|| $key->payment_type==3){ echo "Payments"; }else if($key->payment_type==2|| $key->payment_type==4){ echo "Receipt";}else{ if($key->receiptorpay_on==1){ echo "Normal"; }else if($key->receiptorpay_on==2){  echo "B2B sale"; }else if($key->receiptorpay_on==3){echo "B2C sale";}else if($key->receiptorpay_on==4){ echo "Purchase";}}  ?></td>

          <td><?php if($key->payment_type==1) { echo 'BPAY'.$key->referalnumber;}else if($key->payment_type==2){ echo 'BRPT'.$key->referalnumber; }else if($key->payment_type==3){ echo 'CPAY'.$key->referalnumber; }else if($key->payment_type==4){ echo 'CRPT'.$key->referalnumber; }?></td>

          <td><input type="text" readonly class="form-control debitbal" value="<?php if($key->payment_type==1 || $key->payment_type==3){echo $key->amount;}?>"></td>

          <td > <input type="text" readonly class="form-control creditbal" value="<?php if($key->payment_type==2 || $key->payment_type==4){echo $key->amount;}?>"></td>
         
          <td></td>

          <?php if($key->payment_type==1 || $key->payment_type==3){ $credittotal+= $key->amount; }?>
           <?php if($key->payment_type==2 || $key->payment_type==4){ $debittotal+= $key->amount; }?>
 

            
          

          </tr>
          <?php
              $i++;
              }
            }
            ?>
  <?php 
            if(!empty($salesorder)){ 

        foreach($salesorder as $key7){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key7->sales_order_master_date));?></td>

          <td><?php echo $key7->sales_order_master_note;?></td>

          <td>Sales Order</td>

          <td><?php echo $key7->sales_order_master_bill_no;?></td>

          
         
          <td >  <input type="text" readonly class="form-control debitbal" value=""></td>

          <td ><input type="text" readonly class="form-control creditbal" value="<?php echo $key7->sales_order_master_amount_paid + $key7->sales_order_master_bankamount; ?>"></td>

          <td></td>

          

          </tr>
          <?php
          if($key7->sales_order_master_payment_mode==7){$debittotal+=$key7->sales_order_master_amount_paid;} 
          if($key7->sales_order_master_payment_mode==6){$credittotal+=$key7->sales_order_master_amount_paid;} 
              $i++;
              }
            }
            ?>
            
         <?php 
            if(!empty($ledgerreportb2b)){ 

        foreach($ledgerreportb2b as $key1){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key1->billing_master_billdate));?></td>

          <td><?php echo $key1->billing_master_note	;?></td>

          <td>B2B Sales</td>

          <td><?php echo $key1->billing_master_billno	;?></td>

          <td><input type="text" readonly class="form-control debitbal" value="<?php echo $key1->billing_master_grandtotal;?>"></td>

          <td><input type="text" readonly class="form-control creditbal " value="<?php echo $key1->billing_master_paid_amount + $key1->billing_master_bankamount; ?>" ></td>

          <td></td>

          </tr>
          <?php
          $credittotal+= $key1->billing_master_paid_amount; 
          $debittotal+= $key1->billing_master_grandtotal;
              $i++;
              }
            }
            ?>
                
          
                <?php 
            if(!empty($ledgerreportb2c)){ 

        foreach($ledgerreportb2c as $key2){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key2->sales_master_date));?></td>

          <td><?php echo $key2->sales_master_note;?></td>

          <td>B2C Sales</td>

          <td><?php echo $key2->sales_master_bill_no	;?></td>

          <td ><input type="text" readonly class="form-control debitbal" value="<?php echo $key2->sales_master_grand_total;?>"></td>

          <td><input type="text" readonly class="form-control creditbal" value="<?php echo $key2->sales_master_amount_paid + $key2->sales_master_bankamount;?>"></td>

          <td></td>

          </tr>
          <?php
           $credittotal+= $key2->sales_master_amount_paid; 
           $debittotal+= $key2->sales_master_grand_total;
              $i++;
              }
            }
            ?>

<?php 
            if(!empty($ledgerreportsalereturn)){ 

        foreach($ledgerreportsalereturn as $key9){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key9->sales_return_date));?></td>

          <td><?php echo $key9->sales_return_note;?></td>

          <td>Sales Return</td>

          <td><?php echo $key9->sales_retuurn_bill_no;?></td>

          <td ><input type="text" readonly class="form-control debitbal" value="<?php echo $key9->sales_return_grandtotal;?>"></td>

          <td><input type="text" readonly class="form-control creditbal" value="<?php echo $key9->sales_return_grandtotal + $key2->sales_master_bankamount;?>"></td>

          <td></td>

          </tr>
          <?php
           $credittotal+= $key9->sales_return_grandtotal; 
           $debittotal+= $key9->sales_return_grandtotal;
              $i++;
              }
            }
            ?>
                
                <?php 
            if(!empty($ledgerreportpurchase)){ 

        foreach($ledgerreportpurchase as $key3){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php if($key3->purchase_status==0){echo date("d-m-Y",strtotime($key3->purchase_master_billdate));}?></td>

          <td><?php echo $key3->purchase_master_notes;?></td>

          <td>Purchase</td>

          <td><?php echo $key3->invoiceno;?></td>

          

          <td><input type="text" readonly class="form-control debitbal" value="<?php if($key3->purchase_master_payment_mode==6){echo $key3->purchase_master_grandtotal;} ?>" ></td>

          <td > <input type="text" readonly class="form-control creditbal" value="<?php if($key3->purchase_master_payment_mode==7){echo $key3->purchase_master_grandtotal;}else{echo $key3->purchase_master_grandtotal;} ?> "></td>
         
          <td></td>

          

          </tr>
          <?php
          if($key3->purchase_master_payment_mode==6){$credittotal+=$key3->purchase_master_grandtotal;} 
          if($key3->purchase_master_payment_mode==7){$debittotal+=$key3->purchase_master_grandtotal;}else{$debittotal+=$key3->purchase_master_grandtotal;} 
              $i++;
              }
            }
            ?>


<?php 
            if(!empty($ledgerreportpurchasereturn)){ 

        foreach($ledgerreportpurchasereturn as $key6){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key6->purreturn_master_date));?></td>

          <td><?php echo $key6->purreturn_master_notes;?></td>

          <td>Purchase Return</td>

          <td><?php echo $key6->purreturn_master_billno	;?></td>

          

          <td><input type="text" readonly class="form-control debitbal" value="<?php echo $key6->purreturn_master_grandtotal;?>" ></td>

          <td > <input type="text" readonly class="form-control creditbal" value=""></td>
         
          <td></td>

          

          </tr>
          <?php
          $credittotal+=$key6->purreturn_master_grandtotal;
          $debittotal+=0;
              $i++;
              }
            }
            ?>




<?php 
            if(!empty($deliverychellanreport)){ 

        foreach($deliverychellanreport as $key7){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key7->deliverychellan_master_date));?></td>

          <td><?php echo $key7->deliverychellan_master_note;?></td>

          <td>Delivery Challan</td>

          <td><?php echo $key7->deliverychellan_master_chellanno	;?></td>

          

          <td><input type="text" readonly class="form-control debitbal" value="<?php echo $key7->deliverychellan_master_grandtotal;?>" ></td>

          <td > <input type="text" readonly class="form-control creditbal" value="<?php echo $key7->deliverychellan_master_grandtotal;?>"></td>
         
          <td></td>

          

          </tr>
          <?php
          $credittotal+=$key6->deliverychellan_master_grandtotal;
          $debittotal+=0;
              $i++;
              }
            }
            ?>




<?php 
            if(!empty($journalreport)){ 

        foreach($journalreport as $key8){
            ?>
          <tr>

          <td><?php echo $i;?></td>

          <td><?php echo date("d-m-Y",strtotime($key8->date));?></td>

          <td><?php echo $key8->narrations;?></td>

          <td>Journal</td>

          <td><?php echo $key8->journalnum	;?></td>

          

          <td><input type="text" readonly class="form-control debitbal" value="<?php echo $key8->debit_amount;?>" ></td>

          <td > <input type="text" readonly class="form-control creditbal" value="<?php echo $key8->credit_amount;?>"></td>
         
          <td></td>

          

          </tr>
          <?php
          $credittotal+=$key8->credit_amount;
          $debittotal+=$key8->debit_amount;
              $i++;
              }
            }
            ?>
    
          </tbody>
          <tfoot>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td id="totaldebit"></td>
               <td id="totalcredit"></td>
               <!-- <td><?php 
               $balancetotal=$debittotal-$credittotal;
               echo $balancetotal;?></td> -->
               <td id="balance_html"></td>

               
          </tfoot>
         

       

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
 var pay_type = $('#pron').val();
 var varid=$('#ledger1').val();

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
                      html_each +='<option value="'+value.le_id+'" >'+value.le_name+'</option>';
                    });
                                        }else if(pay_type==4){
                                            $.each( res, function( key, value ) {
                      html_each +='<option value="'+value.sup_id+'">'+value.sup_name+'</option>';
                    });   
                                        }else if(pay_type==5){
											$.each( res, function( key, value ) {
				           	html_each +='<option value="'+value.stf_id+'">'+value.stf_name+'</option>';
				                  });
				                        }else if(pay_type==6){
                                  $.each( res, function( key, value ) {
				           	           
                                html_each +='<option value="'+value.id+'" >'+value.finance+'</option>';
				                  });
                                }else if(pay_type==10){
											                      $.each( res, function( key, value ) {
				           	           
                                html_each +='<option value="'+value.ba_id+'">'+value.ba_ifsc+'</option>';
				                  });
				                        }
                                else if(pay_type==11){
											                      $.each( res, function( key, value ) {
				           	           
                                html_each +='<option value="'+value.brn_id+'">'+value.brn_code+'</option>';
				                  });
				                        }
                                else{
                                            $.each( res, function( key, value ) {
                      html_each +='<option value="'+value.customer_id+'">'+value.cus_name+'('+value.cus_phonenumber+')</option>';
                    });  
                    }
            $('#ledger').append(html_each);
            $("#ledger select").val(varid);
        }
       
      
     });

$('#pron, #editModal #pron').on('change',function(){
	   
       var pay_type = $(this).val(); 
     
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
                                        }
                                        else if(pay_type==5){
											                      $.each( res, function( key, value ) {
				           	           html_each +='<option value="'+value.stf_id+'">'+value.stf_name+'</option>';
				                  });
				                        }
                                else if(pay_type==6){
											                      $.each( res, function( key, value ) {
				           	           
                                html_each +='<option value="'+value.id+'">'+value.finance+'</option>';
				                  });
				                        }else if(pay_type==10){
											                      $.each( res, function( key, value ) {
				           	           
                                html_each +='<option value="'+value.ba_id+'">'+value.ba_ifsc+'</option>';
				                  });
				                        }
                                else if(pay_type==11){
											                      $.each( res, function( key, value ) {
				           	           
                                html_each +='<option value="'+value.brn_id+'">'+value.brn_code+'</option>';
				                  });
				                        }
                                else{
                                            $.each( res, function( key, value ) {
                                              html_each +='<option value="'+value.customer_id+'">'+value.cus_name+'('+value.cus_phonenumber+')</option>';
                    });  
                    }
   
              $('#ledger').append(html_each);  
              $('#editModal #ledger').append(html_each);  
	            $('#editModal #ledger').val($('#ledgertemp').val()); 
     }
     });
   
    });


    $(document).ready(function () { 
     // alert();

$(".debitbal").each(function() {    
    
    calculateSum();
    
 
}); 

$(".creditbal").each(function() {    
    
    calculateSum1();
    totalsum();
    
 
}); 


});
 
function calculateSum() { 
 
var sum = 0;        
$(".debitbal").each(function() {          
if (!isNaN(this.value) && this.value.length != 0) {
  sum += parseFloat(this.value);
}    
});


$('#totaldebit').html(sum.toFixed(2));
}
function calculateSum1() { 
 
 var sum = 0;        
 $(".creditbal").each(function() {          
 if (!isNaN(this.value) && this.value.length != 0) {
   sum += parseFloat(this.value);
 }    
 });
 
 
 $('#totalcredit').html(sum.toFixed(2));
 }
 function totalsum(){
  var sum = 0;        
$(".debitbal").each(function() {          
if (!isNaN(this.value) && this.value.length != 0) {
  sum += parseFloat(this.value);
}    
});
var sum1 = 0;        
 $(".creditbal").each(function() {          
 if (!isNaN(this.value) && this.value.length != 0) {
   sum1 += parseFloat(this.value);
 }
  });

  var balance=sum-sum1;
  $('#balance_html').html(balance);
  
 }
 
</script>



</body>



</html>



