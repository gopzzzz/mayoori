

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

 

<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">SALES ORDER SUMMERY<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="<?php echo base_url('b2csalessummery')?>">SALES ORDER SUMMERY</a></li>



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
hr{
  border-top: 1px dotted red;
}
</style>



  <!-- Main content -->



  <section class="content">

    

      <div class="row">

      <div class="col-xs-12">

        <div class="box">

          <div class="box-header">

            <h3 class="box-title">SALES ORDER SUMMERY</h3>
            <br>

            <a href="<?php echo base_url('salesordersummery');?>">
            <button type="button" class="btn btn-success btn-sm">REFRESH</button></a>
           
            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





            <div class="box-tools">

            <div class="input-group input-group-sm" style="width: 150px;">

              <form method="POST" action="<?php echo base_url('salesordersummery');?>">
              <input type="date" name="from" class="form-control pull-right" value="<?php echo $from;?>"/>
              <input type="date" name="to" class="form-control pull-right" value="<?php echo $to;?>"/>



                <div class="input-group-btn">

                <button type="submit" name="filter" class="btn btn-default">Filter</button>

              </div> 
              </form>

              </div>

            </div>

          </div>

          <!-- /.box-header -->

          <div class="box-body table-responsive no-padding">

         

          <table  class="table table-hover" id="example2" >
        

       
          <thead>
          

            <th>SL NO</th>

            <th>BILL DATE</th>

            <th>BILL NUMBER</th>

            <th>TAXABLE VALUE</th>

            <th>GST</th>

           

            <th>OTHER CHARGES</th>

            <th>DISCOUNT</th>

            <th>TOTAL</th>

            <th></th>
          

            </thead>

             <tbody>

             <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td id="totalsaleorder"><?php echo $salesum;?></td>
            <td id="totalsummery"><?php foreach($salesordersummery1 as $key2){
              if($key2->sales_order_edited==0){
               
              }else{
                $keysum+=$key2->sales_order_master_grand_total-$key2->sales_order_edited;
              }
              

            }
            echo $salesum+$keysum;echo "<br>";echo "<hr>";
           echo $keysum;
      
            ?></td>
            
            </tr>

         
             <?php 
              $i=1;
              foreach($salesordersummery as $key){
            ?>
             <tr>

             <td><?php echo $i;?></td>

             <td><?php echo date("d-m-Y",strtotime($key->sales_order_master_date));?></td>

             <td><?php echo $key->sales_order_master_bill_no;?></td>

             <td><?php echo $key->sales_order_master_tot_taxable_amount;?></td>

             <td><?php echo $key->sales_order_master_tot_gst_amount;?></td>

          

             <td><?php echo $key->sales_order_master_delivery_charge;?></td>

             <td><?php echo $key->sales_order_master_discount;?></td>

             <td><?php echo $key->sales_order_master_grand_total;?></td>

             <td <?php if($key->sales_order_master_grand_total-$key->sales_order_edited>0){?>style="color:green;font-size:15px;"<?php }else if($key->sales_order_master_grand_total-$key->sales_order_edited<0){ ?>style="color:red;"<?php }else{ ?>style="color:black;"<?php } ?>><?php if($key->sales_order_edited==0){ echo "0";}else{ echo $key->sales_order_master_grand_total-$key->sales_order_edited;}?></td>

            

             </tr>
             <?php
              $i++;
              }
            ?>
      
      </tr>

         
<?php 

 foreach($salesordersummery1 as $key1){
?>
<tr style="background-color:#dce0dd;">

<td><?php echo $i;?></td>

<td><?php echo date("d-m-Y",strtotime($key1->sales_order_master_date));?></td>

<td><?php echo $key1->sales_order_master_bill_no;?></td>

<td><?php echo $key1->sales_order_master_tot_taxable_amount;?></td>

<td><?php echo $key1->sales_order_master_tot_gst_amount;?></td>



<td><?php echo $key1->sales_order_master_delivery_charge;?></td>

<td><?php echo $key1->sales_order_master_discount;?></td>

<td><?php echo $key1->sales_order_master_grand_total;?></td>

<td <?php if($key1->sales_order_master_grand_total-$key1->sales_order_edited>0){?>style="color:green;font-size:15px;"<?php }else if($key1->sales_order_master_grand_total-$key1->sales_order_edited<0){ ?>style="color:red;"<?php }else{ ?>style="color:black;"<?php } ?>><?php if($key1->sales_order_edited==0){ echo "0";}else{ echo $key1->sales_order_master_grand_total-$key1->sales_order_edited;}?></td>



</tr>
<?php
 $i++;
 }
?>

             </tbody>

          

          </table>

          </div>

       

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

</script>



</body>



</html>



