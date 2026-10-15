

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">CASHBOOK<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="<?php echo base_url('cashbook')?>">CASHBOOK</a></li>



      </ol>



    </section><br>



  <style>

 

  table, td, th {

  border: 1px solid #cac6c6;

}



#example2 {

  border-collapse: separate;

}

.cash-summary-card{
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    margin-bottom: 25px;
}

.cash-summary-card .card-header{
    background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    color: #fff;
    padding: 15px 20px;
    border: none;
}

.cash-summary-card .card-header h5{
    margin: 0;
    font-size: 20px;
    font-weight: 600;
}

.cash-summary-card .card-body{
    background: #fff;
    padding: 25px;
}

.cash-summary-card label{
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #6c757d;
    margin-bottom: 8px;
    text-transform: uppercase;
}

.cash-summary-card .form-control{
    height: 48px;
    border-radius: 10px;
    border: 1px solid #dee2e6;
    font-size: 16px;
    font-weight: 600;
    background: #f8f9fa;
}

.cash-summary-card .form-control:focus{
    box-shadow: none;
    border-color: #0d6efd;
}

.cash-summary-card .input-group .btn{
    border-radius: 0 10px 10px 0;
    padding: 0 25px;
    font-weight: 600;
}

.cash-summary-card .btn-success{
    background: #198754;
    border-color: #198754;
}

.cash-summary-card .btn-success:hover{
    background: #157347;
    border-color: #146c43;
}

