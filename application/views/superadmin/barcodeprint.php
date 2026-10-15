
   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">BARCODE<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">BARCODE</a></li>

      </ol>

    </section><br>

  <style>
 
 
#example2 {
  border-collapse: separate;
}
.box-body{
    margin: 22px;
}
.divtext{
    margin-top: 21px;
}
#crud_table{
    margin-top:43px;
}
  </style>

    <!-- Main content -->

    <section class="content">
      
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
          
            <form   name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('barcodeprinting');?>" >
			
           
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">BARCODE</h4>
							</div>
							<input type="hidden" class="form-control" name="cg_id"  />
                            <div class="form-group col-sm-6" id="barcodeprintselect">
								<label for="exampleInputEmail1">Item Name</label>
								<input class="form-control nameItem" name="itemname" placeholder="Item Name " id="itemname">
            <input class="form-control " name="itemname" type="hidden" id="itemid">
            <div id="name_list"></div>
							</div>
              
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Batch ID</label>
                <select name="batchcode" class="form-control" id="itembatchid"></select>
							</div>
             
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Number of Stickers</label>
                <input class="form-control" name="numberofsticker" placeholder="Number of srickers">
							</div>
            
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Select Printer</label>
                <select name="printname" class="form-control">
            
            <option value="1">DATAMAX</option>
            <option value="2">ZEBRA</option>
          </select>
							</div>
              
						
							

								
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							
							</div>
						</div>
						</form>
           
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
  $('.nameItem').on('keyup', function () {
		
			var itemName = $(this).val();
      //alert(itemName);
			if (itemName != '' && itemName != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchItemNameListbarcode');?>',
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

