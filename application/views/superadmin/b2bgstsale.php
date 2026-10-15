

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">B2B GST SALES REPORT LIST<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="#">B2B GST SALES REPORT LIST</a></li>



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

            <h3 class="box-title">B2B GST SALES REPORT LIST</h3>

      <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	

     		

            <div class="box-tools">
            <form method="POST" action="<?php echo site_url('b2bgstsale');?>">
            From Date:<input type="date" class="form-control" name="fromdate">
            To Date:<input type="date" class="form-control" name="todate">
            <div class="input-group input-group-sm" style="width: 150px;">
              
              
                <select name="gst" class="form-control">
                <option value="">Select HSN Code</option>
                <?php foreach($hsncode as $val){?>
                   <option value="<?php echo $val->hsn_id;?>"><?php echo $val->hsn_code;?></option>
                  <?php } ?>
                </select>

                <select name="taxpercentage" class="form-control">
                <option value="">Select Tax</option>
               
                   <option value="0">0%</option>
                   <option value="5">5%</option>
                   <option value="12">12%</option>
                   <option value="18">18%</option>
                   <option value="28">28%</option>
                </select>



               

                  <button type="submit" name="filter_bill" class="btn btn-default">Filter</button>

              
                </form>
                <form method="POST" action="<?php echo site_url('gstreportexport');?>">
                <input type="hidden" name="from" value="<?php echo $from; ?>">
                <input type="hidden" name="to" value="<?php echo $to; ?>">
               <button  type="button" id="export"  >Expport to csv</button>
</form>
<a href="<?php echo base_url('b2bgstsale');?>"><button  type="button" >REFRESH</button></a>
              </div>

            </div>

          </div>

          <!-- /.box-header -->

          <div class="box-body table-responsive no-padding">

          <table  class="table table-hover dataTable">

         

       
          <thead>
            <tr>

            <th>SL NO</th>

            <th>INVOICE NO</th>

            <th>INVOICE DATE</th>

            <th>RECEIVER NAME</th>

            <th>RECEIVER STATE</th>

            <th>STATE CODE</th>

            <th>PRODUCTS</th>

            <th>HSN CODE</th>

            <th>QTY</th>

            <th>UNIT PRICE</th>

            <th>tax %</th>

         

            <th>TOTAL TAXALE VALUE</th>

            <th>CGST</th>

            <th>SGST</th>

            <th>IGST</th>

          

            <th>TOTAL GST</th>

            <th>OTHER CHARGES</th>

            <th>DISCOUNT</th>

            <th>TOTAL INVOICE AMOUNT</th>

            </tr>
          </thead>

            

             <tbody>
             <?php 
              $i=1;
              foreach($gstbill as $key){
            ?>
             <tr>

             <td><?php echo $i;?></td>

             <td><?php echo $key->billing_master_billno;?>	</td>

             <td><?php echo date("d-m-Y",strtotime($key->billing_master_billdate));?></td>

             <td><?php echo $key->billing_master_customer_name	;?></td>

             <td><?php echo $key->billing_master_customer_address;?></td>

             <td></td>
             
             <td><?php echo $key->itm_name;?></td>

             <td><?php echo $key->hsn_code;?></td>

             <td><?php echo $key->billing_trans_qty;?></td>

             <td><?php echo $key->billing_trans_unitprice;?></td>

             <td><?php echo $key->hsn_tax;?> %</td>

           

             <td><?php echo $key->billing_trans_taxable_value;?></td>

             <td><?php if($key->sales_master_is_igst!=1 ){echo $key->billing_trans_gst_amount/2;}?></td>

             <td><?php if($key->sales_master_is_igst!=1 ){echo $key->billing_trans_gst_amount/2;}?></td>

             <td><?php if($key->sales_master_is_igst==1){echo $key->billing_trans_gst_amount;}?></td>

           

             <td><?php echo $key->billing_trans_gst_amount;?> </td>

             <td><?php echo $key->billing_master_delivery_charge;?></td>

             <td><?php echo $key->billing_master_discount;?></td>

             <td><?php echo $key->billing_trans_total;?></td>

             

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
$('#export').click(function() {
var titles = [];
var data = [];


$('.dataTable th').each(function() {
  titles.push($(this).text());
});


$('.dataTable td').each(function() {
  data.push($(this).text());
});

/*
 * Convert our data to CSV string
 */
var CSVString = prepCSVRow(titles, titles.length, '');
CSVString = prepCSVRow(data, titles.length, CSVString);

/*
 * Make CSV downloadable
 */
var downloadLink = document.createElement("a");
var blob = new Blob(["\ufeff", CSVString]);
var url = URL.createObjectURL(blob);
downloadLink.href = url;
downloadLink.download = "GST_b2bSales_Report.csv";

/*
 * Actually download CSV
 */
document.body.appendChild(downloadLink);
downloadLink.click();
document.body.removeChild(downloadLink);
});


function prepCSVRow(arr, columnCount, initial) {
var row = ''; // this will hold data
var delimeter = ','; // data slice separator, in excel it's `;`, in usual CSv it's `,`
var newLine = '\r\n'; // newline separator for CSV row


function splitArray(_arr, _count) {
  var splitted = [];
  var result = [];
  _arr.forEach(function(item, idx) {
    if ((idx + 1) % _count === 0) {
      splitted.push(item);
      result.push(splitted);
      splitted = [];
    } else {
      splitted.push(item);
    }
  });
  return result;
}
var plainArr = splitArray(arr, columnCount);

plainArr.forEach(function(arrItem) {
  arrItem.forEach(function(item, idx) {
    row += item + ((idx + 1) === arrItem.length ? '' : delimeter);
  });
  row += newLine;
});
return initial + row;
}
</script>



</body>



</html>



