
   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">BRANCH STOCK<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">BRANCH STOCK</a></li>

      </ol>

    </section><br>

  <style>
 
  table, td, th {
  border: 1px solid #cac6c6;
}

#example2 {
  border-collapse: separate;
  margin-top: 64px;
}
  </style>

    <!-- Main content -->

    <section class="content">
      
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">BRANCH STOCK</h3>
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
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <div class="col-sm-4">
           <!-- <select name="location" class="form-control" id="location_search">
           <option value="0">select location</option>
           <?php foreach($location as $loc){ ?>
           <option value="<?php echo $loc->godownid;?>"><?php echo $loc->name;?></option>
           <?php } ?>
           </select><br> -->
           </div>
      
         
            <table id="example2" class="table table-hover">
           
         <thead>
              <tr>
              <th>SL NO</th>
              <th>ITEM NAME</th>
              <th>BARCODE</th>
              <th>BRAND</th>
              <th>TAX %</th>
              <th>GROUP</th>
              <th>PURCHASE RATE</th>
              <th>SELLING RATE</th>
              <th>MRP</th>
              <th>ITEM CODE</th>
              <th>STOCK</th>
              </tr>
              </thead>
               <tbody id="tablestockdel">
               <?php 
               $i=1;
               foreach($itemlist as $key){?>
               <tr>
               <td><?php echo $i;?></td>
               <td><?php echo $key->itm_name;?></td>
               <td><?php echo $key->batchcode;?></td>
               <td><?php echo $key->brand_name;?></td>
               <td><?php echo $key->hsn_tax;?></td>
               <td><?php echo $key->ig_name;?></td>
               <!-- <td><?php if($key->t_pc=='0.00'){echo $key->e_pc;}else{echo $key->t_pc;}?></td> -->
               <td>--</td>
               <td><?php if($key->t_sr=='0.00'){echo $key->e_sr;}else{echo $key->t_sr;}?></td>
               <td><?php if($key->t_mrp=='0.00'){echo $key->e_mrp;}else{echo $key->t_mrp;}?></td>
               <td><?php echo $key->itm_code;?></td>
               <td><?php echo $key->cur_stock_item_count;?></td>
               </tr>
             
               <?php $i++;} ?>
             
             
               </tbody>
            
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
$('#location_search').on('change',function(){
var id=$(this).val();
if(id){
  $('#tablestockdel').empty();
	$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchlocationstock');?>',
          dataType: "json",
					data: { id: id },
					success: function (res) {
						console.log(res);
            var html_each="";
            $i=1;
            $.each( res, function( key, value ) {
              html_each+='<tr>';
              html_each+='<td>'+$i+'</td>';
              html_each+='<td>'+value.itm_name+'</td>';
              html_each+='<td>'+value.item_barcodenum+'</td>';
              html_each+='<td>00</td>';
              html_each+='<td>'+value.hsn_tax+'</td>';
              html_each+='<td>'+value.ig_name+'</td>';
              html_each+='<td>'+value.itm_prate+'</td>';
              html_each+='<td>'+value.itm_srate+'</td>';
              html_each+='<td>'+value.itm_mrp+'</td>';
              html_each+='<td>'+value.itm_code+'</td>';
              html_each+='<td>'+value.inventory_stock_itemcount+'</td>';
              html_each+='</tr>';
              $i++;
});
$('#tablestockdel').append(html_each);
					},
				});	
}
});
</script>

</body>

</html>

