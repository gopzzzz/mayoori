

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">Sales Detailed Report<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="#">Sales Detailed Report</a></li>



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

            <h3 class="box-title">Sales Detailed Report</h3>

            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





            <div class="box-tools">
            
              <div class="input-group input-group-sm" style="width: 150px;">
                <form method="POST" action="">
                  
                    <input type="date" name="fdate" class="form-control" value="<?php echo $from;?>">
                    <input type="date" name="tdate" class="form-control" value="<?php echo $to;?>" >

                    <label>Employee</label>
                    <select name="employees" class="form-control">
                        <option value="">Select Employee</option>
                        <?php foreach($employees as $employee){ ?>
                        <option value="<?php  echo $employee->stf_id;?>" <?php if($empp==$employee->stf_id){echo 'selected';}?>><?php  echo $employee->stf_name;?></option>
                        <?php } ?>
                        
                      </select>
                      
                     
                    <select name="cat" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach($category as $category){ ?>
                        <option value="<?php  echo $category->itcat_id;?>" <?php if($cat==$category->itcat_id){echo 'selected';}?>><?php  echo $category->itcat_name;?></option>
                        <?php } ?>
                        
                      </select>

                    <div class="input-group-btn">

                    <button type="submit"  name="filter" class="btn btn-default">filter</button>
                    
                    <button type="button"  name="filter" class="btn btn-default">REFRESH</button>
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

            <th>BILL DATE</th>

            <th>BILL NO</th>

            <th>ITEM NAME</th>

            <th>ITEM GROUP</th>

            <th>ITEM CATEGORY</th>

            <th>SALES MAN</th>

            <th>SALES AMOUNT</th>

            <th>INCENTIVE</th>

            </tr>
            </thead>

            

             <tbody>
             <?php 
              $i=1;
              $totalamount=0;
              foreach($emplyeewisereport as $key){
            ?>
             <tr>

             <td><?php echo $i;?></td>

             <td><?php echo $key->added_date;?></td>

             <td><?php if($key->sale_type==1){ echo 'BC';}else{echo 'BB';} echo $key->billnumber;?></td>

             <td><?php echo $key->itm_name;?></td>

             <td><?php echo $key->ig_name;?></td>

             <td><?php echo $key->itcat_name;?></td>

             <td><?php echo $key->stf_name;	?></td>

             <td><?php echo $key->unitprice;?></td>

             <td><?php echo $key->incentiveamount;?></td>

               <?php  $totalamount+=$key->unitprice;?>
              
               <?php  $totalamountin+=$key->incentiveamount;?>

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
                <td>TotalAmount</td>
                <td><?php echo $totalamount;?></td>
                <td>Total Incentive </td>
                <td><?php echo $totalamountin;?></td>
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



