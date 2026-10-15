
 <?php $data['leftmenu']='ledgercreation'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1 align="center">Finance Creation<small>Preview</small></h1>

    

    <ol class="breadcrumb">

      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

      <li><a href="<?php echo base_url().'finance';?>">Finance Creation</a></li>

    </ol>

  </section><br>



  <!-- Main content -->

  <section class="content">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
      <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog" style="width:80%;">
                      <!-- Modal content-->
                      <form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('finance');?>>
                      <div class="modal-content">
                      
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Finance Creation</h4>
                          </div>
                          <div class="col-sm-6" >
                            <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
                            <h4 class="text-success">Finance Details</h4>
                            <hr>
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1" > Name</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="text" class="form-control" name="name"  onkeyup="fullnamefunction()" id="fullname">
                              </div>
                              
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1">Notes</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <textarea class="form-control" name="notes" onkeyup="addressfunction()"  id="note"></textarea>
                              </div>
                              
                              <!--<div class="col-sm-4">
                              <label class="exampleInputEmail1">Pincode</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
                              </div>-->
                              
                              
                              </div>
                              
                          </div>
                          <div class="col-sm-6" >
                          
                              
                              <div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
                              <h4 class="text-success">Account Group</h4>
                            <hr>
                              
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1">Account Group Details</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="hidden" class="form-control" name="acc_group" id="ac_group_id">
                              <input type="text" class="form-control" id="ac_group" name="acc_group" placeholder="Enter Accout Group"  >
                              <div id="ac_grouplist"></div>
                              </div>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                      </form>
                  </div>
      </div>
      
<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Finance Creation</h3>
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
            <table id="example2" class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Notes</th>
                <th>Account Group</th>
                <th>Action</th>
                
              </tr>
               </thead>
              <?php
          $i=1;
          foreach($finance as $key2){
                  ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $key2->finance;?></td>
                <td><?php echo $key2->fn_note;?></td>
                 <td><?php echo $key2->fn_account_group;?></td>
                                  
                <td><?php echo anchor('del_finance/'.$key2->id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key2->id;?>">Edit</button>
               </td>
              </tr>
              
              
              
              <!--------------------------------------------------------->
              <div class="modal fade" id="myModal2<?php echo $key2->id;?>" role="dialog">
              
                  <div class="modal-dialog" style="width:80%;">
                   <?php
  $id=$key2->id;
  $edit_area=$this->Admin_model->finance_edit($id);
  foreach($edit_area as $key3){
      
     
  }
  
  ?>
                      <!-- Modal content-->
                      <form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('finance');?>>
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Finance Updation </h4>
                          </div>
                          <div class="col-sm-6" >
                            <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
                            <h4 class="text-success">Finance Details</h4>
                            <hr>
                            <input type="hidden" class="form-control" name="fn_id" value="<?php echo $key3->id;?>"/>
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1" > Name</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="text" class="form-control ledgername" name="name" value="<?php echo $key3->finance;?>"  id="fullname">
                              </div>
                              
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1">Notes</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <textarea class="form-control" name="notes"  id="add"><?php echo $key3->fn_note;?></textarea>
                              </div>
                              
                              <!--<div class="col-sm-4">
                              <label class="exampleInputEmail1">Pincode</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
                              </div>-->
                              
                              
                              </div>
                              
                          </div>
                          <div class="col-sm-6" >
                          
                              
                              <div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
                              <h4 class="text-success">Account Group Details</h4>
                            <hr>
                              
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1">Account Group </label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="hidden" class="form-control" name="acc_group" id="acgp_id_edit<?php echo $key3->id;?>" data-value="<?php echo $key3->id;?>">
                              <input type="text" class="form-control accountgp" name="acc_group" id="acgp_edit<?php echo $key3->id;?>" data-id="<?php echo $key3->id;?>" value="<?php echo $key3->fn_account_group;?>"/>
                              <div id="ac_grouplist<?php echo $key3->id;?>"></div>
                              </div>
                              </div>
                           </div>

                           <div class="modal-footer">
                              <button type="submit" name="submit_edit" class="btn btn-primary">Submit</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                      </form>
                  </div>
                  
      </div>
                  
              
              
              
          
    
    
  
             
              
              <?php
              $i++;
              }
              ?>
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


$('#ac_group').on('keyup',  function () {
		
			var name = $(this).val();
			if (name != '') {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/getaccountgroup');?>',
					data: { name: name },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#ac_grouplist').show();
							$('#ac_grouplist').html(res);
						} else {
							$('#ac_grouplist').html("");
						}
					},
				});	
      		}
			else{
				$('#ac_grouplist').html("");
			}
  		});

      $("html").on('click','.accountgroupclickfunction',function(){

   var agname = $(this).closest('tr').find('#id_SCR').val();
   
   var agid = $(this).closest('tr').find('#fff').val();
   
   
   
   
   $('#ac_group').val(agname);
   $('#ac_group_id').val(agid);
   
   
   $('#ac_grouplist').hide();	
   
});

$('.accountgp').on('keyup',  function () {
		var id=$(this).data('id');
   
    var name = $(this).val();
    if (name != '') {
      $.ajax({
        type: "POST",
        url: '<?php echo site_url('Admin/getaccountgroup_edit');?>',
        data: { id:id,name: name },
        success: function (res) {
          console.log(res);
          if (res) {
            $('#ac_grouplist'+id).show();
            $('#ac_grouplist'+id).html(res);
          } else {
            $('#ac_grouplist'+id).html("");
          }
        },
      });	
        }
    else{
      $('#ac_grouplist'+id).html("");
    }
    });

    $("html").on('click','.accountgroupclickfunctionedit',function(){
      var sid=$(this).data('value');
      var id=$(this).data('id');
     
var agname = $(this).closest('tr').find('#id_SCR'+id).val();

var agid = $(this).closest('tr').find('#fff'+id).val();




$('#acgp_edit'+sid).val(agname);
$('#acgp_id_edit'+sid).val(agid);


$('#ac_grouplist'+sid).hide();	

});

</script>

</body>

</html>