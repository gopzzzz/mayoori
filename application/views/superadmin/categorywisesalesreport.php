<style>
p a {
    color: #3c8dbc;
    padding: 11px;
    border: 1px solid #3c8dbc;
    background-color: #3c8dbc;
    color: white;
}
</style>

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">Category wise Report<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="#">Category wise Report</a></li>



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

            <h3 class="box-title">Category Wise Report</h3>

            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	




            
            <div class="box-tools">
             
              <div class="input-group input-group-sm" style="width: 150px;" id="barcodeprintselect">
                <form method="POST" action="<?php echo base_url('categorywisesalesreport');?>">
                  
                    <input type="date" name="fdate" class="form-control" value="" >
                    <input type="date" name="tdate" class="form-control" value="" >

                    <label>Item group</label>
                    <select name="itm_group" class="form-control" >
                        <option value="">Select Item Group</option>
                        <?php foreach($itemgroups as $itmgroup){?>
                        <option value="<?php echo $itmgroup->ig_id;?>"> <?php echo $itmgroup->ig_name;?></option>
                        <?php } ?>
                    </select><br>
                    <label>Item Category</label>
                    <select name="itm_category" class="form-control" >
                        <option value="">Select Item Category</option>
                        <?php foreach($category as $category){?>
                        <option value="<?php echo $category->itcat_id;?>"> <?php echo $category->itcat_name;?></option>
                        <?php } ?>
                    </select><br>
                    <label>Item Name</label>

                   
                    <input type="text"  id="itemname" class="form-control itemnamewise" placeholder="Enter item name">

                    <input class="form-control " name="itemname" type="hidden" id="itemid">

                    <div id="name_list"></div>
                   
                    <div class="input-group-btn">

                    <button type="submit"  name="filter" class="btn btn-default">filter</button>
                   <a href="<?php echo base_url('categorywisesalesreport');?>"><button  type='button' class="btn btn-default">Reset</button></a>

                    </div>
                </form>

             
              </div>
              

            </div>

          </div>

          <!-- /.box-header -->

          <div class="box-body table-responsive no-padding">

          <table  class="table table-hover" style=" overflow-x: scroll;" >

         
<thead>
       

            <tr>

            <th>SL NO</th>

            <th>BILL DATE</th>

            <th>BILL NO</th>

            <th>AMOUNT WITHOUT TAX</th>

            <th>TAX AMOUNT</th>

            <th>ITEM NAME</th>

            <th>QTY</th>

            <th>TAX </th>

            <th>ITEM GROUP</th>

            <th>DEPARTMENT</th>

            <th>SUPPLIER</th>

            <th>CATEGORY</th>

            <th>SUB CATEGORY</th>

            <th>COMMODITY</th>

            </tr>

            

            <?php 
               $total=0;
              // $total1=0;
              foreach($categorywisesales as $key){ 
                $total+=$key->sales_trans_total; 
                // $total1+=$key->sales_trans_gst_amount;
               }
               ?>
</thead>
<tr>

<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Total :</td>
<td><?php echo $total;?></td>
</tr>
           
             <?php 
              $i=1;
              foreach($categorywisesales as $key1){
            ?>
             <tr>

             <td><?php echo $i;?></td>

             <td><?php echo $key1->sales_master_date;?></td>

             <td><?php echo $key1->sales_master_bill_no;?></td>

             <td><?php echo $key1->sales_trans_taxable_value	;?></td>

             <td><?php echo $key1->sales_trans_gst_amount;?></td>

             <td><?php echo $key1->itm_name;?></td>

             <td><?php echo $key1->sales_trans_qty;?></td>

             <td><?php echo $key1->sales_trans_gst_percentage;?></td>

             <td><?php echo $key1->ig_name;?></td>

             <td><?php echo '';?></td>

             <td><?php echo '';?></td>

             <td><?php echo  $key1->itcat_name;?></td>

             <td><?php echo '';?></td>

             <td><?php echo '';?></td>

             <td><?php echo '';?></td>
            

             </tr>

             <?php
              $i++;
              }
            ?>

            

           

            

          

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

});

 $('#itemname').on('keyup', function () {
		
    var itemName = $(this).val();
    //alert(itemName);
    if (itemName != '' && itemName != 0) {
      $.ajax({
        type: "POST",
        url: '<?php echo site_url('Admin/searchItemNameListbarcode1');?>',
        data: { itemName: itemName },
        success: function (res) {
          console.log(res);
          if (res) {
            $('#name_list').show();
            $('#name_list').html(res);
          } else {
            $('#name_list').html("");
          }
        },
      });	
        }
    else{
      $('#name_list').html("");
    }
}); 

$('#barcodeprintselect').on('click','.subSelect_itemedit',function(){
  
  var itemValue = $(this).data('value');
  //alert(itemValue);
 
  $('#name_list').hide();
  $.ajax({
        type:"POST",
        url:'<?php echo site_url('Admin/getBatchByItem');?>',
        data: { itemValue : itemValue},
           success:function(res){
              var batchlist = JSON.parse(res);
              console.log(res);
              var i;
              var optiondata= '<option value="">Select</option>';
              for(i=0;i<batchlist.length;i++){
                 
                 optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

              }
              
              $('#itembatchid').html(optiondata);
              $('#itemid').val(batchlist[0].itm_id);
              $('#itemname').val(batchlist[0].itm_name);
              
              
           }
  })
});



</script>




</body>



</html>



