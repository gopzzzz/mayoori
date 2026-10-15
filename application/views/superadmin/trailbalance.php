<style>
	input[type=radio] {
		width: 17px;
		height: 17px;
	}

	.exampleInputEmail1 {
		font-size: 10px;
	}
	
	#searchbox tr{
	    height: 25px;
    border: 1px solid;
    background: #d0d0ff;
	}
	
	#searchModel label, #searchModel th, #searchModel .form-control, #searchModel td {
    font-size: 12px;
    text-align: center;
    }
    button.close{
        font-size: 39px;
    }
    .custsearchmodal{
        margin-left: 157px;
        margin-top: -25px;
    }
    /* Tooltip */
    #sales_cont .tooltip > .tooltip-inner {
    background-color: #f25252;
    color: #FFFFFF;
    border: 1px solid red;
    }

    /* Tooltip on top */
    #sales_cont .tooltip.top > .tooltip-arrow {
    border-top: 5px solid red;
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

<?php $data['leftmenu']='inventory_reports';$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Trail Balance</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Trail Balance</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		

		

		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />
			


						<div class="box-tools">
						


					</div>
					

					<?php echo form_open_multipart('trailbalance');?>



<div class=" col-sm-3" style="width: 200px;">


<input type="date" name="from" class="form-control" id="from" value="<?php echo $from;?>">
<input type="date" name="to" class="form-control" id="to" value="<?php echo $to;?>" >

	
</div>


	<div class="input-group-btn">

	  <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      <a href="<?php echo base_url('trailbalance');?>"><button type="button"  class="btn btn-default">Refresh</button></a>
	</div>
 </form>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table  class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>ACCOUNT GROUP</th>
                                    
									<th>DEBIT</th>
                                   
									<th>CREDIT</th>
                                  

								</tr>
							</thead>
                            <thead>
								<tr>
									<th></th>
									<th></th>
                                    
								
                                   
									<th id="outflow"></th>

                  <th id="inflow"></th>
                                  

								</tr>
							</thead>
							
							<?php
                            $i=1;
                            foreach($trailbalance as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
                                <td><?php echo $key['accountgroup'];?></td>
                               
                                
                                <td>
                                <input readonly type="text" value=" <?php if($key['amount']){echo $key['amount'];}else{echo "0";} ;?>" class="form-control outflow"></td>
                                <td><input readonly type="text" value="<?php if($key['amount1']){echo $key['amount1'];}else{echo "0";} ?>" class="form-control inflow"></td>
                              </tr>
							<?php
                            $i++;
                            }
                            ?>
  <tr>
								<td>31</td>
                                <td>Sales</td>
                               
                                <td><input readonly type="text" value="0" class="form-control outflow"></td>
                                <td> <input readonly type="text" value="<?php echo $slesb2c->paidsum+$slesb2b->paidsum;?>" class="form-control inflow"></td>
								</tr>
                                <!-- <tr>
								<td>32</td>
                                <td>Sales Order</td>
                               
                                <td><input type="text" value="0" class="form-control outflow"></td>
                                <td><input type="text" value="<?php echo $saleorder->paidsum+$saleorder->banksum;?>" class="form-control inflow"></td>
								</tr> -->
                                <tr>
								<td>33</td>
                                <td>Purchase</td>
                               
                                <td><input readonly type="text" value="<?php echo round($purchase->mysum);?>" class="form-control outflow"></td>
                                <td><input readonly type="text" value="0" class="form-control inflow"></td>
								</tr>
								<tr>
									<td>34</td>
									<td>Bank</td>
									<td><input readonly type="text" value="<?php echo $bankamount;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>
						<tr>
									<td>35</td>
									<td>Purchase Return</td>
									<td><input readonly type="text" value="0" class="form-control outflow"></td>
									<td><input readonly type="text" value="<?php echo $purchasereturn->Mysum;?>" class="form-control inflow"></td>
						</tr>
						<tr>
									<td>36</td>
									<td>Sales Return</td>
									<td><input readonly type="text" value="<?php echo $salesreturn->Mysum;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>
						<tr>
									<td>37</td>
									<td>Cash On Hand</td>
									<td><input readonly type="text" value="<?php echo $cashamount;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>
						<tr>
									<td>38</td>
									<td>Sundry Creditors</td>
									<td><input readonly type="text" value="0" class="form-control outflow"></td>
									<td><input readonly type="text" value="<?php echo $sundry;?>" class="form-control inflow"></td>
						</tr>

						<tr>
									<td>38</td>
									<td>Sundry Debtors</td>
									<td><input readonly type="text" value="<?php echo $sundrydebtors->sumamount;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>
						<tr>
									<td>38</td>
									<td>Closing Stock</td>
									<td><input readonly type="text" value="<?php echo $sum;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>
						<tr>
									<td>39</td>
									<td>Salary Ledger</td>
									<td><input readonly type="text" value="<?php echo $salaryledger->mysum;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>  
						<tr>
									<td>40</td>
									<td>Branch Ledger</td>
									<td><input readonly type="text" value="<?php echo $branchledger->mysum;?>" class="form-control outflow"></td>
									<td><input readonly type="text" value="0" class="form-control inflow"></td>
						</tr>  
						</table>
					
					</div>
					
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>

	</section>

	

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


$(".inflow").each(function() {    

calculateSum2();



}); 

$(".outflow").each(function() {    

calculateSum3();



}); 

        });

function calculateSum2() { 
 
 var sum = 0;        
 $(".inflow").each(function() {          
 if (!isNaN(this.value) && this.value.length != 0) {
   sum += parseFloat(this.value);
 }    
 });
 
 //alert(sum);
 $('#inflow').html(sum.toFixed(2));
 }

 function calculateSum3() { 
 
 var sum1 = 0;        
 $(".outflow").each(function() {          
 if (!isNaN(this.value) && this.value.length != 0) {
   sum1 += parseFloat(this.value);
 }    
 });
 
 
 $('#outflow').html(sum1.toFixed(2));
 }
	</script>


	</body>

	</html>