<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crud extends CI_Controller {
public function __construct()    {  
parent::__construct();		
$this->load->model('Crud_model'); 
$this->load->library("pagination");
$this->load->helper('url');
}
public function export_csv(){ 

    $usersData = $this->Crud_model->get_profitandlossexport();

   
   $attObj=[];
  
   $single = array();
    foreach($usersData as $single){

        $data = array(
            'saledate' => $single['sales_master_date'],
            'billnumber' =>$single['sales_master_bill_no'],
            'itemanme' =>$single['itm_name'],
            'pcost'=>$single['e_pc']+$single['t_pc'],
            'unitprice'=>$single['sales_trans_unit_price'],
            'qnty'=> $single['sales_trans_qty'],
            'profit'=> ($single['sales_trans_unit_price'])-($single['e_pc']+$single['t_pc'])
            
            );
    
          array_push($attObj,$data);  
       
       
    }
  
  
 
    $filename = 'users_'.date('Ymd').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
  
    $file = fopen('php://output','w');
    $header = array("Bill Date","Bill Number","Item name","Purchase Cost","Unit price","Quantity","Profit"); 
    fputcsv($file, $header);
    foreach ($attObj as $key=>$line){ 
        fputcsv($file,$line); 
    }
    fclose($file); 
    exit; 
}
public function export_stock(){
    
 $usersData = $this->Crud_model->get_fullstock_reportcrud();
//echo "<pre>";print_r($usersData);exit;

  $attObj=array();
  foreach($usersData as $single){
    $batchid=$single['batch_id'];
    $purchasecount=$this->Crud_model->get_totalpurchasecountcrud($batchid);
    
    $physicalcount=$this->Crud_model->get_totalphysicalstockcountcrud($batchid);
    $purchasereturncount=$this->Crud_model->get_totalpurchasereturncountcrud($batchid); 

   
    $sale=$this->Crud_model->get_totalsalecount($batchid);
    $salereturn=$this->Crud_model->get_totalsalereturncount($batchid);
    
    if($single['t_pc']==0.00){
     $price=$single['e_pc'];
    }else{
     $price=$single['t_pc'];
     }
    $data = array(
        'Itemname' => $single['itm_name'],
        'batchcode' =>$single['batchcode'],
        'purchase' =>$purchasecount->mysum,
        'physicalstock'=>$physicalcount->mysum,
        'purchasereturn'=>$purchasereturncount->mysum,
        'sale'=>$sale->mysum,
        'salereturn'=>$salereturn->mysum,
        'purchasecost'=>$price
        );

       //echo "<pre>";print_r($data);
    
      array_push($attObj,$data);  
       
  }
//exit;
 
    $filename = 'stockreport_'.date('Ymd').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
   // get data 
  






    // file creation 
    $file = fopen('php://output','w');
    $header = array("Item Name","Item Code","Purchase","Physical Stock","Purchase Return","Sale","Sales Retune","Closing Stock"); 
    fputcsv($file, $header);
    foreach ($attObj as $key=>$line){ 
        fputcsv($file,$line); 
    }
    fclose($file); 
    exit; 
}

public function dcsv(){
    $table=$this->input->post('tablename');
    // $from=$this->input->post('from');
    $to=$this->input->post('to');
    if($table=='tbl_sales_master'){
        $usersData = $this->Crud_model->get_sales_masterdownload();
      
      
         $filename1 = 'tbl_sales_master.csv'; 
         header("Content-Description: File Transfer"); 
         header("Content-Disposition: attachment; filename=$filename1"); 
         header("Content-Type: application/csv; ");
        // get data 
       
     
     
     
     
     
     
         // file creation 
         $file = fopen('php://output','w');
         $header = array("sales_master_id","sales_master_bill_no","sales_master_date","sales_master_customer_name","sales_master_delivery_date","sales_master_phone_no","sales_master_veh_no","sales_master_customer_address","sales_master_delivery_address","sales_master_eway_billno","sales_master_login_id","sales_master_customer_login_id","sales_master_tot_taxable_amount","sales_master_tot_gst_amount","sales_master_delivery_charge","sales_master_total_cess","sales_master_discount","sales_master_round_off","sales_master_grand_total","sales_master_note","sales_master_outstanding","sales_master_amount_paid","sales_master_payment_mode","sales_master_is_igst","sales_master_cardnum","sales_master_cheque_no","sales_master_banktransaction_id","sales_master_bankamount","sales_master_bank","sales_master_financetype","sales_master_trans_mode","sales_master_finance_id","sales_added_date","sales_master_edited_date","sales_added_system","sales_edited_system"); 
         fputcsv($file, $header);
         foreach ($usersData as $key=>$line){ 
             fputcsv($file,$line); 
         }
         fclose($file); 
         exit; 
    }else{

        $usersData1 = $this->Crud_model->get_sales_transdownload($from,$to);
      
      
        $filename = 'tbl_sales_trans.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
       
        $file = fopen('php://output','w');
        $header = array("sales_trans_id","sales_trans_master_id","sales_trans_itm_code","sales_trans_qty","sales_trans_taxable_value","sales_trans_hsn_code","sales_trans_gst_percentage","sales_trans_gst_amount","sales_trans_cess","sales_trans_total","sales_trans_item_id","sales_trans_item_batch_id","sales_employee_name","sales_trans_unit_price","sales_trans_incentive_id","sales_trans_incentive_amount","sale_trans_mrp","deleted_status"); 
        fputcsv($file, $header);
        foreach ($usersData1 as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }
}

public function b2cexportsale(){
    $usersData = $this->Crud_model->get_b2csalesreportexport();
   
  
     $filename = 'B2csalesReport'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$filename"); 
     header("Content-Type: application/csv; ");
    // get data 
   
 
 
 
 
 
 
     // file creation 
     $file = fopen('php://output','w');
     $header = array("Bill Date","Bill Num","Customer Name","Taxable Value","GST","CESS","Other Charges","Discount","Grand Total"); 
     fputcsv($file, $header);
     foreach ($usersData as $key=>$line){ 
         fputcsv($file,$line); 
     }
     fclose($file); 
     exit;  
}
public function b2bexportsale(){
    $usersData = $this->Crud_model->get_b2bsalesreportexport();
   
  
    $filename = 'B2BsalesReport'.date('Ymd').'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
   // get data 
  






    // file creation 
    $file = fopen('php://output','w');
    $header = array("Bill Date","Bill Num","Customer Name","Taxable Value","GST","Other Charges","Discount","Grand Total"); 
    fputcsv($file, $header);
    foreach ($usersData as $key=>$line){ 
        fputcsv($file,$line); 
    }
    fclose($file); 
    exit;  
}

}