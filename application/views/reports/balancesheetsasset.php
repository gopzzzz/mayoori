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
.form-group{
    padding-top: 20px;
}
</style>

<?php $data['leftmenu']='inventory_reports';$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Balancesheet</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Balancesheet</a></li>

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
					

					<?php echo form_open_multipart('balancesheetasset');?>



<div class=" col-sm-3" style="width: 200px;">


<input type="date" name="from" class="form-control" id="from" value="<?php echo $from;?>">
<input type="date" name="to" class="form-control" id="to" value="<?php echo $to;?>" >

	
</div>


	<div class="input-group-btn">

	  <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      <a href="<?php echo base_url('balancesheetasset');?>"><button type="button"  class="btn btn-default">Refresh</button></a>
	</div>
 </form>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding row">
				
					<div class="container">
                    <!-- <div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="openCity('London')">Fixed Assets</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Paris')">Investment</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Current Aseets</button>
</div> -->

<div id="London" class="w3-container city">
  
 <table class="table table-bordered">
     <thead>
         <th>Liability</th>
         <th>Amount</th>
         <th>Asset</th>
         <th>Amount</th>
         <!-- <th>Depriciation</th> -->
     </thead>
     <tbody>
         <?php foreach($fixedasset as $fixedasset){?>
         <tr>
             <td></td>
             <td></td>
             <td><?php echo $fixedasset->le_name;?></td>
             <td><?php echo $fixedasset->amount;?></td>
             <!-- <td><?php $date=$fixedasset->date;$diff = strtotime($today) - strtotime($date);
      
   
              $datedifference=abs(round($diff / 86400));
            //  echo $datedifference;
      
       if($datedifference<365){
        echo $fixedasset->amount;
       }else{
           
         $byear=$datedifference/365;
         
         $bamount=$fixedasset->amount-((($fixedasset->amount)*($byear*10))/100);
         echo round($bamount);
       } ;?></td> -->
         </tr>
         <?php } ?>
         <tr>
             <td></td>
             <td></td>
             <td>Sundry Debtors</td>
             <td><?php echo $sundrydebtors->sumamount;?></td>
         </tr>
         <?php if(!empty($cashinhands)){ ?>
            <tr>
             <td></td>
             <td></td>
             <td>Cash In hand</td>
             <td><?php echo $cashinhands->balance;?></td>
         </tr>
        <?php  }?>

        <tr>
             <td></td>
             <td></td>
             <td>Closing Stock</td>
             <td><?php echo $sum;?></td>
         </tr>
        
        <?php foreach($liability as $liability){?>
            <tr>
             <td><?php echo $liability->le_name;?></td>
             <td><?php echo $liability->amount;?></td>
             <td></td>
             <td></td>
         </tr>
        <?php  } ?>
        <tr>
             <td>Sundry Creditors</td>
             <td><?php echo $sundry;?></td>
             <td></td>
             <td></td>
         </tr>
        
</tbody>
 </table>
</div>

<div id="Paris" class="w3-container city" style="display:none">
  <h2>Investments</h2>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="w3-container city" style="display:none">
  <h2>Current Assets</h2>
  <p>Tokyo is the capital of Japan.</p>
</div>

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
	</script>
    
<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>

	</body>

	</html>