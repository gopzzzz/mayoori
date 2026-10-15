<html>

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

      <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">  

    </head>

    <div class="form-group"> 

                <a href="<?php echo base_url('inventory_transfer');?>"><button type="button" class="btn btn-success btn-sm">Back</button></a>

            </div> 

		<br><br>

    <body onload="window.print()">

       <div class="container">

           <div class="row" style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid;">

           <div class="col-md-12 text-center"> MAYOORI</div>
                <div class="col-md-12 text-center">FURNITURE & ELECTRONICS</div>
                <div class="col-md-12 text-center"><?php echo  $address->address;?></div>
                <div class="col-md-12 text-center">Ph :<?php echo  $address->phonenum;?>,Email: <?php echo  $address->email;?></div>
                <div class="col-md-12 text-center">GST :<?php echo  $address->gst_num;?>   PAN :<?php echo  $address->pan_num;?></div>

           </div>

           <div class="row"  style="padding-bottom:20px;padding-top:20px">

               <div class="col-md-12 text-center"> INVENTORY TRANSFER</div>

           </div>

           <div class="row">

               <div style="width:50%;float:left">

                   <address> 

                    Transfer From :<?php echo $inventorymaster->name;?><br>

                    Transfer To       :<?php $to=$inventorymaster->inventory_to;$toname=$this->Admin_model->get_toname($to);echo $toname->name;?> <br>                        

                   

                    </address>

               </div>

               <div style="width:50%;float:left">

                   <address> 

                    Transfer Number   : <?php echo $inventorymaster->inventory_transfer_num;?><br>

                    Transfer Date: <?php echo $inventorymaster->inventory_date;?>

                    </address>

               </div>

           </div>

           <div class="row">

               <table style="width:100%;border-bottom: 2px dotted;padding-bottom:10px;margin-bottom:10px">

                   <thead>

                       <tr>

                           <th width="5%">Sl</th>

                           <th width="10%">Item Name</th>

                           <th width="10%">Item Code</th>

                          <th width="5%">Qty</th>

                           <th width="10%">Unit Price</th>

                           <th width="10%">GST %</th>

                           <th width="10%">Total Amount</th>

                         

                       </tr>

                   </thead>

                   <tbody>

                       <?php $i=1; foreach($inventoryitem as $inventoryitem){?>

                       <tr>

                           <td><?php echo $i; ?></td>

                           <td><?php echo $inventoryitem->itm_name; ?></td>

                           <td><?php echo $inventoryitem->itm_code; ?></td>

                           <td><?php echo $inventoryitem->inventory_trans_qty; ?></td>

                           <td><?php  echo $inventoryitem->inventory_trans_totalamount; ?></td>

                           <td><?php  echo $inventoryitem->hsn_tax; ?></td>

                           <td><?php echo $inventoryitem->inventory_trans_totalamount; ?></td>

                           

                       </tr>

                       <?php $i++;} ?>

                   </tbody>

               </table>

           </div>

           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">

               <div style="width:50%;float:right">

              

                 Total Amount                : <?php echo $inventorymaster->total_qtyamount;?><br>

               </div>

           </div>

           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">

               <div style="width:50%;float:left">

                   (Grand Total in Words)

               </div>

               <div style="width:50%;float:left">

                   Grand Total: <?php echo $inventorymaster->total_qtyamount;?>

               </div>

           </div>

          <!-- <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">

               Recived: <?php echo $inventorymaster->sales_master_amount_paid;?>   |   Balance: <?php echo $inventorymaster->sales_master_outstanding;?> <br>

               SGST :XXXX.XX| CGST :XXXX.XX| IGST :0

           </div>-->

          <!-- <div class="row">

                 <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">

                     You have Saved :***

             </div> -->

             <div class="col-md-12 text-center" style="padding-top:20px">

               Verify the bill before leaving the shop 

              </div>

           <div class="col-md-12 text-center">

                 CASH CANNOT BE REFUNDED       

                 </div>

             <div class="col-md-12 text-center" style="padding-bottom: 10px;border-bottom: 2px dotted;">

            THANK YOU

            </div>

            <!-- <div class="col-md-12" style="padding-top: 10px">

            Sales Man: JAISHID (21)<br>

            STAFF ID :XXX 

            </div> -->

           </div>

       </div> 

        

        

        <!-- jQuery 3 -->



        <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>



        <!-- Bootstrap 3.3.7 -->



        <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    </body>

</html>

  

  