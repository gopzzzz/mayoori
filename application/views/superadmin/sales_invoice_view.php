<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">  
    </head>
    <body >
       <div class="container">
      <a href="<?php echo base_url('customer_accounts');?>"> <button type="button" class="btn btn-sm btn-success">Back</button></a>
           <div class="row" style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid;">
           <div class="col-md-12 text-center"> MAYOORI</div>
                <div class="col-md-12 text-center">FURNITURE & ELECTRONICS</div>
                <div class="col-md-12 text-center"><?php echo  $address->address;?></div>
                <div class="col-md-12 text-center">Ph :<?php echo  $address->phonenum;?>,Email: <?php echo  $address->email;?></div>
                <div class="col-md-12 text-center">GST :<?php echo  $address->gst_num;?>   PAN :<?php echo  $address->pan_num;?></div>
           </div>
           <div class="row"  style="padding-bottom:20px;padding-top:20px">
               <div class="col-md-12 text-center"> SALE INVOICE </div>
           </div>
           <div class="row">
               <div style="width:50%;float:left">
                   <address> 
                    Bill Date  :<?php echo $datamaster->sales_master_date;?><br>
                    Time       :<?php echo $datamaster->sales_master_date;?> <br>                        
                    Bill No    :<?php echo $datamaster->sales_master_bill_no;?>   <br>                                     
                                                                     
                    Cust. Name : <?php echo $datamaster->sales_master_customer_name;?>  <br>                                               
                    Mob Number : <?php echo $datamaster->sales_master_phone_no;?><br>
                    Address    :<?php echo $datamaster->sales_master_customer_address;?>
                    </address>
               </div>
               <div style="width:50%;float:left">
                   <address> 
                    Delivery Date   : <?php echo $datamaster->sales_master_delivery_date;?><br>
                    Delivery Address: <?php echo $datamaster->sales_master_delivery_address;?>
                    </address>
               </div>
           </div>
           <div class="row">
               <table style="width:100%;border-bottom: 2px dotted;padding-bottom:10px;margin-bottom:10px">
                   <thead>
                       <tr>
                           <th width="5%">Sl</th>
                           <th width="10%">Hsn</th>
                           <th width="10%">MRP</th>
                           <th width="20%">Item Name</th>
                           <th width="5%">Qty</th>
                           <th width="10%">Taxable Amt</th>
                           <th width="10%">Gst%</th>
                           <th width="10%">Gst Amt</th>
                           <th width="10%">Cess 1%</th>
                           <th width="10%">T.Amt</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $i=1; foreach($datatrans as $sinletransaction){?>
                       <tr>
                           <td><?php echo $i; ?>></td>
                           <td><?php echo $sinletransaction->sales_trans_hsn_code; ?></td>
                           <td><?php echo $sinletransaction->itm_mrp; ?></td>
                           <td><?php echo $sinletransaction->itm_name; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_qty; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_taxable_value; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_gst_percentage; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_gst_amount; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_cess; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_total; ?></td>
                       </tr>
                       <?php $i++;} ?>
                   </tbody>
               </table>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:right">
                 Total Taxable Amount        : <?php echo $datamaster->sales_master_tot_taxable_amount;?> <br>
                 Total GST Amount            : <?php echo $datamaster->sales_master_tot_gst_amount;?> <br>
                 Total Kerala flood Cess     : <?php echo $datamaster->sales_master_total_cess;?> <br>
                 Delivery/Other Charge       : <?php echo $datamaster->sales_master_delivery_charge;?>  <br>
                 Total Discount              : <?php echo $datamaster->sales_master_discount;?> <br>
                 Total Amount                : <?php echo $datamaster->sales_master_tot_taxable_amount;?><br>
               </div>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:left">
                   (Grand Total in Words)
               </div>
               <div style="width:50%;float:left">
                   Grand Total: <?php echo $datamaster->sales_master_grand_total;?>
               </div>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               Recived: <?php echo $datamaster->sales_master_amount_paid;?>   |   Balance: <?php echo $datamaster->sales_master_outstanding;?> <br>
               SGST :0 | CGST :0 | IGST :0
           </div>
           <div class="row">
                 <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
                     You have Saved :***
             </div> 
             <div class="col-md-12 text-center" style="padding-top:20px">
               Verify the bill before leaving the shop 
              </div>
           <div class="col-md-12 text-center">
                 CASH CANNOT BE REFUNDED       
                 </div>
             <div class="col-md-12 text-center" style="padding-bottom: 10px;border-bottom: 2px dotted;">
            THANK YOU
            </div>
            <div class="col-md-12" style="padding-top: 10px">
            Sales Man: JAISHID (21)<br>
            STAFF ID :XXX 
            </div>
           </div>
       </div> 
        
        
        <!-- jQuery 3 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
  
  