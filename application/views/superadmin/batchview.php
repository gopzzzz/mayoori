<style>
.type_d, .type_e{
    display:none;
}
</style>
<div class="box-body table-responsive no-padding">
    <table id="viewbatchTable" class="table table-hover" >
        <thead>
            <tr>
                <th>#</th>
                <th>Batch</th>
                <th>Barcode</th>
                <th>HSN</th>
				<th>TAX %</th>

				<th class="type_t">Purchase Rate</th>
				<th class="type_t">Purchase Cost</th>
                <th class="type_t">Wholesale Rate</th>
				<th class="type_t">MRP</th>
				<th class="type_t">Selling Rate</th>
				<th class="type_t">MOP</th>

                <!-- <th class="type_d">Purchase Rate</th>
				<th class="type_d">Purchase Cost</th>
                <th class="type_d">Wholesale Rate</th>
				<th class="type_d">MRP</th>
				<th class="type_d">Selling Rate</th>
				<th class="type_d">MOP</th>

                <th class="type_e">Purchase Rate</th>
				<th class="type_e">Purchase Cost</th>
                <th class="type_e">Wholesale Rate</th>
				<th class="type_e">MRP</th>
				<th class="type_e">Selling Rate</th>
				<th class="type_e">MOP</th> -->

				<th>Incentive</th>
				<th>Opening Stock</th>
                <th>Action</th>

            </tr>
        </thead>
        <?php
			$i=1;
			foreach($batch_list as $key){
				
		?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $key->batchcode;?></td>
                <td> <?php echo $key->barcode;?></a></td>
                <td><?php echo $key->hsn_code;?></td>
                <td><?php echo $key->hsn_tax;?></td>

                <td class="type_t"><?php if($key->t_pr=='' || $key->t_pr=="0.00"){ echo $key->d_pr;} else{  echo $key->t_pr; }  ?></td>
                <td class="type_t"><?php  if($key->t_pc=='' || $key->t_pc=="0.00"){ echo $key->d_pc;} else{  echo $key->t_pc; } ?></td>
                <td class="type_t"><?php  if($key->t_wr=='' || $key->t_wr=="0.00"){ echo $key->d_wr;} else{  echo $key->t_wr; }  ?></td>
                <td class="type_t"><?php if($key->t_mrp=='' || $key->t_mrp=="0.00"){ echo $key->d_mrp;} else{   echo $key->t_mrp;  }?></td>
                <td class="type_t"><?php if($key->t_sr=='' || $key->t_sr=="0.00"){ echo $key->d_sr;} else{ echo $key->t_sr; }   ?></td>
                <td class="type_t"><?php if($key->t_mop=='' || $key->t_mop=="0.00"){ echo $key->d_mop;} else{  echo $key->t_mop; }   ?></td>

                <!-- <td class="type_d"><?php echo $key->d_pr;?></td>
                <td class="type_d"><?php echo $key->d_pc;?></td>
                <td class="type_d"><?php echo $key->d_wr;?></td>
                <td class="type_d"><?php echo $key->d_mrp;?></td>
                <td class="type_d"><?php echo $key->d_sr;?></td>
                <td class="type_d"><?php echo $key->d_mop;?></td>

                <td class="type_e"><?php echo $key->e_pr;?></td>
                <td class="type_e"><?php echo $key->e_pc;?></td>
                <td class="type_e"><?php echo $key->e_wr;?></td>
                <td class="type_e"><?php echo $key->e_mrp;?></td>
                <td class="type_e"><?php echo $key->e_sr;?></td>
                <td class="type_e"><?php echo $key->e_mop;?></td> -->

                <td><?php if( $key->incentive_type==1){ echo $key->in_peramount; }else if( $key->incentive_type==2){ echo $key->in_peramount.'%'; }
                else if( $key->incentive_type==3){ 
                    if($key->r1_type==2)
                    {
                        echo "above ".$key->range1.':'.$key->r1_amount.'%<br>'; 
                    }
                    else{
                        echo "above ".$key->range1.':'.$key->r1_amount.'<br>';
                    }
                    if($key->r2_type==2)
                    {
                        echo $key->range1.'-'.$key->range2.':'.$key->r2_amount.'%<br>'; 
                    }
                    else{
                        echo $key->range1.'-'.$key->range2.':'.$key->r2_amount.'<br>'; 
                    }
                    if($key->r3_type==2)
                    {
                        echo $key->range2.'-'.$key->range3.':'.$key->r3_amount.'%<br>';
                    }
                    else{
                        echo $key->range2.'-'.$key->range3.':'.$key->r3_amount.'<br>';
                    }
                    if($key->r4_type==2)
                    {
                        echo "above ".$key->range4.':'.$key->r4_amount.'%<br>';
                    }
                    else{
                        echo "above ".$key->range4.':'.$key->r4_amount.'<br>'; 
                    }
                    
                    
                    }?></td>
                <td><?php echo $key->amount;?></td>   
               
                <td><?php //echo anchor('del_item/'.$key->batch_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>
                    <a href="javascript:void(0)" data-id="<?php echo $key->itembatchId;?>" onClick="editBatch(this.getAttribute('data-id'))"><li class="fa fa-pencil" ></li></a>
                    <a href="javascript:void(0)" data-id="<?php echo $key->itembatchId;?>" data-incentiveid="<?php if($key->id!=""){echo $key->id;}else{echo "0";}?>" data-itemid="<?php echo $key->itm_id ;?>" onClick="addIncentive(this.getAttribute('data-id'),this.getAttribute('data-itemid'),this.getAttribute('data-incentiveid'))"><li class="fa fa-plus" ></li></a>
                    <a href="<?php echo base_url('print_barcode/').$key->itembatchId;?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                </td>
                
            </tr>
        <?php
			$i++;
		}
		?>    
    </table>
    </div>
    
    

