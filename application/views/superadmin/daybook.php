

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">DAY BOOK<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="<?php echo base_url('daybook')?>">DAY BOOK</a></li>



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

              <h3 class="box-title">DAY BOOK</h3>

			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





              <div class="box-tools">

                <div class="input-group input-group-sm" style="width: 150px;">

                <form method="POST" action="">
                  
                  <input type="date" name="fdate" class="form-control" value="<?php echo $from;?>">
                  <input type="date" name="tdate" class="form-control" value="<?php echo $to;?>" >

                  <div class="input-group-btn">

                  <button type="submit"  name="daybook_filter" class="btn btn-default">filter</button>
                  

                  </div>
              </form>

                </div>

              </div>

            </div>

            <!-- /.box-header -->

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

            <!-- <th>BALANCE</th>  -->

           </tr>
         </thead>
           

            <tbody>
            <?php 
            $credittotal=0;
            $debittotal=0;
                $i=1;
                foreach($daybook as $key){
              ?>
            <tr>

            <td><?php echo $i;?></td>

            <td><?php echo date( "d-m-Y", strtotime($key->date));?></td>

            <td><?php echo $key->narration	;?></td>

            <td><?php echo $key->narration	;?></td>

            <td><?php if($key->receiptorpay_on==1){ echo "Normal"; }else if($key->receiptorpay_on==2){ echo "B2B sale"; }else if($key->receiptorpay_on==3){echo "B2C sale";}else if($key->receiptorpay_on==4){ echo "Purchase";}?></td>

            <td><?php echo $key->referalnumber	;?></td>

            <td><?php if($key->payment_type==1 || $key->payment_type==3){echo $key->amount;}?></td>

             <td><?php if($key->payment_type==2 || $key->payment_type==4){echo $key->amount;}?></td> 

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
              ?>
            <tr>

            <td><?php echo $i;?></td>

            <td><?php echo date( "d-m-Y", strtotime($key1->sales_master_date))	;?></td>

            <td><?php echo $key1->sales_master_note	;?></td>

             <td><?php echo $key1->sales_master_customer_name	;?></td>

            <td>B2C sale</td>

            <td><?php echo $key1->sales_master_bill_no	;?></td>

           

           <td><?php echo $key1->sales_master_grand_total;?></td>

           <td><?php echo $key1->sales_master_amount_paid;?></td>

            

            </tr>
            <?php
             $credittotal+=$key1->sales_master_grand_total;
             $debittotal+=$key1->sales_master_amount_paid;
                $i++;
                }
              ?>

<?php 
               
               foreach($salebookb2b as $key2){
             ?>
           <tr>

           <td><?php echo $i;?></td>

           <td><?php echo date( "d-m-Y", strtotime($key2->billing_master_billdate))	;?></td>

           <td><?php echo $key2->billing_master_note	;?></td>

           <td><?php echo $key2->billing_master_customer_name	;?></td>

           <td>B2B sale</td>

           <td><?php echo $key2->billing_master_billno	;?></td>

        

          <td><?php echo $key2->billing_master_grandtotal;?></td>

          <td><?php echo $key2->billing_master_paid_amount;?></td>

           

           </tr>
           <?php
            $credittotal+=$key2->billing_master_grandtotal;
            $debittotal+=$key2->billing_master_paid_amount;
               $i++;
               }
             ?>
<?php 
               
               foreach($purchase as $key3){
             ?>
           <tr>

           <td><?php echo $i;?></td>

           <td><?php echo date( "d-m-Y", strtotime($key3->purchase_master_billdate))	;?></td>

           <td><?php echo $key3->purchase_master_notes	;?></td>

            <td><?php echo $key3->sup_name;?></td>

           <td>Purchase</td>

           <td><?php echo $key3->purchase_master_billno	;?></td>

           <td><?php echo $key3->purchase_master_grandtotal;?></td>

          

          <td><?php if($key3->purchase_master_payment_mode==7){ echo $key3->purchase_master_grandtotal; } ?></td>
               <?php          
                           $credittotal+=$key3->purchase_master_grandtotal;
                          if($key3->purchase_master_payment_mode==7){ $debittotal+= $key3->purchase_master_grandtotal; }
            ?>
           

           </tr>
           <?php
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

           <td><?php echo $key4->sales_order_master_grand_total;?></td>

          

          <td><?php if($key4->sales_order_master_payment_mode	==7){ echo $key4->sales_order_master_grand_total; } ?></td>
               <?php          
                           $credittotal+=$key4->sales_order_master_grand_total;
                          if($key4->sales_order_master_payment_mode==7){ $debittotal+= $key4->sales_order_master_grand_total; }
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

           <td><?php echo $key4->sales_return_grandtotal;?></td>

          

          <td></td>
               <?php          
                           $credittotal+=0;
                          $debittotal+= $key4->sales_return_grandtotal; 
            ?>
           

           </tr>
           <?php
               $i++;
               }
             

             

foreach($deliverychellan as $key7){
             ?>
           <tr>

           <td><?php echo $i;?></td>

           <td><?php echo $key7->deliverychellan_master_date	;?></td>

           <td><?php echo $key7->deliverychellan_master_note;?></td>

           <td><?php echo $key7->deliverychellan_master_consignee_name;?></td>

           <td>Delivery Challan</td>

           <td><?php echo $key7->deliverychellan_master_chellanno;?></td>

           <td><?php echo $key7->deliverychellan_master_grandtotal;?></td>

          

          <td></td>
               <?php          
                           $credittotal+=0;
                          $debittotal+= $key7->deliverychellan_master_grandtotal; 
            ?>
           

           </tr>
           <?php
               $i++;
               }
             ?>
            </tbody>
            <tfoot>
               <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
                <td id="debit_total1"><?php echo $debittotal;?></td>
                <td id="credittotal1"><?php echo $credittotal;?></td>
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
        bSort:true,
       dom: 'Bfrtip',

        buttons: [

            'excelHtml5',

            'csvHtml5'

        ]

    })

  });
</script>



</body>



</html>



