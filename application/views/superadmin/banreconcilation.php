

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







  <!-- Content Header (Page header) -->



  <section class="content-header">



    <h1 align="center">BANK RECONCILIATION<small>Preview</small></h1>



    



    <ol class="breadcrumb">



      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



      <li><a href="<?php echo base_url().'banreconcilation';?>">BANK RECONCILIATION</a></li>



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

            <h3 class="box-title">BANK RECONCILIATION</h3>

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

          <div class="col-sm-12">

         <div class="col-sm-2 labeltext divtext"><label >Bank Name</label>

          </div>

          

          <div class="col-sm-2 divtext">

          <select name="bank" class="form-control" id="bankname">



          <?php foreach($bank as $key){?>

          <option value="<?php echo $key->ba_id;?>"><?php echo $key->ba_acnumber;?>,<?php echo $key->ba_holdname;?></option>

          <?php } ?>

          </select>

          </div>

          <div class="col-sm-1 labeltext divtext">

          <label>From Date</label>

          </div>

          <div class="col-sm-2 divtext">

          <input class="form-control" type="date" name="date" id="from">

          </div>

          <div class="col-sm-1 labeltext divtext">

          <label>To Date</label>

          </div>

          <div class="col-sm-2 divtext">

          <input class="form-control" type="date" name="date" id="to">

          </div>

          <div class="col-sm-1 divtext">

         <button type="button" class="btn btn-primary btn-sm search">Search</button>

          </div>

          </div>

          <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/updatebankdate');?>" >
			

          <table id="example21" class="table table-hover">

         

       <thead>

            <tr>

            <th>SL NO</th>

            <th>DATE</th>

            <th>PARTICULARS</th>

            <th>VOUCHER TYPE</th>

            <th>TRANSACTION TYPE</th>

            <th>CHQ NO</th>

            <th>CHQ DATE</th>

            <th>BANK DATE</th>

            <th>DEBIT</th>

            <th>CREDIT</th>

            </tr>

            </thead>

             <tbody id="banklist">

             <?php $i=1;

             foreach($bankrecon as $key){

             ?>

             <tr>

             <td><?php echo $i;?></td>

             <td><?php echo $key->date?></td>

             <td><?php echo $key->ledger?></td>

             <td><?php if($key->payment_type==1){echo "Payment";}else if($key->payment_type==2){echo "Receipt";}?></td>

             <td><?php if($key->cheque_num==null){ echo "Online";}else{ echo "Cheque";}?></td>

             <td><?php echo $key->cheque_num;?></td>

             <td><?php echo $key->cheque_date?></td>

             <td><input type="date" name="bank_date[]" class="form-control">
             <input type="hidden" name="bankdateid[]" class="form-control" value="<?php echo $key->bp_id;?>"></td>
             
             <td><?php if($key->payment_type==1 || $key->payment_type==3 ){echo $key->amount;}?></td>

             <td><?php if($key->payment_type==2 || $key->payment_type==4){echo $key->amount;}?></td>

            

             </tr>

             <?php $i++; } ?>

           

          

         

           

             </tbody>

          

          </table>

          <div style="align:right;">

          <button type="submit" class="btn btn-primary btn-lg">SAVE</button>
             </form>

          </div>

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

$('.search').on('click',function(){

var bank=$('#bankname').val();

var from=$('#from').val();

var to=$('#to').val();

if(bank && from && to){

// alert(bank);

$.ajax({

          type:"POST",

                dataType: 'json',

          url:'<?php echo site_url('Admin/get_bankreconcialisationfetch');?>',

          data: { bank : bank , from:from, to:to},

            success:function(res){console.log(res);

             var html_each="";

             var id=1;

             $('#banklist').empty();

                      jQuery.each(res, function(index, item) {

           html_each+='<tr>';

           html_each+='<td>'+id+'</td>';

           html_each+='<td>'+item.date+'</td>';

           html_each+='<td>'+item.ledger+'</td>';

           html_each+='<td>'+item.payment_type+'</td>';

           html_each+='<td>cheque/online</td>';

           html_each+='<td>chequenum</td>';

           html_each+='<td>'+item.cheque_date+'</td>';

           html_each+='<td><input type="date" class="form-control"></td>';

           html_each+='<td>'+item.amount+'</td>';

           html_each+='<td>'+item.amount+'</td>';

           html_each+='</tr>';

        id++;

      });

      $('#banklist').append(html_each);

           console.log(html_each);

            },

        });	

}else{

 alert("select required fiels");

}

})

</script>

</body>



</html>



