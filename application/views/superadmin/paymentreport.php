

   <?php $data['leftmenu']='bankaccountcreate'; $data['mainmenu'] = 'details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">PAYMENT REPORT<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="<?php echo base_url().'bank_receipts';?>">PAYMENT REPORT</a></li>



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

            <h3 class="box-title">PAYMENT REPORT</h3>

            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





            <div class="box-tools">
              <form action="" method="POST">
                <div class="input-group input-group-sm" style="width: 300px;display: inline-flex;margin-right: 40px;">

                  <input type="date" name="date_from" class="form-control pull-right" placeholder="From" value="<?=$date_from?>">

                  <input type="date" name="date_to" class="form-control pull-right" placeholder="From" value="<?=$date_to?>">

                  <div class="input-group-btn">

                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                  </div>

                </div>
              </form>
            </div>

          </div>

         


          <div class="box-body table-responsive no-padding">

           

          

            <table id="example2" class="table table-hover">

            <thead>

              <tr>

                <th>#</th>

                <th>Date</th>

                <th>Type</th>

                <th>Referal Number</th>

               

                <th>Payment Mode</th>

                <th>Bank Account</th>

                <th>Cheque Date</th>

                <th>Amount</th>

                <th>Ledger</th>

                <th>Narration</th>

                


                

              </tr>

               </thead>

              <?php

          $i=1;

          foreach($report as $key){

                  ?>

              <tr>

                <td><?php echo $i;?></td>

                

                 <td><?php echo date('d-m-Y', strtotime($key->date));?></td>

                 <td><?php if($key->receiptorpay_on==1){ echo "Normal";}else if($key->receiptorpay_on==2){ echo "Agaist B2C";}else if($key->receiptorpay_on==3){echo "Against B2B";}else if($key->receiptorpay_on==4){ echo "Agaist Purchase";}else if($key->receiptorpay_on==5){ echo "Salary Ledger";}else if($key->receiptorpay_on==7){echo "Agaist Sale Order";}else if($key->receiptorpay_on==8){echo "Bank Ledger";}?></td>

                   <td><?php if($key->payment_type==1) { echo "BPAY";}else if($key->payment_type==3){echo "CPAY";}?><?php echo $key->referalnumber;?></td>

                   <td><?php if($key->payment_type==1) { echo "BANK";}else if($key->payment_type==3){echo "CASH";}?></td>

                    <td><?php echo $key->ba_acnumber;?></td>

                     <td><?php if($key->cheque_date==null){echo "00-00-0000";}else{echo date('d-m-Y', strtotime($key->cheque_date));}?></td>

                     <td><?php echo $key->amount;?></td>

                      <td><?php if($key->receiptorpay_on==1){ echo $key->le_name; }else if($key->receiptorpay_on==4){ echo $key->sup_name;}else if($key->receiptorpay_on==5){echo $key->stf_name;}else{ echo $key->cus_name; } ?></td>

                      <td><?php echo $key->narration;?></td>

                      


              </tr>

              

              

              

              <!--------------------------------------------------------->

            

             

              

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




</body>



</html>