@media (max-width:768px){
    .cash-summary-card .col-md-4{
        margin-bottom:15px;
    }
}

  </style>



    <!-- Main content -->



    <section class="content">

      

		<div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">CASHBOOK</h3>

			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





              <div class="box-tools">

                <div class="input-group input-group-sm" style="width: 150px;">

                  <form method="POST" action="">
                  
                  <input type="date" name="fdate" class="form-control" value="<?php echo $from;?>">
                  <input type="date" name="tdate" class="form-control" value="<?php echo $to;?>" >

                  <div class="input-group-btn">

                  <button type="submit"  name="cashbook_filter" class="btn btn-default">filter</button>
                  

                  </div>
              </form>

                </div>

              </div>

            </div>

            <!--box-header -->

          <div class="card cash-summary-card">
    <div class="card-header">
        <h5><i class="fa fa-wallet me-2"></i>Cash Summary</h5>
    </div>

    <div class="card-body">
        <div class="row g-3">

            <div class="col-md-3">
                <label>Opening Balance</label>
                <input type="text" class="form-control text-end"
                       value="<?php echo number_format($opbalance->balance,2); ?>" readonly>
            </div>

            <div class="col-md-3">
                <label>From Date</label>
                <input type="text" class="form-control"
                       value="<?php echo $from; ?>" readonly>
            </div>

              <div class="col-md-3">
                <label>To Date</label>
                <input type="text" class="form-control"
                       value="<?php echo $to; ?>" readonly>
            </div>

            <div class="col-md-3">
                <label>Cash On Hand</label>

                <?php echo form_open_multipart('updateclosingbalance'); ?>
                    <input type="hidden" name="type" value="1">

                    <div class="input-group">
                        <input type="text"
                               class="form-control text-end"
                               name="amount"
                               id="cashonhand"
                               readonly>

                        <?php if($status==0){ ?>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save me-1"></i> Save
                            </button>
                        <?php } ?>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

            <div class="box-body table-responsive no-padding">



          








           <table id="example2" class="table table-hover">
   <thead>
      <tr>
         <th>SL NO</th>
         <th>DATE</th>
         <th>PERTICULAR</th>
         <th>C.NAME</th>
         <th>VOUCHER TYPE</th>
         <th>VOUCHER NO</th>
         <th>DEBIT</th>
         <th>CREDIT</th>
      </tr>
   </thead>
   <tbody>
     
         <?php 
            $credittotal=0;
            $debittotal=0;
                $i=2;
                foreach($cashbook as $key){
              ?>
        <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $key->date;?></td>
         <td><?php echo $key->narration;?></td>
         <td><?php echo $key->narration;?></td>
         <td><?php if($key->payment_type==1|| $key->payment_type==3){ echo "Payments"; }else if($key->payment_type==2|| $key->payment_type==4){ echo "Receipt";}else{ if($key->receiptorpay_on==1){ echo "Normal"; }else if($key->receiptorpay_on==2){  echo "B2B sale"; }else if($key->receiptorpay_on==3){echo "B2C sale";}else if($key->receiptorpay_on==4){ echo "Purchase";}}  ?></td>
         <td><?php echo $key->referalnumber	;?></td>
         <td class="debitinput"><?php if($key->payment_type==2 || $key->payment_type==4){echo $key->amount;}?></td>
         <td class="creditinput"><?php if($key->payment_type==1 || $key->payment_type==3){echo $key->amount;}?></td>
          </tr>
         <?php  if($key->payment_type==1 || $key->payment_type==3) { $credittotal+=$key->amount;}
            if($key->payment_type==2 || $key->payment_type==4){$debittotal+=$key->amount;} 
            ?>
     
      <?php
         $i++;
         }
         ?>
      <?php 
         $credittotal=0;
         $debittotal=0;
             $i=2;
             foreach($cashbookreceipt as $key){
           ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $key->date;?></td>
         <td><?php echo $key->narration;?></td>
         <td><?php echo $key->narration;?></td>
         <td><?php if($key->payment_type==1|| $key->payment_type==3){ echo "Payments"; }else if($key->payment_type==2|| $key->payment_type==4){ echo "Receipt";}else{ if($key->receiptorpay_on==1){ echo "Normal"; }else if($key->receiptorpay_on==2){  echo "B2B sale"; }else if($key->receiptorpay_on==3){echo "B2C sale";}else if($key->receiptorpay_on==4){ echo "Purchase";}}  ?></td>
         <td><?php echo $key->referalnumber	;?></td>
         <td class="debitinput"><?php if($key->payment_type==2 || $key->payment_type==4){echo $key->amount;}?></td>
         <td class="creditinput"><?php if($key->payment_type==1 || $key->payment_type==3){echo $key->amount;}?></td>
         <?php  if($key->payment_type==1 || $key->payment_type==3) { $credittotal+=$key->amount;}
            if($key->payment_type==2 || $key->payment_type==4){$debittotal+=$key->amount;} 
            ?>
      </tr>
      <?php
         $i++;
         }
         ?>
      <?php 
         foreach($salebookb2c as $key1){
          if($key1->sales_master_amount_paid - $key1->received_amount!=0){
         ?>

      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $key1->sales_master_date	;?></td>
         <td><?php echo $key1->sales_master_note	;?></td>
         <td><?php echo $key1->sales_master_customer_name	;?></td>
         <td>B2C sale</td>
         <td><?php echo $key1->sales_master_bill_no	;?></td>
         <td id="debitinput"><?php if($key1->sales_master_payment_mode==6) { if($key1->sale_order_id==null){echo $key1->sales_master_amount_paid;}else{ echo $key1->sales_master_amount_paid ;} } else {
          if($key1->sale_order_id==null){echo $key1->sales_master_amount_paid; }else{ echo $key1->sales_master_amount_paid ;}
         }
         }
         ?></td>
        
         <td id="creditinput">0</td>
      </tr>
      <?php
         $credittotal+=0;
        if ($key1->sale_order_id == null) {
    $debittotal += $key1->sales_master_amount_paid;
} else {
    $debittotal += ($key1->sales_master_amount_paid );
}
         
             $i++;
             }
           ?>
      <?php 
         foreach($salebookb2b as $key2){
         ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $key2->billing_master_billdate	;?></td>
         <td><?php echo $key2->billing_master_note	;?></td>
         <td><?php echo $key2->billing_master_customer_name	;?></td>
         <td>B2B sale</td>
         <td><?php echo $key2->billing_master_billno	;?></td>
         <td class="debitinput"><?php echo $key2->billing_master_paid_amount;?></td>
         <td class="creditinput">0</td>
      </tr>
      <?php
         $credittotal+=0;
         $debittotal+=$key2->billing_master_paid_amount;
             $i++;
             }
           ?>
      <?php 
         foreach($purchase as $key3){
         ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $key3->purchase_master_billdate	;?></td>
         <td><?php echo $key3->purchase_master_notes	;?></td>
         <td><?php echo $key3->sup_name	;?></td>
         <td>Purchase</td>
         <td><?php echo $key3->purchase_master_billno	;?></td>
         <td class="debitinput">0</td>
         <td class="creditinput"><?php echo $key3->purchase_paid_amount;?></td>
      </tr>
      <?php
         $credittotal+=$key3->purchase_paid_amount;
         $debittotal+= 0; 
         $i++;
         }
         ?>
      <?php 
         foreach($salesorder as $key4){
             ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo date( "d-m-Y", strtotime($key4->sales_order_master_date	))	;?></td>
         <td><?php echo $key4->sales_order_master_note;?></td>
         <td><?php echo $key4->sales_order_master_customer_name;?></td>
         <td>Salesorder</td>
         <td><?php echo $key4->sales_order_master_bill_no;?></td>
         <td class="debitinput"><?php  echo $key4->sales_order_master_amount_paid;?></td>
         <td class="creditinput"><?php if($key4->sales_order_master_payment_mode==7){ echo $key4->sales_order_master_grand_total; } else{echo "0";}?></td>
         <?php          
           $credittotal += ($key4->sales_order_master_payment_mode == 7)
    ? $key4->sales_order_master_grand_total
    : 0;
            $debittotal+= $key4->sales_order_master_amount_paid; 
            ?>
      </tr>
      <?php
         $i++;
         }
         ?>
      <?php 
         foreach($salesreturn as $key4){
         ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo date( "d-m-Y", strtotime($key4->sales_return_date	))	;?></td>
         <td><?php echo $key4->sales_return_note;?></td>
         <td><?php echo $key4->salesreturn_customername;?></td>
         <td>Sales Return</td>
         <td><?php echo $key4->sales_retuurn_bill_no;?></td>
         <td id="debitinput">0</td>
         <td class="creditinput"><?php echo $key4->sales_return_grandtotal;?></td>
         <?php          
            $credittotal+=$key4->sales_return_grandtotal;
            $debittotal+= 0; 
            ?>
      </tr>
      <?php
         $i++;
         }
         ?>
      <?php 
         foreach($journal as $key5){
         ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo date( "d-m-Y", strtotime($key5->date))	;?></td>
         <td><?php echo $key5->narrations;?></td>
         <td><?php echo $key5->narrations;?></td>
         <td>Journal</td>
         <td><?php echo $key5->journalnum;?></td>
         <td class="debitinput"><?php echo $key5->debit_amount;?></td>
         <td class="creditinput" ><?php echo $key5->credit_amount;?></td>
         <?php          
            $credittotal+=$key5->credit_amount;
            $debittotal+= $key5->debit_amount; 
            ?>
      </tr>
      <?php
         $i++;
         }
         ?>
   </tbody>
   <tfoot>
<tr>
    <th colspan="6" class="text-end">Total</th>
    <th><?= number_format($debittotal,2); ?></th>
    <th><?= number_format($credittotal,2); ?></th>
</tr>
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

  });


    
 $(document).ready(function () {  
  
 // Get totals
    var debitTotal =  parseFloat($("#debit_total").text()) || 0;

    var creditTotal = parseFloat($("#credittotal").text()) || 0;

    // Calculate Cash on Hand
    var cashonhand = debitTotal - creditTotal;



    $("#cashonhand").val(cashonhand.toFixed(2));

});

</script>



</body>



</html>



