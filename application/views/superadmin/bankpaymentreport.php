<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">  
      <style type="text/css" media="print">
      @media print { 
.btn-success{
    display:none;
}
.no-print{
    display:none;
  }
@page {
           margin-top: -100px;;
           margin-bottom: 0;
           margin-left:-100px;
           font-size:15px;
         }
         @page :footer {
        display: none
    }

    @page :header { 
        display: none
    } 
    @page
   {
    size: 5.5in 8.5in;
  }
  a[href]:after {
        content: none !important;
    }
}


      </style>
    </head>
    <body onload="window.print()">
       <div class="container">
      <a href="<?php echo base_url('bank_payments');?>" class="no-print"> <button type="button" class="btn btn-sm btn-success">Back</button></a>
           <div class="row" style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid;">
                <div class="col-md-12 text-center"> MAYOORI</div>
                <div class="col-md-12 text-center">FURNITURE & ELECTRONICS</div>
                <div class="col-md-12 text-center"><?php echo  $address->address;?></div>
                <div class="col-md-12 text-center">Ph :<?php echo  $address->phonenum;?>,Email: <?php echo  $address->email;?></div>
                <div class="col-md-12 text-center">GST :<?php echo  $address->gst_num;?>   PAN :<?php echo  $address->pan_num;?></div>
           </div>
           <div class="row"  style="padding-bottom:20px;padding-top:20px">
               <div class="col-md-12 text-center"> BANK PAYMENT INVOICE </div>
           </div>
           <div class="row">
               <div style="width:50%;float:left">
                   <address> 
                    Date  :<?php echo date("d-m-Y",strtotime($bankpayment_details->date));?><br>
                                          
                    Referal Number	    :<?php echo $bankpayment_details->referalnumber;?>   <br>                                     
                                                                     
                    Ledger: <?php echo $bankpayment_details->ledger	;?>  <br>                                               
                    Amount : <?php echo $bankpayment_details->amount	;?><br>
                   Reciept To Pay   :<?php echo $bankpayment_details->receiptorpay_on;?>
                    </address>
               </div>
               <div style="width:50%;float:left">
                   <address> 
                   Payment Number  : <?php echo $bankpayment_details->paymentnumber;?><br>
                   Narration: <?php echo $bankpayment_details->narration;?><br>
                Receipt Number	:<?php echo $bankpayment_details->receiptnumber; ?>
                Bank Name	:<?php echo $bankpayment_details->bank_name	; ?>
                    </address>
               </div>
           </div>
           <div class="row">
               <table  class="table table-bordered" style="width:100%;border-bottom: 2px dotted;padding-bottom:10px;margin-bottom:10px;border:2px dotted;">
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
                      
                   </tbody>
               </table>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:right">
                 Total Taxable Amount        : <?php //echo $datamaster->sales_master_tot_taxable_amount;?> <br>
                 Total GST Amount            : <?php //echo $datamaster->sales_master_tot_gst_amount;?> <br>
                 Total Kerala flood Cess     : <?php //echo $datamaster->sales_master_total_cess;?> <br>
                 Delivery/Other Charge       : <?php //echo $datamaster->sales_master_delivery_charge;?>  <br>
                 Total Discount              : <?php //echo $datamaster->sales_master_discount;?> <br>
                 Total Amount                : <?php // echo $datamaster->sales_master_grand_total;?><br>
               </div>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:left">
               
                              
                   
               </div>
               <div style="width:50%;float:left">
                   Grand Total: <?php //echo $datamaster->sales_master_grand_total;?>
               </div>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
           
               Recived: <?php //if($datamaster->sales_master_payment_mode==4){ echo $datamaster->sales_master_amount_paid+$datamaster->sales_master_bankamount;}else{ echo $datamaster->sales_master_amount_paid;}?>   |   Balance: <?php //echo $datamaster->sales_master_outstanding;?> <br>
               SGST :<?php //echo $sgst;  ?> | CGST :<?php //echo $cgst;  ?> | IGST :0
           </div>
           <div class="row">
                 <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
                     You have Saved :
                               
             </div> 
             <div class="col-md-12">
               Note:<?php //echo $datamaster->sales_master_note; ?>
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
            Sales Man: <?php //echo $employee->stf_name;?><br>
            STAFF ID :<?php //echo $employee->stf_code;?> 
            </div>
           </div>
       </div> 
        
        
        <!-- jQuery 3 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
  
  