<script>
  $(function () {
    $('#viewbatchTable').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  })
  $( "#show_tde" ).dblclick(function() {
	  $('.type_e').show();
	  $('.type_d').show();
  });

  function editBatch(id){

     

		$.ajax({ 
					type:"POST",
					url:'<?php echo site_url('Admin/editbatch');?>',
					data: { batchid : id},
					success:function(res){
						//console.log(res);
						$('#editBatch').html(res);
								
					},
		});	
		$('#editBatchModal').modal('show');

	}
    function addIncentive(id,itemid,incentiveid)
    {
        var incentiveid=incentiveid;
        console.log(incentiveid);
        if(incentiveid !=0)
        {
            var batch_id=id;
            var itemid=itemid;
            $('input[name="batch_id"]').val(batch_id);
            $('input[name="item_id"]').val(itemid);
            $('#ampercent').hide();
           // $('#ampercent').val();
            $('#bothfields').hide();
                

                var url="<?php  echo site_url('Admin/get_incentive_per_id');?>";
                $.ajax({
                        type: "POST",
                        url: url,
                        dataType: "json",
                        data: {batch_id:batch_id,itemid:itemid,incentiveid:incentiveid},
                        success: function (response) {
                            if(response!='')
                            {
                                var inc_id=response.id;
                                var batch_id=response.batch_id;
                                var item_id=response.item_id;
                                var inc_type=response.incentive_type;
                                var inperamount=response.in_peramount;
                            
                                var range1=response.range1;
                                var r1_amount=response.r1_amount;
                                var r1_type=response.r1_type;
                                var range2=response.range2;
                                var r2_amount=response.r2_amount;
                                var r2_type=response.r2_type;
                                var range3=response.range3;
                                var r3_amount=response.r3_amount;
                                var r3_type=response.r3_type;
                                var range4=response.range4;
                                var r4_amount=response.r4_amount;
                                var r4_type=response.r4_type;
                                $('input[name="id"]').val(inc_id);
                                if(inc_type==1)
                                {
                                    $('#ampercent').show();
                                      $('#bothfields').hide();
                                    $('input[name="inc_ampercent"]').val(inperamount);
                                    if($('input[name="inc_peramount"]').val()==1)
                                    {
                                        $('#inc_peramount1').attr('checked',true);
                                    }
                                }
                                else if(inc_type==2)
                                {
                                    $('#ampercent').show();
                                      $('#bothfields').hide();
                                    $('input[name="inc_ampercent"]').val(inperamount);
                                    if($('input[name="inc_peramount"]').val()==2)
                                    {
                                        $('#inc_peramount2').attr('checked',true);
                                    }

                                }
                                else if(inc_type==3)
                                {
                                    $('#ampercent').hide();
                                      $('#bothfields').show();
                                      $('#inc_peramount3').attr('checked',true);
                                       
                                      
                                          $('input[name="range1"]').val(range1);
                                          if(r1_type==1)
                                          {
                                              $('#inc_both11').attr('checked',true);
                                          }
                                          else{
                                            $('#inc_both12').attr('checked',true);
                                          }
                                          $('input[name="inc_botheampercent1"]').val(r1_amount)

                                          
                                     
                                          $('input[name="range2"]').val(range2);
                                          if(r2_type==1)
                                          {
                                              $('#inc_both21').attr('checked',true);
                                          }
                                          else{
                                            $('#inc_both22').attr('checked',true);
                                          }
                                          $('input[name="inc_botheampercent2"]').val(r2_amount)

                                          
                                     
                                          $('input[name="range3"]').val(range3);
                                          if(r3_type==1)
                                          {
                                              $('#inc_both31').attr('checked',true);
                                          }
                                          else{
                                            $('#inc_both32').attr('checked',true);
                                          }
                                          $('input[name="inc_botheampercent3"]').val(r3_amount)

                                          
                                    
                                     
                                          $('input[name="range4"]').val(range4);
                                          if(r4_type==1)
                                          {
                                              $('#inc_both41').attr('checked',true);
                                          }
                                          else{
                                            $('#inc_both42').attr('checked',true);
                                          }
                                          $('input[name="inc_botheampercent4"]').val(r4_amount)

                                          
                                      

                                }
                            }
                        }
                });

            $('input[name="inc_peramount"]:radio').click(function(){
                if($('input[name="inc_peramount"]:checked').val()==1)
                {
                    $('#ampercent').show();
                    $('#bothfields').hide();
                    
                }
                else if($('input[name="inc_peramount"]:checked').val()==2)
                {
                    $('#ampercent').show();
                    $('#bothfields').hide();
                }
                else{
                    $('#ampercent').hide();
                    $('#bothfields').show();
                }


            });
            
            $('#editincentive_modal').modal('show');
        }
        else if(incentiveid==0){
            var batch_id=id;
            var itemid=itemid;
            $('#inc_ampercent1').val("");
            $('input[name="batch_id"]').val(batch_id);
            $('input[name="item_id"]').val(itemid);
            $('#addampercent').hide();
            $('#addbothfieldsadd').hide();
            $('#inc_peramountadd1').attr('checked',true);
           
            $('input[name="inc_peramount"]:radio').click(function(){
                if($('input[name="inc_peramount"]:checked').val()==1)
                {
                    $('#addampercent').show();
                    $('#addbothfields').hide();
                    
                }
                else if($('input[name="inc_peramount"]:checked').val()==2)
                {
                    $('#addampercent').show();
                    $('#addbothfields').hide();
                }
                else{
                    $('#addampercent').hide();
                    $('#addbothfields').show();
                }


            });
            
            $('#incentive_modal').modal('show');
            
            
        }
       
    }
    $('#inc_peramountadd1').on('click',function(){
      $('#addampercentadd').show();
      $('#addbothfieldsadd').hide();
    });

    $('#inc_peramountadd2').on('click',function(){
      $('#addampercentadd').show();
      $('#addbothfieldsadd').hide();
    });
    $('#inc_peramountadd3').on('click',function(){
      $('#addampercentadd').hide();
      $('#addbothfieldsadd').show();
    });


    $('#incentiveaddnew').click(function()
    {
       var data= $('form#incentive').serialize();
       var action= $('form#incentive').attr('action');

       var url=action;
       $.ajax({
            type: "POST",
            url: "Admin/addincentive",
            data:{ 
                "data"  : data
           },
            success: function (response) {
                $('#incentive_modal').modal('hide');
               // console.log(response);
                location.reload();
            }
       });
    });

  
    $('#incentiveeditnew').click(function()
    {
        var id=$('input[name="id"]').val();
        var data= $('form#updateincentive').serialize();
       var action= $('form#updateincentive').attr('action');
       var url=action;
       $.ajax({
            type: "POST",
            url: url,
            data:{ 
                "data"  : data
           },
            success: function (response) {
                $('#editincentive_modal').modal('hide');
                console.log(response);
            }
       });
    });
</script>