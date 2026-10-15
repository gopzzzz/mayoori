

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

 

<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">DELIVERY NOTE<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="<?php echo base_url('b2csalessummery')?>">DELIVERY NOTE</a></li>



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
</style>



  <!-- Main content -->



  <section class="content">

    

      <div class="row">

      <div class="col-xs-12">

        <div class="box">

          <div class="box-header">

            <h3 class="box-title">DELIVERY NOTE</h3>
            <br>

            <a href="<?php echo base_url('deliverynote');?>">
            <button type="button" class="btn btn-success btn-sm">REFRESH</button></a>
           
           




            <div class="row">

          

            <?php echo form_open_multipart('deliverynote', array('onsubmit' => 'return validateForm()','name' => 'myForm'));?>
		
                
                      
                  <div class="col-sm-3"> <label>Supplier</label><select name="supplier" class="form-control"><option value="0">SELECT SUPPLIER</option><?php $i=0;foreach($supplier as $sup){?><option value="<?php echo $sup->sup_id;?>"><?php echo $sup->sup_name;?></option><?php $i++;} ?></select></div>
                  <div class="col-sm-3">  <label>Department </label><select name="department" class="form-control"><option value="0">SELECT DEPARTMENT</option><?php $i=0;foreach($itemgroup as $itemgroup){?><option value="<?php echo $itemgroup->ig_id ;?>"><?php echo $itemgroup->ig_name;?></option><?php $i++;} ?></select></div>
                  <div class="col-sm-3">  <label>Category </label><select name="category" class="form-control"><option value="0">SELECT CATEGORY</option><?php $i=0;foreach($itemcategory as $itemcat){?><option value="<?php echo $itemcat->itcat_id;?>"><?php echo $itemcat->itcat_name;?></option><?php $i++;} ?></select></div>
                 
                  <div class="col-sm-3">  <label>Route </label><select name="route" class="form-control"><option value="0">SELECT ROUTE</option><?php $i=0;foreach($routes as $route){?><option value="<?php echo $route->id;?>"><?php echo $route->routename;?></option><?php $i++;} ?></select></div>
                  <div class="col-sm-3">  <label>Bill Date </label><input type="date" name="billdate" class="form-control pull-right" value=""/></div>
               
                  <div class="col-sm-3">  <label>Delivery Date From</label><input type="date" name="fdate" class="form-control pull-right" value=""/></div>
                  <div class="col-sm-3">  <label>Delivery Date To</label><input type="date" name="tdate" class="form-control pull-right" value=""/></div>
                  
                  <div class="col-sm-3">  <label> </label><br><br><button type="submit" name="submit_search" class="btn btn-sm btn-success">Submit</button></div>




              
              </form>

              

              </div>
              <br>
    

          <!-- /.box-header -->

          <div class="box-body table-responsive no-padding">

          <table  class="table table-hover">
        

       
          <thead>
            <tr>

            <th>SL NO</th>

            <th>BILL DATE</th>

            <th>BILL NO</th>

            <th>DELIVERYDATE</th>


            <th>LOCATION</th>

            <th>ROUTE</th>

            <th>BATCH ID</th>

            <th>ITEM NAME</th>

            <th>QTY</th>

            <th>SUPPLIER</th>

            <th>TOTAL</th>

            </tr>

            </thead>

             <tbody>

        
             <?php 
              $i=1;
              foreach($deliverylist as $key){
            ?>
             <tr>

             <td><?php echo $i;?></td>

             <td><?php echo date("d-m-Y",strtotime($key->sales_order_master_date));?></td>

             <td><?php echo $key->sales_order_master_bill_no;?></td>

             <td><?php echo date("d-m-Y",strtotime($key->sales_order_master_delivery_date));?></td>

             <td><?php echo $key->location	;?></td>

             <td><?php echo $key->routename;?></td>

             <td><?php echo $key->batchcode;?></td>

             <td><?php echo $key->itm_name;?></td>

             <td><?php echo $key->sales_order_trans_qty;?></td>

             <td><?php echo $key->sup_name;?></td>

             <td><?php echo $key->sales_order_trans_total;?></td>

         
            

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



</body>



</html>



