<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	 public function getlogin_details($data){
				$this->db->select('*')
				->from('login')
				->join('tbl_godownfirm','tbl_godownfirm.login_id   = login.id','left')
				->where($data);
				$data=$this->db->get();
				return $data->row();
		}
	public function get_comm(){
			$this->db->order_by("committe","asc");
			$data=$this->db->get('committe');
			return $data->result();
		}
    	public function get_supplier(){
			
		$this->db->order_by("sup_name","asc");
		$data=$this->db->get('tbl_supplier');
		return $data->result();
		
	}


	public function getpurchasefromto($from,$to){
		$this->db->where('purchase_status ==',0);
		$this->db->where('tbl_purchase_master.purchase_master_billdate >=', $from);
		$this->db->where('tbl_purchase_master.purchase_master_billdate <=', $to);
		
		$this->db->select('*');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id   = tbl_purchase_master.purchase_master_supplier','left');
		$this->db->from('tbl_purchase_master');
		$data=$this->db->get();
		
		return $data->result();
	}
	

	public function record_count_purchase(){
		return $this->db->count_all('tbl_purchase_master');
	}
	public function getstockhistorycount(){
		return $this->db->count_all('tbl_current_stock_history');
	}


	public function get_purchaselimitfetch($limit,$start){

		$this->db->order_by('purchase_master_billdate','DESC');
		//$this->db->order_by('purchase_status','ASC');

		$this->db->select('*');

		$this->db->join('tbl_supplier','tbl_supplier.sup_id   = tbl_purchase_master.purchase_master_supplier','left');
	

		$this->db->from('tbl_purchase_master');
		
	

	

		
		$this->db->limit($limit,$start);

		$this->db->where('purchase_status',0);
		
		$data=$this->db->get();
		
		return $data->result();
	}

	public function get_staff(){
		$this->db->order_by("stf_name","asc");
		$data=$this->db->get('tbl_staff');
		return $data->result_array();
		
	}
	public function get_automaticbillpur(){
		$this->db->select("COUNT(purchase_master_billno) AS mycount");
		$this->db->from("tbl_purchase_master");
		
		$data=$this->db->get();
		return $data->row();
	}
	public function get_lastbillnumberpur(){
		$this->db->select('purchase_master_billno');
		$this->db->from("tbl_purchase_master");
		$this->db->order_by("purchase_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function getalltable($table){
		
	    $this->db->select('*')
	            ->from($table);
				
	    $data=$this->db->get();
		return $data->result();
	}
	public function getreferencefeting($refnum){
		$this->db->select("*")
		->from('tbl_purchase_master');
		$this->db->where('purchase_master_ref_no',$refnum);
		$data=$this->db->get();
		return $data->row();
	}
	public function addrowtotable($table,$data){
	    $this->db->insert($table,$data);
	    return $this->db->insert_id();
	}
	public function get_purchasetransdetails($purmasterid){
		$this->db->where('purchase_trans_purchase_master_id',$purmasterid);
		$this->db->select('*');
		$this->db->from('tbl_purchase_trans');
		
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_checkpurchasetrans($masterid,$batchid){
		$this->db->where('purchase_trans_purchase_master_id',$masterid);
		$this->db->where('purchase_item_batch_id',$batchid);
		$this->db->select('*');
		$this->db->from('tbl_purchase_trans');
		
		$data=$this->db->get();
		
		return $data->row();
	}
	public function add_openingbalance($data)
	{  
		$this->db->insert('tbl_opbalance',$data);
	}
	public function get_checkitem($itemitemid,$item_batch_id){
		$this->db->select('*')
		->from('tbl_current_stock');
		$this->db->where('cur_stock_item_id',$itemitemid);
		$this->db->where('current_stock_batch_id',$item_batch_id);
		$data=$this->db->get();
		return $data->row();
	}
	public function getalltablewhererow($table,$where){
	    $this->db->select('*')
	    ->from($table)
		->where($where);
				
	    $data=$this->db->get();
		return $data->row();
	}
	public function get_purchaseitemfetch($id){
		$this->db->select("*")
		->from('tbl_purchase_trans')
		->join('tbl_imbm','tbl_imbm.batch_id  = tbl_purchase_trans.purchase_item_batch_id','left')
		
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		//->join('tbl_hsn','tbl_hsn.hsn_id=tbl_item.itm_hsn','left');
		
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left'); 
		$this->db->where('purchase_trans_purchase_master_id',$id);
		$data=$this->db->get();
		return $data->result_array();
	}
	//=========================================================================================
  public function get_itemfetingbybarcode($code){
	$this->db->select('*')
	->from('tbl_imbm')
	->where('batch_id',$code)
	->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left');
	
	$data=$this->db->get();
	return $data->row();
  }
  public function get_purchase_trans($id){
	$this->db->select('*')
	->from('tbl_purchase_trans')
	->where('purchase_trans_purchase_master_id',$id);
	$data=$this->db->get();
	return $data->result();
  }
	public function get_batchlist($item_id){
			
		//$this->db->order_by("batch_id","DESC");
		
		$this->db->select('tbl_imbm.*,tbl_imbm.batch_id as itembatchId,tbl_item.*,tbl_sale_incentive.*,tbl_hsn.hsn_code,tbl_hsn.hsn_tax,tbl_imbm.hsn_code as hsncode_id');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
		->join('tbl_sale_incentive','tbl_sale_incentive.batch_id = tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_id',$item_id);
		
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result();
		
	}
	public function get_incentiveamount($batchid){
	$this->db->select('*')
	->from('tbl_sale_incentive')
	->where('batch_id',$batchid);
	$data=$this->db->get();
	return $data->row();
	}
	public function get_batchoption($item_id){
			
		$this->db->order_by("tbl_imbm.batch_id","DESC");
		$this->db->where('tbl_imbm.item_id',$item_id);
		$this->db->select('cur_stock_item_count,tbl_item.itm_name, tbl_item.itm_code,tbl_item.itm_id, tbl_imbm.batch_id, tbl_imbm.item_id, tbl_imbm.batchcode, tbl_hsn.hsn_id, tbl_hsn.hsn_code, tbl_hsn.hsn_tax');
		$this->db->from('tbl_item')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left'); 
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left'); 
		//$this->db->where('tbl_inventory_stock.inventory_location_id',1);
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result();
		
	}
	public function get_batchoption1($item_id){
			
		$this->db->order_by("tbl_imbm.batch_id","DESC");
		$this->db->where('tbl_imbm.item_id',$item_id);
		$this->db->select('tbl_inventory_stock.inventory_stock_itemcount,tbl_item.itm_name, tbl_item.itm_code,tbl_item.itm_id, tbl_imbm.batch_id, tbl_imbm.item_id, tbl_imbm.batchcode, tbl_hsn.hsn_id, tbl_hsn.hsn_code, tbl_hsn.hsn_tax');
		$this->db->from('tbl_item')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left'); 
		$this->db->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_batch_id = tbl_imbm.batch_id','left'); 
		$this->db->where('inventory_location_id',1);
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result();
		
	}
	public function get_inventorystocks($batchid){
			
		$this->db->select('*');
		$this->db->from('tbl_inventory_stock');
	    $this->db->where('inventory_stock_item_batch_id',$batchid);
		$data=$this->db->get();
		
		return $data->result_array();
		
	}
	public function get_mayoori_address(){
		$this->db->select('*')
	->from('tbl_godownfirm')
	->where('firmorgodown',1);
	$data=$this->db->get();
	return $data->row();
	}
	public function get_supplierdetails($id){
		

		
	
	$this->db->select('*');
	$this->db->from('tbl_supplier');

	
	$this->db->where('sup_id',$id);
	
	
	return $this->db->get()->row();
	}
	public function get_supplieropeningbalance($id){
		$this->db->select('tbl_opbalance.*,SUM(tbl_opbalance.obl_amount) as total_quantity,SUM(tbl_opbalance.op_stock) as opstock,tbl_item.itm_name,tbl_imbm.batchcode')
               ->from('tbl_opbalance')
               ->join('tbl_item','tbl_item.itm_id = tbl_opbalance.item_id','left') 
			   ->join('tbl_imbm','tbl_imbm.batch_id = tbl_opbalance.batch_id','left');
			   $this->db->where('suplier_id',$id)
               ->group_by('tbl_opbalance.batch_id');
		      $data=$this->db->get();
			  return $data->result();
	
	}
	public function get_batch($batchid){
		
		$this->db->where('tbl_imbm.batch_id',$batchid);
		
		$this->db->select('tbl_current_stock.cur_stock_item_count,tbl_item.itm_name,tbl_item.itm_code,tbl_imbm.*,tbl_hsn.hsn_tax,tbl_hsn.hsn_code,tbl_imbm.hsn_code as hsncode_id,tbl_supplier.sup_name');
		$this->db->from('tbl_item')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id ','left')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
		->join('tbl_supplier','tbl_supplier.sup_id = tbl_imbm.supplier','left');
		return $this->db->get()->row();
		 
	}
	public function get_salesemployee($master_id){
		$this->db->select('*');
		$this->db->from('tbl_sales_trans')
	    ->join('tbl_staff','tbl_staff.stf_id = tbl_sales_trans.sales_employee_name','left')
		->where('sales_trans_master_id',$master_id)
		->where('tbl_staff.stf_name !=','NULL');
		return $this->db->get()->row();
	}
	public function get_salesemployeereturn($master_id){
		$this->db->select('*');
		$this->db->from('tbl_salesreturn_trans')
		->where('salesreturntrans_master_id',$master_id)
		->join('tbl_staff','tbl_staff.stf_id = tbl_salesreturn_trans.salesreturntrans_employee_name','left'); 
		return $this->db->get()->row();
	}
	public function get_salesemployeeorder($lastid){
		$this->db->select('*');
		$this->db->from('tbl_sales_order_trans')
		->join('tbl_staff','tbl_staff.stf_id = tbl_sales_order_trans.sales_order_employee','left')
		->where('sales_order_trans_master_id',$lastid)
	
		->where('tbl_staff.stf_name !=','NULL');
		return $this->db->get()->row();
	}
	public function get_b2bemployee($lastid){
		$this->db->select('*');
		$this->db->from('tbl_billing_trans')
		
		->join('tbl_staff','tbl_staff.stf_id = tbl_billing_trans.billing_employee_id','left') 
		->where('billing_trans_billing_masterid',$lastid)
		->where('tbl_staff.stf_name !=','NULL');
		return $this->db->get()->row();
	}
	public function get_duplicateitemcode($itemcode){
		$this->db->select('*');
		$this->db->from('tbl_item')
		->where('itm_code',$itemcode);
		return $this->db->get()->row();
	}
	public function getbactcount($batchid,$firm){
		
		$this->db->select('*');
		$this->db->from('tbl_inventory_stock')
		->where('inventory_stock_item_batch_id',$batchid)
		->where('inventory_location_id',$firm);
		//echo $this->db->last_query();exit;
		return $this->db->get()->row();
	}
	public function getcurrentstocklist($itemValue){
		$this->db->select('*');
		$this->db->from('tbl_current_stock')
		->where('current_stock_batch_id',$itemValue);
		
		
		return $this->db->get()->row();
	}
	public function get_godownloaction($firm){
		
		$this->db->select('*');
		$this->db->from('tbl_godownfirm')
		->where('login_id',$firm);
		
		return $this->db->get()->row();
	}
	public function get_itemlist($itemValue){
		//$this->db->order_by("batch_id","DESC");
		$this->db->where('tbl_item.itm_id',$itemValue);
		$this->db->select('tbl_item.itm_name,tbl_item.itm_code');
		$this->db->from('tbl_item');
		//->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		//->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left'); 
		
		//echo $this->db->last_query();exit;
		return $this->db->get()->row();	
	}
	public function get_batcheach($batchid){
	//$this->db->order_by("batch_id","DESC");
	
	$this->db->select('tbl_imbm.*,tbl_hsn.hsn_tax');
	$this->db->from('tbl_imbm')

	//->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
	->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left'); 
	$this->db->where('tbl_imbm.item_id',$batchid);
	
	//echo $this->db->last_query();exit;
	return $this->db->get()->result_array();
	 
	}
	public function supplier_edit($sid){
		$this->db->where('sup_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_barcodenumlast(){
	    $this->db->select('tbl_imbm.*');
     $this->db->from('tbl_imbm');
     $this->db->order_by('batch_id', 'DESC'); // 'created_at' is the column name of the date on which the record has stored in the database.
     return $this->db->get()->row();
	}
	
	public function supplier_update($data,$id){
	    $this->db->where('sup_id',$id);
	    $this->db->update('tbl_supplier',$data);
	}
    public function get_ledger(){
			$this->db->order_by("le_name","asc");
			$this->db->select("*")
		->from('tbl_ledger')
		->join('tbl_accountgp','tbl_accountgp.ag_id = tbl_ledger.le_accgrp','left')
		->join('tbl_financialyear','tbl_financialyear.fy_id = tbl_ledger.le_fyear','left');
		$data=$this->db->get();
		return $data->result();
		}
		
	public function ledger_edit($sid){
		$this->db->where('le_id',$sid);
		$this->db->select('*')
		->join('tbl_accountgp','tbl_accountgp.ag_id = tbl_ledger.le_accgrp','left');
		$this->db->from('tbl_ledger');
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_inventorymasteroprt($lastinserid){
		$this->db->where('inventory_id ',$lastinserid);
		$this->db->select('*');
		$this->db->from('tbl_inventory_transfer_master')
		->join('tbl_godownfirm','tbl_godownfirm.godownid  = tbl_inventory_transfer_master.inventory_from','left');
		$data=$this->db->get();
		
		return $data->row();
	}
	public function get_inventorytransferitems($lastinserid){
		
		$this->db->select('*');
		$this->db->from('tbl_inventory_trans')
		->join('tbl_imbm','tbl_imbm.batch_id= tbl_inventory_trans.inventory_trans_item_batch_id','left')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left');
		$this->db->where('inventory_master_id ',$lastinserid);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_purchaselist(){
		
		$this->db->select('*');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id   = tbl_purchase_master.purchase_master_supplier','left');
	
		//$this->db->join('tbl_purchase_master','tbl_purchase_master.purchase_master_billno = tbl_supplier_paybalance.paybal_bill_number','left');

		$this->db->from('tbl_purchase_master');

		$this->db->where('purchase_master_payment_mode',7);
		
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_payoutstandingamount($billnumber){
		$this->db->select('SUM(paybal_amount) As mysum');
	
		$this->db->from('tbl_supplier_paybalance');

		$this->db->where('paybal_bill_number',$billnumber);

		$this->db->where('status',6);
		
		$data=$this->db->get();
		
		return $data->row();
	}
	public function get_customeroutstanding(){
			
		$this->db->select('*');
		
		$this->db->from('tbl_outstandingcustomer');
		
		$this->db->join('tbl_customer','tbl_customer.customer_id= tbl_outstandingcustomer.outcusid_customer_id','left');
		
		//$this->db->limit(20);

		//$this->db->order_by('purchase_master_id','DESC');
		
		$data=$this->db->get();
		
		return $data->result();
	}


	
	public function get_physicalstockmasteroprt($lastid){
		$this->db->where('psa_id',$lastid);
		$this->db->select('*');
		$this->db->from('tbl_physicalstock_adjustment_master');
		$data=$this->db->get();
		return $data->row();
	}
	public function get_physicalstocktransferitems($lastid){
		$this->db->where('psat_master_id ',$lastid);
		$this->db->select('*');
		$this->db->from('tbl_physicalstock_adjusment_trans')
		->join('tbl_item','tbl_item.itm_id   = tbl_physicalstock_adjusment_trans.psat_item_id','left')
		->join('tbl_godownfirm','tbl_godownfirm.godownid    = tbl_physicalstock_adjusment_trans.psat_location','left');
		$data=$this->db->get();
		
		return $data->result();
	}
	public function ledger_update($data,$id){
	    $this->db->where('le_id',$id);
	    $this->db->update('tbl_ledger',$data);
	}
	public function get_fyear(){
			$this->db->order_by("fn_year","asc");
			$data=$this->db->get('tbl_financialyear');
			return $data->result();
		}
		
	public function fyear_edit($sid){
		$this->db->where('fy_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_financialyear');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function fyear_update($data,$id){
	    $this->db->where('fy_id',$id);
	    $this->db->update('tbl_financialyear',$data);
	}
	
	public function get_baccount(){
		$this->db->order_by("ba_holdname","asc");
		$data=$this->db->get('tbl_bankaccount');
		return $data->result();
		
	}
	
	public function baccount_edit($sid){
		$this->db->where('ba_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_bankaccount');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function baccount_update($data,$id){
	    $this->db->where('ba_id',$id);
	    $this->db->update('tbl_bankaccount',$data);
	}
	
	public function get_accountgp(){
		$this->db->order_by("ag_name","asc");
		$data=$this->db->get('tbl_accountgp');
		return $data->result();
		
	}
	
	public function accountgp_edit($sid){
		$this->db->where('ag_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_accountgp');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function accountgp_update($data,$id){
	    $this->db->where('ag_id',$id);
	    $this->db->update('tbl_accountgp',$data);
	}
	
	public function get_faccountgp(){
			$this->db->order_by("fag_name","asc");
			$this->db->select("*")
		->from('tbl_financialaccgp')
		->join('tbl_accountgp','tbl_accountgp.ag_id = tbl_financialaccgp.fag_group','left');
		$data=$this->db->get();
		return $data->result();
	}
	
	public function faccountgp_edit($sid){
		$this->db->where('fag_id',$sid);
		$this->db->select('*')
		->from('tbl_financialaccgp')
		->join('tbl_accountgp','tbl_accountgp.ag_id = tbl_financialaccgp.fag_group','left');
		
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function faccountgp_update($data,$id){
	    $this->db->where('fag_id',$id);
	    $this->db->update('tbl_financialaccgp',$data);
	}
	
	public function get_opbalance(){
			$this->db->order_by("fn_year","asc");
			$this->db->select("*")
		->from('tbl_opbalance')
		->join('tbl_financialyear','tbl_financialyear.fy_id = tbl_opbalance.obl_year','left');
		$data=$this->db->get();
		return $data->result();
	}
	
	public function opbalance_edit($sid){
		$this->db->where('obl_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_opbalance');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function opbalance_update($data,$id){
	    $this->db->where('obl_id',$id);
	    $this->db->update('tbl_opbalance',$data);
	}
	
	public function get_category(){
		$this->db->order_by("cat_name","asc");
		$data=$this->db->get('tbl_category');
		return $data->result();
		
	}
	public function get_category_result(){
		
		$data=$this->db->get('tbl_itemcategory');
		return $data->result_array();
		
	}
	public function get_group_fetching(){
		$data=$this->db->get('tbl_itemgroup');
		return $data->result_array();
	}
	public function category_edit($sid){
		$this->db->where('cat_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_category');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function category_update($data,$id){
	    $this->db->where('cat_id',$id);
	    $this->db->update('tbl_category',$data);
	}
	
	public function get_hsn(){
		$this->db->order_by("hsn_code","asc");
		$data=$this->db->get('tbl_hsn');
		return $data->result();
		
	}
	
    public function hsn_edit($sid){
		$this->db->where('hsn_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_hsn');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function hsn_update($data,$id){
	    $this->db->where('hsn_id',$id);
	    $this->db->update('tbl_hsn',$data);
	}
	
	public function get_item($limit,$start){
		
			
			
			$this->db->select("*")
				->from('tbl_item')
				
			
				->join('tbl_itemgroup','tbl_itemgroup.ig_id = tbl_item.itm_group','left')
				->join('tbl_itemcategory','tbl_itemcategory.itcat_id = tbl_item.itm_cat','left')
				
				->join('tbl_unit','tbl_unit.unit_id = tbl_item.itm_unit','left')
				
				->join('tbl_brands','tbl_brands.brand_id = tbl_item.itm_brand_id','left'); 
				$this->db->limit($limit,$start);
				$this->db->order_by("tbl_item.itm_id","DESC");
		$data=$this->db->get();
		return $data->result();
	}
	public function get_item1(){
		//$this->db->order_by("itm_name","asc");
		$this->db->order_by("tbl_item.itm_id","DESC");
		//$this->db->order_by("tbl_imbm.batch_id","DESC");
		$this->db->select("*")
			->from('tbl_imbm')
			->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
			// ->join('tbl_supplier','tbl_supplier.sup_id = tbl_item.itm_sup','left')
			->join('tbl_itemgroup','tbl_itemgroup.ig_id = tbl_item.itm_group','left')
			->join('tbl_itemcategory','tbl_itemcategory.itcat_id = tbl_item.itm_cat','left')
			//->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
			->join('tbl_unit','tbl_unit.unit_id = tbl_item.itm_unit','left')
			->group_by('tbl_item.itm_id') 
			//->join('tbl_sale_incentive','tbl_sale_incentive.item_id=tbl_item.itm_id','left')
			->join('tbl_brands','tbl_brands.brand_id = tbl_item.itm_brand_id','left'); 
		
	$data=$this->db->get();
	return $data->result();
}
	public function get_currentstockreport($itemlist){
		$this->db->where('cur_stock_item_id',$itemlist);
		$this->db->select('*');
		$this->db->from('tbl_current_stock')
		->join('tbl_imbm','tbl_imbm.batch_id = tbl_current_stock.current_stock_batch_id','left')
		->join('tbl_supplier','tbl_supplier.sup_id = tbl_imbm.supplier','left')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left');
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_currentstockreportitemwise($limit,$start){
		
		$this->db->select('*');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left');
		$this->db->limit($limit,$start);
		$data=$this->db->get();
		
		return $data->result();
	}

	public function get_currentstockreportitemwisefull(){
		
		$this->db->select('*');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left');
		//$this->db->limit(5);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_supplierwisestockreport($name){
		
		$this->db->select('*');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		->join('tbl_supplier','tbl_supplier.sup_id = tbl_imbm.supplier','left')
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left');
		$this->db->where('tbl_supplier.sup_id',$name);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_categorystockreport($name){
		
		$this->db->select('*');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_cat',$name);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_groupwisestockreport($name){
		
		$this->db->select('*');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_group',$name);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_groupwisestockreportitem($name){
		
		$this->db->select('*');
		$this->db->from('tbl_imbm')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		
		->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_id',$name);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_inventorystockreport($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_inventory_trans')
		->join('tbl_inventory_transfer_master','tbl_inventory_transfer_master.inventory_id = tbl_inventory_trans.inventory_master_id','left')
		->join('tbl_imbm','tbl_imbm.batch_id = tbl_inventory_trans.inventory_trans_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id = tbl_imbm.item_id','left')
		->join('tbl_godownfirm','tbl_godownfirm.godownid = tbl_inventory_transfer_master.inventory_to','left');
		if($from!='' && $to!=''){
			$this->db->where('inventory_date >=', $from);
		    $this->db->where('inventory_date <=', $to);
		}
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_item_with_stock_available($godownid){
		$this->db->order_by("itm_name","asc");
		//$this->db->order_by("tbl_imbm.batch_id","DESC");
		$this->db->select("*")
		->from('tbl_item')
		//->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		->join('tbl_supplier','tbl_supplier.sup_id = tbl_item.itm_sup','left')
		->join('tbl_itemgroup','tbl_itemgroup.ig_id = tbl_item.itm_group','left')
		->join('tbl_itemcategory','tbl_itemcategory.itcat_id = tbl_item.itm_cat','left')
		//->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
		->join('tbl_unit','tbl_unit.unit_id = tbl_item.itm_unit','left')
		->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_id = tbl_item.itm_id AND tbl_inventory_stock.inventory_location_id='.$godownid,'inner');
		$this->db->group_by('tbl_item.itm_id'); 
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result();
	}
	public function get_batcheachisinventory($itemValue,$godown){
		$this->db->select('tbl_imbm.*,tbl_item.itm_name,tbl_item.itm_code')
		->from('tbl_inventory_stock')
		->join('tbl_item','tbl_item.itm_id = tbl_inventory_stock.inventory_stock_item_id','left')
		->join('tbl_imbm','tbl_imbm.batch_id = tbl_inventory_stock.inventory_stock_item_batch_id','left')
		->where('inventory_location_id',$godown)
		->where('inventory_stock_item_id',$itemValue);
		return $this->db->get()->result_array();

	}
	public function item_edit($sid){
		$this->db->where('itm_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_item')
		->join('tbl_itemgroup','tbl_itemgroup.ig_id = tbl_item.itm_group','left')
		// ->join('tbl_supplier','tbl_supplier.sup_id = tbl_item.itm_sup','left')
		->join('tbl_itemcategory','tbl_itemcategory.itcat_id = tbl_item.itm_cat','left')
		->join('tbl_brands','tbl_brands.brand_id = tbl_item.itm_brand_id','left');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function item_update($data,$id){
	    $this->db->where('itm_id',$id);
	    $this->db->update('tbl_item',$data);
	}
	
	public function get_branch(){
		$this->db->order_by("brn_name","asc");
		$data=$this->db->get('tbl_branch');
		return $data->result();
		
	}
	
	public function branch_edit($sid){
		$this->db->where('brn_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_branch');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function branch_update($data,$id){
	    $this->db->where('brn_id',$id);
	    $this->db->update('tbl_branch',$data);
	}
	
	

	public function get_staff1(){
		$this->db->order_by("stf_name","asc");
		$data=$this->db->get('tbl_staff');
		return $data->result();
		
	}
	public function get_financeaccount(){
		$this->db->order_by("id","asc");
		$data=$this->db->get('tbl_finance');
		return $data->result();
	}
	public function staff_edit($sid){
		$this->db->where('stf_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_staff');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function staff_update($data,$id){
	    $this->db->where('stf_id',$id);
	    $this->db->update('tbl_staff',$data);
	}
	
	public function get_customer(){
		$this->db->order_by("cus_name","asc");
		$data=$this->db->get('tbl_customer');
		return $data->result();
		
	}
	public function get_b2boutstanding($cusid){
		$this->db->select('sum(billing_master_outstanding) as mysum' );
		$this->db->from('tbl_billing_master');
		$this->db->where('billing_master_customer_login_id',$cusid);
		$data=$this->db->get();
		return $data->row();	
	}
	public function get_b2coutstanding($cusid){
		$this->db->select('sum(sales_master_outstanding) as mysum' );
		$this->db->from('tbl_sales_master');
		$this->db->where('sales_master_customer_login_id',$cusid);
		$data=$this->db->get();
		return $data->row();	
	}
	public function get_customer_outstanding($loginid){
		
		$this->db->select('sales_master_outstanding')
				->from('tbl_sales_master')
				->where('sales_master_customer_login_id',$loginid)
				->order_by('sales_master_id',"desc")
				->limit(1); 
		$res = $this->db->get()->result();
		
		if(empty($res[0])){
			$outstanding=0;
		}
		else{
			$outstanding=$res[0]->sales_master_outstanding;
		}
		return $outstanding;
		
	}

	public function customer_edit($sid){
		$this->db->where('customer_id',$sid);
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function customer_update($data,$id){
	    $this->db->where('customer_id',$id);
	    $this->db->update('tbl_customer',$data);
	}
	public function get_accountgroupsearch($acgp){
		$this->db->select("*");
		$this->db->from('tbl_accountgp');
		$this->db->like('ag_name',$acgp);
		return $this->db->get()->result_array();
	}
	public function get_itemgroupsearch($itgp){
		$this->db->select("*");
		$this->db->from('tbl_itemgroup');
		$this->db->like('ig_name',$itgp);
		return $this->db->get()->result_array();
	}
	public function get_supplier_search($sup){
		$this->db->select("*");
		$this->db->from('tbl_supplier');
		$this->db->like('sup_name',$sup);
		return $this->db->get()->result_array();
	}
	public function get_searchcategory($cat){
		$this->db->select("*");
		$this->db->from('tbl_itemcategory');
		$this->db->like('itcat_name',$cat);
		return $this->db->get()->result_array();
	}
	public function get_searchbrand($brand){
		$this->db->select("*");
		$this->db->from('tbl_brands');
		$this->db->like('brand_name',$brand);
		return $this->db->get()->result_array();
	}
	public function get_units(){
		$data=$this->db->get('tbl_unit');
		return $data->result();
	}
	public function unit_edit($id){
		$this->db->where('unit_id',$id);
	    $data=$this->db->get('tbl_unit');
		return $data->result();	
	}
	public function get_searchhsncode($hsn){
	
		$this->db->select('*');

	  $this->db->from('tbl_hsn');
	  		  $this->db->where('hsn_id',$hsn);	
	  		  	  $data=$this->db->get()->row();	
	  		  	  	  return $data;	
	}
	public function get_supliernewadd($id){
		$this->db->select('sup_id,sup_name')
		->from('tbl_supplier');
		$this->db->where('sup_id',$id);
		 $data=$this->db->get()->row();	
	  		  	  	  return $data;	
	}
	public function get_accountcreatenew($sid){
		$this->db->select("*")
		->from('tbl_itemgroup');
		$this->db->where('ig_id',$sid);
		 $data=$this->db->get()->row();	
	  		  	  	  return $data;	
	}
	public function get_lasthsncode($sid){
		$this->db->select("*")
		->from('tbl_hsn');
		$this->db->where('hsn_id',$sid);
		 $data=$this->db->get()->row();	
	  		  	  	  return $data;	
	}
	public function get_finance(){
	
	    $data=$this->db->get('tbl_finance');
		return $data->result();	
	}
	public function get_categorynew($cid){
		$this->db->select("*")
		->from('tbl_itemcategory');
		$this->db->where('itcat_id',$cid);
		 $data=$this->db->get()->row();	
	  		  	  	  return $data;	
	}
	public function get_itemgroup(){
		$this->db->select("*")
		->from('tbl_itemgroup');
		
		 $data=$this->db->get();
		 return $data->result();
	}
	public function get_itemgroupFetch($id){
		$this->db->select("*")
		->from('tbl_itemgroup');
		$this->db->where('ig_id',$id);
		 $data=$this->db->get();
		 return $data->row();
	}
	public function itemgrou_edit($id){
		$this->db->select("*")
		->from('tbl_itemgroup');
		$this->db->where('ig_id',$id);
		 $data=$this->db->get();
		 return $data->result();
	}
	public function get_itemcategory(){
			$this->db->select("*")
		 ->from('tbl_itemcategory')
		 ->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');
		
		
		 $data=$this->db->get();
		 return $data->result();
	}
	public function get_itemwisepurchasereport(){
		$this->db->select("*")
		->from('tbl_purchase_trans')
		->join('tbl_purchase_master','tbl_purchase_master.purchase_master_id =tbl_purchase_trans.purchase_trans_purchase_master_id','left')
		->join('tbl_imbm','tbl_imbm.batch_id  =tbl_purchase_trans.purchase_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id  =tbl_imbm.item_id','left')
		->join('tbl_itemcategory','tbl_itemcategory.itcat_id   =tbl_item.itm_cat','left');
		
		$data=$this->db->get();
		return $data->result();
	}
	public function get_itemwisepurchasereportcat($group,$cat){
		$this->db->select("*")
		->from('tbl_purchase_trans')
		->join('tbl_purchase_master','tbl_purchase_master.purchase_master_id =tbl_purchase_trans.purchase_trans_purchase_master_id','left')
		->join('tbl_imbm','tbl_imbm.batch_id  =tbl_purchase_trans.purchase_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id  =tbl_imbm.item_id','left')
		->join('tbl_itemcategory','tbl_itemcategory.itcat_id   =tbl_item.itm_cat','left');
		if($cat!=''){
			$this->db->where('tbl_itemcategory.itcat_id',$cat);
		}
		if($group!=''){
			$this->db->where('tbl_itemcategory.itcat_grp',$group);
		}
		
		$data=$this->db->get();
		return $data->result();
	}
	public function itemcategory_edit($id){
		$this->db->select("*")
		 ->from('tbl_itemcategory')
		 ->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');
		$this->db->where('itcat_id',$id);
		 $data=$this->db->get();
		 return $data->result();
	}
	
	public function get_lastcustomer(){
		$this->db->select('cus_code')
		->from('tbl_customer')
		->order_by('customer_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->row();

	}
	public function get_newcustomercode(){
		$this->db->select('cus_code')
		->from('tbl_customer')
		->order_by('customer_id',"desc")
		->limit(1);
		$lastcode = $this->db->get()->row()->cus_code;
		if($lastcode!= NULL){
			$newcode = $lastcode+1;
		}
		else{
			$newcode = 1;
		}
		return $newcode;

	}
	public function get_newcustomercode1(){
		$this->db->select('cus_code')
		->from('tbl_customer')
		->order_by('customer_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_lastsuplier(){
		$this->db->select('sup_code')
		->from('tbl_supplier')
		->order_by('sup_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_suppliercount(){
		$this->db->select("COUNT(*) AS MyCount")
		->from('tbl_supplier');

		$data=$this->db->get();
		return $data->result();
	}
	public function get_laststaffcode(){
		$this->db->select('stf_code')
		->from('tbl_staff')
		->order_by('stf_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_staffcount(){
		$this->db->select("COUNT(*) AS MyCount")
		->from('tbl_staff');
		
		$data=$this->db->get();
		return $data->result();
	}
	public function get_lastitemcode(){
		$this->db->select('itm_code')
		->from('tbl_item')
		->order_by('itm_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_item_where($where){
	   $this->db->select('*')
		->from('tbl_item')
		->join('tbl_hsn','tbl_hsn.hsn_id=tbl_item.itm_hsn','left')
		->where($where);
		$data=$this->db->get();
		return $data->row_array(); 
	}
	public function search_itemcode($itemcode){
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->like('tbl_item.itm_code',$itemcode);
		$this->db->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner');
		
		$this->db->group_by('tbl_item.itm_id');
		return $this->db->get()->result_array();
	}

	public function search_customername($cusname){
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->like('cus_name',$cusname);
		$this->db->or_like('cus_phonenumber',$cusname);
		$this->db->limit(6);
		return $this->db->get()->result_array();
	}
	public function search_location($location){
		$this->db->select('*');
		$this->db->from('tbl_maps');
		$this->db->like('location',$location);
	
		$this->db->limit(6);
		return $this->db->get()->result_array();
	}
	public function search_itemname($itemcode){
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->like('tbl_item.itm_code',$itemcode);
		$this->db->or_like('tbl_item.itm_name',$itemcode);
		$this->db->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner');
		$this->db->group_by('tbl_item.itm_id');
		return $this->db->get()->result_array(); 
	}
	public function search_batchid($batchcode){
		$this->db->select('*');
		$this->db->from('tbl_imbm');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id = tbl_imbm.batch_id','inner');
		$this->db->where('tbl_imbm.batchcode',$batchcode);
		return $this->db->get()->result_array(); 
	}
	public function search_itembatch($itemcode){
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->like('tbl_item.item_batchcode',$itemcode);
		return $this->db->get()->result_array();
	}
	public function searchaccountgroup($name){
		$this->db->select('*');
		$this->db->from('tbl_accountgp');
		$this->db->like('tbl_accountgp.ag_name',$name);
		
		return $this->db->get()->result_array();
	}
	public function get_lastbatchcodenum(){
		$this->db->select('item_batchcode')
		->from('tbl_item');
		$this->db->order_by('itm_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->result();

	}
	
	public function checkrowexist($table,$where){
	    $this->db->select('*')
	            ->from($table)
	            ->where($where);
	    $data=$this->db->get();
		return $data->row();
	}
	public function get_oustandingcustomers(){
		$this->db->select('*')
		->from('tbl_outstandingcustomer')
		->join('tbl_customer','tbl_customer.login_id = tbl_outstandingcustomer.outcusid_customer_id','left');
		$this->db->where('tbl_outstandingcustomer.type',1);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_b2cbillfrombillno($billid){
		$this->db->select('*')
		->from('tbl_sales_master');
	    $this->db->where('sales_master_bill_no',$billid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_b2bbillfrombillno($billid){
		$this->db->select('*')
		->from('tbl_billing_master');
	    $this->db->where('billing_master_billno',$billid);
		$data=$this->db->get();
		return $data->row();
	}

	public function get_saleorderbillfrombillno($billid){
		$this->db->select('*')
		->from('tbl_sales_order_master');
	    $this->db->where('sales_order_master_bill_no',$billid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_bankpaymentreceiptlistnew($master_id){
		$this->db->select('*')
		->from('tbl_bank_payments');
	    $this->db->where('receiptorpay_on',7);
		$this->db->where('receiptnumber',$master_id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_bankreceiptfetch($sid){
		$this->db->select('*')
		->from('tbl_bank_payments');
	    $this->db->where('bp_id',$sid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_quatationbillpreview($id){
		$this->db->select('*')
		->from('tbl_quotationbill_master');
	    $this->db->where('quotationbill_master_id',$id);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_quatationbilltranspreview($id){
		$this->db->select('*')
		->from('tbl_quotationbill_trans')
		->join('tbl_imbm','tbl_imbm.batch_id = tbl_quotationbill_trans.quotationbill_trans_batch','left')
		->join('tbl_item','tbl_item.itm_id  = tbl_imbm.item_id','left');
	    $this->db->where('quotationbill_trans_quotbill_master_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_oustandingcustomersb2b(){
		$this->db->select('*')
		->from('tbl_outstandingcustomer')
		->join('tbl_customer','tbl_customer.login_id = tbl_outstandingcustomer.outcusid_customer_id','left');
		$this->db->where('tbl_outstandingcustomer.type',2);
		$data=$this->db->get();
		return $data->result();
	}
	

	public function addstocktable($table,$data){
		$this->db->insert($table,$data);
	    return $this->db->insert_id();
	}


	public function get_check_inventstockitem($loginid,$itemid, $itembatchid){

		$this->db->select('tbl_inventory_stock.inventory_stock_id,tbl_inventory_stock.inventory_stock_itemcount')
		->from('tbl_inventory_stock')
		->join('tbl_godownfirm','tbl_inventory_stock.inventory_location_id = tbl_godownfirm.godownid','left')
		->where('tbl_inventory_stock.inventory_stock_item_id',$itemid)
		->where('tbl_godownfirm.login_id',$loginid)
		->where('tbl_inventory_stock.inventory_stock_item_batch_id',$itembatchid);
		$data=$this->db->get();
		return $data->row();

	}
	public function get_check_inventstockitem1($loginid, $itemid, $itembatchid){
		$this->db->select('tbl_inventory_stock.inventory_stock_id,tbl_inventory_stock.inventory_stock_itemcount')
		->from('tbl_inventory_stock')
		->join('tbl_godownfirm','tbl_inventory_stock.inventory_location_id = tbl_godownfirm.godownid','left')
		->where('tbl_inventory_stock.inventory_stock_item_id',$itemid)
		->where('tbl_godownfirm.login_id',$loginid)
		->where('tbl_inventory_stock.inventory_stock_item_batch_id',$itembatchid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_staffincentive($staff,$orderid,$itembatchid){
		$this->db->select("*")
		->from('tbl_staff_incentive');
		$this->db->where('staff_id',$staff);
		$this->db->where('sale_order_id',$orderid);
		$this->db->where('batch_id',$itembatchid);
		$this->db->where('sale_type',1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_check_inventstocktransfer($godown_or_firmid,$itemid, $itembatchid){

		$this->db->select('tbl_inventory_stock.inventory_stock_id,tbl_inventory_stock.inventory_stock_itemcount,tbl_inventory_stock.inventory_stock_item_batch_id')
		->from('tbl_inventory_stock')
		->where(['tbl_inventory_stock.inventory_stock_item_id'=>$itemid, 'tbl_inventory_stock.inventory_stock_item_batch_id'=>$itembatchid, 'tbl_inventory_stock.inventory_location_id'=>$godown_or_firmid]);
		$data=$this->db->get();
		//echo $this->db->last_query(); exit;
		return $data->row_array();

	}
	public function get_godwn_firm_id($loginid){
  	    $this->db->select('tbl_godownfirm.godownid')
		->from('tbl_godownfirm')
		->where('tbl_godownfirm.login_id',$loginid);
		$data=$this->db->get();
		return $data->row()->godownid;

	}
	public function get_inventorystocknew($inventory,$batchid,$itemid){
		$this->db->select('tbl_inventory_stock.inventory_stock_itemcount')
		->from('tbl_inventory_stock')
		->where('inventory_stock_item_id',$itemid)
		->where('inventory_stock_item_batch_id',$batchid)
		->where('inventory_location_id',$inventory)
		;
		$data=$this->db->get();
		return $data->row()->inventory_stock_itemcount;
	}


	public function getalltabledelmaster($limit,$start){
		$this->db->select('*')
		->from('tbl_deliverychellan_master')
		->join('tbl_branch','tbl_branch.brn_id = tbl_deliverychellan_master.deliverychellan_master_consignee_name','left');
		$this->db->limit(10);
		$this->db->order_by("deliverychellan_master_id", "desc");
		$this->db->limit($limit,$start);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_salesorderlimitfetch($limit,$start){
		$this->db->select('*')
		->from('tbl_sales_order_master');
		$this->db->limit($limit,$start);
		// $this->db->where_not_in('sales_created', [1, 2]);
		$this->db->order_by("sales_order_master_id", "desc");
		$data=$this->db->get();
		return $data->result();
	}
		public function get_supplierdetailsnew($supid){
		$this->db->select('*')
		->from('tbl_supplier');
		$this->db->where('sup_id',$supid);
		$data=$this->db->get();
		return $data->row();
		}
		public function get_searchitemresult($item){
		$this->db->select('*')
		->from('tbl_item')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','left')
		// ->join('tbl_supplier','tbl_supplier.sup_id = tbl_item.itm_sup','left')
		->join('tbl_itemgroup','tbl_itemgroup.ig_id = tbl_item.itm_group','left')
		->join('tbl_itemcategory','tbl_itemcategory.itcat_id = tbl_item.itm_cat','left')
		//->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left')
		->join('tbl_unit','tbl_unit.unit_id = tbl_item.itm_unit','left')
		->group_by('tbl_item.itm_id') 
		//->join('tbl_sale_incentive','tbl_sale_incentive.item_id=tbl_item.itm_id','left')
		->join('tbl_brands','tbl_brands.brand_id = tbl_item.itm_brand_id','left');
		$this->db->like('tbl_item.itm_code',$item);
		$this->db->or_like('tbl_item.itm_name',$item);
		$data=$this->db->get();
		return $data->result();	
		}
	public function getalltablerows($table,$orderbyfield="",$orderby="ASC"){
		
	    $this->db->select('*')
				->from($table);

		if($orderbyfield!=""){
			$this->db->order_by($orderbyfield, $orderby);
		}		
	    $data=$this->db->get();
		return $data->result();
	}
	public function get_saleslimitfetch($limit,$start){
		$this->db->select('*')
		->from('tbl_sales_master');

		$this->db->order_by('sales_master_id', 'desc');
		$this->db->limit($limit,$start);
		
		$data=$this->db->get();
		return $data->result();
	}
	
	public function get_b2blimitfetch($limit,$start){
		$this->db->select('*')
		->from('tbl_billing_master');

		$this->db->order_by('billing_master_id', 'desc');
		$this->db->limit($limit,$start);
		
		$data=$this->db->get();
		return $data->result();
	}
	public function getalltablerowsfromtofilter($from,$to){
		$this->db->select('*')
		->from('tbl_sales_master');

		$this->db->order_by('sales_master_id', 'desc');
		$this->db->where('sales_master_date >=',$from);
		$this->db->where('sales_master_date <=',$to);
		
			$data=$this->db->get();
			return $data->result();
	}

	public function getalltablewhererowchellan($lastid){
		$this->db->select('*')
		->from('tbl_deliverychellan_master')
		->join('tbl_branch','tbl_branch.brn_id = tbl_deliverychellan_master.deliverychellan_master_consignee_name','left')
		->where('tbl_deliverychellan_master.deliverychellan_master_id',$lastid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_mastersalesorder($master_id){
		$this->db->select('*')
		->from('tbl_sales_order_master')
		->where('sales_order_master_id',$master_id);
		
$data=$this->db->get();
return $data->row();
	}
	public function getalltablewhereresult($where){
	    $this->db->select('*')
				->from('tbl_sales_trans')
				->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left')
				->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
				 ->where($where);
	    $data=$this->db->get();
		return $data->result();
	}
	public function getalltablewhereresultreturn($where){
		$this->db->select('*')
		->from('tbl_salesreturn_trans')
		->join('tbl_imbm','tbl_imbm.batch_id=tbl_salesreturn_trans.salesreturntrans_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		//->join('tbl_imbm','tbl_imbm.item_id=tbl_item.itm_id','left')
		
		->where($where);
$data=$this->db->get();
return $data->result();
	}
	public function get_batchcodechecking($batcodecheck){
		$this->db->select('COUNT(*) AS MyCount')
		->from('tbl_imbm')
		->where('batchcode',$batcodecheck);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_order_count($order_id){
		$this->db->select('COUNT(*) AS MyCount')
		->from('tbl_sales_order_trans')
		->where('sales_order_trans_master_id',$order_id)
		->where('sales_order_status',0);
		$data=$this->db->get();
		return $data->row();
	}
	public function getb2balltablewhereresult($where){
		$this->db->select('*')
		->from('tbl_billing_trans')
		->join('tbl_imbm','tbl_imbm.batch_id=tbl_billing_trans.billing_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		
		->where($where);
		$data=$this->db->get();
		return $data->result();
	}
	public function getpurchasereturntrans($where){
		$this->db->select('*')
		->from('tbl_purchase_return_trans')
		->join('tbl_imbm','tbl_imbm.batch_id=tbl_purchase_return_trans.purreturn_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left')
		->select('tbl_purchase_return_trans.*','tbl_imbm.*','tbl_item.*','tbl_hsn.hsn_code as hcode')
		->where($where);
		$data=$this->db->get();
		return $data->result();
	}
	public function getb2balltablewhereresultdel($where){
		$this->db->select('*')
		->from('tbl_deliverychellan_trans')
		->join('tbl_imbm','tbl_imbm.batch_id=tbl_deliverychellan_trans.deliverychellan_item_batch_id','left')
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		
		->where($where);
$data=$this->db->get();
return $data->result();
	}
	public function record_count_salestrans(){
		return $this->db->count_all('tbl_sales_trans');
	}
	public function record_count_items(){
		return $this->db->count_all('tbl_item');
	}
	public function record_count_sales(){
		return $this->db->count_all('tbl_sales_master');
	}
	public function record_count_salesb2b(){
		return $this->db->count_all('tbl_billing_master');
	}
	public function record_count_delivery(){
		return $this->db->count_all('tbl_deliverychellan_master');
	}
	public function record_count_salesorder(){
		return $this->db->count_all('tbl_sales_order_master');
	}
	public function record_count_salesreturn(){
		return $this->db->count_all('tbl_salesreturn');
	}
	

	public function get_pendingsaleorder(){
		$this->db->select('*')
		->from('tbl_sales_order_master')
		->join('tbl_sales_order_trans','tbl_sales_order_trans.sales_order_trans_master_id=tbl_sales_order_master.sales_order_master_id','left')
		->where('tbl_sales_order_trans.sales_order_status',0);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_salesorderfromto($from,$to){
		$this->db->select('*')
		->from('tbl_sales_order_master')
		->join('tbl_sales_order_trans','tbl_sales_order_trans.sales_order_trans_master_id=tbl_sales_order_master.sales_order_master_id','left')
		->where('tbl_sales_order_trans.sales_order_status',0);
		$this->db->where('sales_order_master_date >=', $from);
		$this->db->where('sales_order_master_date <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_daybookreport($anydate,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments');
	
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}else{
			$this->db->where('date',$anydate);
		}

		$this->db->where('payment_type',3);
	
		
		$data=$this->db->get();
		return $data->result(); 	
	}

	public function get_daybookreportpayment($from,$to){
		$this->db->select('SUM(amount) as Mysum')
		->from('tbl_bank_payments');
	
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}

		$this->db->where('payment_type',3);
	
		
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function get_daybookreportreceipt($anydate,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments');
	
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}else{
			$this->db->where('date',$anydate);
		}

		$this->db->where('payment_type',4);
	
		
		$data=$this->db->get();
		return $data->result(); 
	}

	public function get_daybookreportreceipttrial($from,$to){
		$this->db->select('SUM(amount) AS Mysum')
		->from('tbl_bank_payments');
	
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}

		$this->db->where('payment_type',4);
	
		
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_daybookreportyesterday($anydate){
		$this->db->select('*')
		->from('tbl_bank_payments');
	
	
			$this->db->where('date',$anydate);
	

		$this->db->where('payment_type',3,4);
		
		$data=$this->db->get();
		return $data->result(); 	
	}


	public function get_daybookreportbank($date,$from,$to,$bankname){
		$this->db->select('*')
		->from('tbl_bank_payments');
	
		$date1=date('y-m-d');
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}else{
			$this->db->where('date',$date);
		}

		if($bankname!=''){
			$this->db->where('bp_bankaccountid',$bankname);
		}

		$this->db->where('payment_type',1);
		
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_bankpaymenttotalpay($from,$to){
		//$value=array();
		$this->db->select('SUM(amount) AS Mysum')
		->from('tbl_bank_payments');
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}
		$this->db->where('payment_type',1);
		$data=$this->db->get();
		return $data->row(); 	

	}
	public function get_bankpaymenttotalrec($from,$to){
		$this->db->select('SUM(amount) AS Mysum')
		->from('tbl_bank_payments');
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}
		$this->db->where('payment_type',2);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_bankledgerinb2b($from,$to){
		$this->db->select('SUM(billing_master_bankamount) AS Mysum')
		->from('tbl_billing_master');
		if($from !='' && $to !='')
		{
			$this->db->where('billing_master_billdate >=', $from);
		    $this->db->where('billing_master_billdate <=', $to);

		}
		
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_b2cledgerinb2c($from,$to){
		$this->db->select('SUM(sales_master_bankamount) AS Mysum')
		->from('tbl_sales_master');
		if($from !='' && $to !='')
		{
			$this->db->where('sales_master_date >=', $from);
		    $this->db->where('sales_master_date <=', $to);

		}
		
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_salesorderintrial($from,$to){
		$this->db->select('SUM(sales_order_master_bankamount) AS Mysum')
		->from('tbl_sales_order_master');
		if($from !='' && $to !='')
		{
			$this->db->where('sales_order_master_date >=', $from);
		    $this->db->where('sales_order_master_date <=', $to);

		}
		
		$data=$this->db->get();
		return $data->row(); 
	}
public function get_bankledgertrial($from,$to){
	$this->db->select('SUM(amount) AS Mysum')
	->from('tbl_bank_payments');
	if($from !='' && $to !='')
	{
		$this->db->where('date >=', $from);
		$this->db->where('date <=', $to);

	}
	$this->db->where('receiptorpay_on',8);
	$data=$this->db->get();
	return $data->row(); 
}
public function get_purchasereturntrial($from,$to){
	$this->db->select('SUM(purreturn_master_grandtotal) AS Mysum')
	->from('tbl_purchase_return_master');
	if($from !='' && $to !='')
	{
		$this->db->where('purreturn_master_date >=', $from);
		$this->db->where('purreturn_master_date <=', $to);

	}
	
	$data=$this->db->get();
	return $data->row(); 
}
public function get_salesreturntrial($from,$to){
	$this->db->select('SUM(sales_return_grandtotal) AS Mysum')
	->from('tbl_salesreturn');
	if($from !='' && $to !='')
	{
		$this->db->where('sales_return_date >=', $from);
		$this->db->where('sales_return_date <=', $to);

	}
	
	$data=$this->db->get();
	return $data->row(); 
}
	public function get_bankcashpayment($today,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments');
	
	
		if($from !='' && $to !='')
		{
			$this->db->where('date >=', $from);
		    $this->db->where('date <=', $to);

		}else{
			$this->db->where('date',$today);
		}

		$this->db->where('receiptorpay_on',8);
		
		$data=$this->db->get();
		return $data->result(); 
	}
 public function get_daybookreportreceiptbank($today,$from,$to,$bankname){
	$this->db->select('*')
	->from('tbl_bank_payments');

	$date1=date('y-m-d');
	if($from !='' && $to !='')
	{
		$this->db->where('date >=', $from);
		$this->db->where('date <=', $to);

	}else{
		$this->db->where('date',$date1);
	}

	if($bankname!=''){
		$this->db->where('bp_bankaccountid', $bankname);
	}
	$this->db->where('payment_type',2);
	
	$data=$this->db->get();
	return $data->result(); 
 }
 public function get_bankclosingamount($yesterday){
	$this->db->select("*")
	->from('tbl_closing_blance');
	
	$this->db->where('date',$yesterday);
	$this->db->where('type',2);
	$data=$this->db->get();
	return $data->row(); 
 }
 public function get_cashclosingamount($yesterday){
	$this->db->select("*")
	->from('tbl_closing_blance');
	
	$this->db->where('date',$yesterday);
	$this->db->where('type',1);
	$data=$this->db->get();
	return $data->row(); 
 }
	public function get_debitopcash($date,$from,$to){
		$this->db->select("SUM(amount) AS cashdebit")
		->from('tbl_bank_payments');
		
			$this->db->where('date',$date);
		
			$this->db->where('payment_type',4);
		
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function get_debitopcashbank($date,$from,$to){
		$this->db->select("SUM(amount) AS cashdebit")
		->from('tbl_bank_payments');
		
			$this->db->where('date',$date);
			$this->db->where('payment_type',2);
			
		
		$data=$this->db->get();
		return $data->row(); 	
	}
	public function get_openingblancecash($yesterday,$type){
		$this->db->select("*")
		->from('tbl_closing_blance');
		
			$this->db->where('date',$yesterday);
			$this->db->where('type',$type);
			
		
		$data=$this->db->get();
		return $data->row(); 	
	}
	public function get_checkingclosingblance($date,$type){
		$this->db->select("*")
		->from('tbl_closing_blance');
		
			$this->db->where('date',$date);
			$this->db->where('type',$type);
			
		
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function get_debitobank($date,$from,$to){
		$this->db->select("SUM(amount) AS cashdebit")
		->from('tbl_bank_payments');
		
			$this->db->where('date',$date);
			// $this->db->where('payment_type',2);
			$this->db->or_where('payment_type',2);
		
		$data=$this->db->get();
		return $data->row(); 	
	}
	public function get_debitb2c($yesterday,$from,$to){
		$this->db->select("SUM(sales_master_amount_paid) AS b2cdebit")
		->from('tbl_sales_master');
		$this->db->where('sales_master_date',$yesterday); 
		$this->db->where('sales_master_payment_mode',6); 
		$data=$this->db->get();
		return $data->row(); 	
	}
	public function get_debitb2cbank($yesterday,$from,$to){
		$this->db->select("SUM(sales_master_amount_paid) AS b2cdebit")
		->from('tbl_sales_master');
		$this->db->where('sales_master_date',$yesterday); 
		$this->db->where('sales_master_payment_mode',5); 
		$data=$this->db->get();
		return $data->row(); 	
	}
	public function get_debitb2b($yesterday,$from,$to){
		$this->db->select("SUM(billing_master_paid_amount) AS b2bdebit")
		->from('tbl_billing_master');
		$this->db->where('billingdate',$yesterday);
		$this->db->where('billing_master_paymentmode',6);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_debitb2bbank($yesterday,$from,$to){
		$this->db->select("SUM(billing_master_paid_amount) AS b2bdebit")
		->from('tbl_billing_master');
		$this->db->where('billingdate',$yesterday);
		$this->db->where('billing_master_paymentmode',5);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_debitpurchase($yesterday,$from,$to){
		$this->db->select("SUM(purchase_paid_amount) AS purchasedebit")
		->from('tbl_purchase_master');
		$this->db->where('purchase_master_billdate',$yesterday);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_debitsalesorder($yesterday,$from,$to){
		$this->db->select("SUM(sales_order_master_amount_paid) AS sodebit")
		->from('tbl_sales_order_master');
		$this->db->where('sales_order_master_payment_mode',6);
		$this->db->where('sales_order_master_date',$yesterday);
	
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_debitsalesorderbank($yesterday,$from,$to){
		$this->db->select("SUM(sales_order_master_amount_paid) AS sodebit")
		->from('tbl_sales_order_master');
		$this->db->where('sales_order_master_payment_mode',5);
		$this->db->where('sales_order_master_date',$yesterday);
	
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_creditsalesorder($yesterday,$from,$to){
		$this->db->select("SUM(sales_order_master_grand_total) AS socredit")
		->from('tbl_sales_order_master');
		$this->db->where('sales_order_master_date',$yesterday);
		
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_creditsalesreturn($yesterday,$from,$to){
		$this->db->select("SUM(sales_return_grandtotal) AS srcredit")
		->from('tbl_salesreturn');
		$this->db->where('sales_return_date',$yesterday);
	
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_creditopcash($date,$from,$to){
		$this->db->select("SUM(amount) AS cashcredit")
		->from('tbl_bank_payments');
		
			$this->db->where('date',$date);
			// $this->db->where('payment_type',1);
			$this->db->where('payment_type',3);
		
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function get_creditobank($date,$from,$to){
		$this->db->select("SUM(amount) AS cashcredit")
		->from('tbl_bank_payments');
		
			$this->db->where('date',$date);
			// $this->db->where('payment_type',1);
			$this->db->where('payment_type',1);
		
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function getsalebookb2c($date,$from,$to){
		$value = array(6, 4);
		$this->db->select('*')
		->from('tbl_sales_master');
	
		if($date!='')
		{
			$this->db->where('sales_master_date',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('sales_master_date >=', $from);
		    $this->db->where('sales_master_date <=', $to);

		}
		
		$this->db->where_in('sales_master_payment_mode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function getsalebookb2ctrial($from,$to){
		$value = array(6, 4);
		$this->db->select('SUM(sales_master_amount_paid) AS Mysum')
		->from('tbl_sales_master');
	
		
		if($from !='' && $to !='')
		{
			$this->db->where('sales_master_date >=', $from);
		    $this->db->where('sales_master_date <=', $to);

		}
		
		$this->db->where_in('sales_master_payment_mode',$value);
		$data=$this->db->get();
		return $data->row(); 	
	}
	public function getsalebookb2cyes($date){
		$value = array(6, 4);
		$this->db->select('*')
		->from('tbl_sales_master');
	
	
		$this->db->where('sales_master_date',$date);
		
		$this->db->where_in('sales_master_payment_mode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function getsalebookb2cbank($date,$from,$to,$bankname){
		$value=array(5,4);
		$this->db->select('*')
		->from('tbl_sales_master');
	
		if($date!='')
		{
			$this->db->where('sales_master_date',$date);
		}
		if($bankname!='')
		{
			$this->db->where('sales_master_bank',$bankname);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('sales_master_date >=', $from);
		    $this->db->where('sales_master_date <=', $to);

		}

		$this->db->where_in('sales_master_payment_mode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}


	public function getsalebookb2b($date,$from,$to){
		$value=array(6,4);
		$this->db->select('*')
		->from('tbl_billing_master');
	
		
		if($from !='' && $to !='')
		{
			$this->db->where('billingdate >=', $from);
		    $this->db->where('billingdate <=', $to);

		}else{
			$this->db->where('billingdate',$date);
		}
		$this->db->where_in('billing_master_paymentmode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}

	public function getsalebookb2btrial($from,$to){
		$value=array(6,4);
		$this->db->select('SUM(billing_master_paid_amount) AS Mysum')
		->from('tbl_billing_master');
	
		
		if($from !='' && $to !='')
		{
			$this->db->where('billingdate >=', $from);
		    $this->db->where('billingdate <=', $to);

		}
		$this->db->where_in('billing_master_paymentmode',$value);
		$data=$this->db->get();
		return $data->row(); 	
	}


	public function getsalebookb2byes($date){
		$value=array(6,4);
		$this->db->select('*')
		->from('tbl_billing_master');
		
			$this->db->where('billingdate',$date);
	
	    $this->db->where_in('billing_master_paymentmode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}

	public function getsalebookb2bbank($date,$from,$to,$bankname){
		$value=array(4,5);
		$this->db->select('*')
		->from('tbl_billing_master');
		// ->join('tbl_sales_order_trans','tbl_sales_order_trans.sales_order_trans_master_id=tbl_sales_order_master.sales_order_master_id','left')
		// ->where('tbl_sales_order_master.sales_created !=',1);
		if($date!='')
		{
			$this->db->where('billingdate',$date);
		}
		if($bankname!='')
		{
			$this->db->where('billing_master_bank',$bankname);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('billingdate >=', $from);
		    $this->db->where('billingdate <=', $to);

		}
		$this->db->where_in('billing_master_paymentmode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function getsalebookpurchase($date,$from,$to){
		$this->db->select('tbl_purchase_master.*','tbl_supplier.sup_name')
		->from('tbl_purchase_master')
		->join('tbl_supplier','tbl_supplier.sup_id=tbl_purchase_master.purchase_master_supplier','left');
		// ->where('tbl_sales_order_master.sales_created !=',1);
		if($date!='')
		{
			$this->db->where('purchase_master_billdate',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('purchase_master_billdate >=', $from);
		    $this->db->where('purchase_master_billdate <=', $to);

		}
		$this->db->where('purchase_master_payment_mode',6);
		
		$data=$this->db->get();
		return $data->result(); 	
	}

	public function getsalebookpurchaseyes($date){
		$this->db->select('*')
		->from('tbl_purchase_master');
	
		
			$this->db->where('purchase_master_billdate',$date);
			$this->db->where('purchase_master_payment_mode',6);
		
		
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function getsalesorder($date,$from,$to){
		$value=array(4,6);
		$this->db->select('*')
		->from('tbl_sales_order_master');

		if($date!='')
		{
			$this->db->where('sales_order_master_date',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('sales_order_master_date >=', $from);
		    $this->db->where('sales_order_master_date <=', $to);

		}
		$this->db->where_in('sales_order_master_payment_mode',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}

	public function getsalesordertrial($from,$to){
		$value=array(4,6);
		$this->db->select('SUM(sales_order_master_amount_paid) AS Mysum')
		->from('tbl_sales_order_master');

	
		if($from !='' && $to !='')
		{
			$this->db->where('sales_order_master_date >=', $from);
		    $this->db->where('sales_order_master_date <=', $to);

		}
		$this->db->where_in('sales_order_master_payment_mode',$value);
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function getsalesorderyes($date){
		$this->db->select('*')
		->from('tbl_sales_order_master');

		$this->db->where('sales_order_master_date',$date);
	
		$this->db->where('sales_order_master_payment_mode',6);
		$data=$this->db->get();
		return $data->result(); 	
	}

	

public function getsalesorderbank($today = '', $from = '', $to = '', $bankname = '')
{
    $this->db->select('*');
    $this->db->from('tbl_sales_order_master');

    $this->db->where_in('sales_order_master_payment_mode', array(4, 5));

    // Today's date
    if (!empty($today)) {
        $this->db->where('sales_order_master_date', $today);
    }

    // Bank filter
    if (!empty($bankname)) {
        $this->db->where('sales_order_master_bank', $bankname);
    }

    // Date range
    if (!empty($from) && !empty($to)) {
        $this->db->where('sales_order_master_date >=', $from);
        $this->db->where('sales_order_master_date <=', $to);
    }

    return $this->db->get()->result();
}
	public function get_sales_return($date,$from,$to){
		$this->db->select('*')
		->from('tbl_salesreturn');

		if($date!='')
		{
			$this->db->where('sales_return_date',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('sales_return_date>=', $from);
		    $this->db->where('sales_return_date<=', $to);

		}
		$data=$this->db->get();
		return $data->result(); 	
	}

	public function get_cashfromJournal($date,$from,$to){
		$this->db->select('*')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		if($date!='')
		{
			$this->db->where('date',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
		$this->db->where('creditbankaccount_id',15);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_bankfromJournal($date,$from,$to,$bankname){
		$this->db->select('*')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		if($date!='')
		{
			$this->db->where('date',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
		if($bankname!=''){
			$this->db->where('bankaccount_id', $bankname);
		}
		$this->db->where('creditbankaccount_id',1);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_journalreportinledger($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
		if($acnum!=''){
			$this->db->where('creditbankaccount_id', $acnum);
		}
		
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_journalincashamount($from,$to){
		$this->db->select('SUM(tbl_journals.debit_amount) AS Mysum')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
	    $this->db->where('creditbankaccount_id',15);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_journaltrialsumdebit($accountgpid,$from,$to){
		$this->db->select('SUM(tbl_journals.debit_amount) AS Mysum')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
		if($accountgpid!=''){
			$this->db->where('creditbankaccount_id',$accountgpid);
		}
	    
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_journaltrialsumcredit($accountgpid,$from,$to){
		$this->db->select('SUM(tbl_journals.credit_amount) AS Mysum')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
		if($accountgpid!=''){
			$this->db->where('creditbankaccount_id',$accountgpid);
		}
	    
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_journalindirectincome($from,$to){
		$this->db->select('SUM(tbl_journals.credit_amount) AS Mysum')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
		
		$data=$this->db->get();
		return $data->row(); 
	}
	public function get_journalinbankamount($from,$to){
		$this->db->select('SUM(tbl_journals.debit_amount) AS Mysum')
		->from('tbl_journal_master')
		->join('tbl_journals','tbl_journals.journal_mster_id =tbl_journal_master.journal_id','left')
		->join('tbl_ledger','tbl_ledger.le_id =tbl_journals.creditbankaccount_id','left');
		
		if($from !='' && $to !='')
		{
			$this->db->where('date>=', $from);
		    $this->db->where('date<=', $to);

		}
	    $this->db->where('creditbankaccount_id',1);
		$data=$this->db->get();
		return $data->row(); 
	}

	public function get_sales_returntrial($from,$to){
		$this->db->select('SUM(sales_return_amountpaid) AS Mysum')
		->from('tbl_salesreturn');

		
		if($from !='' && $to !='')
		{
			$this->db->where('sales_return_date>=', $from);
		    $this->db->where('sales_return_date<=', $to);

		}
		$data=$this->db->get();
		return $data->row(); 	
	}

	public function get_deliverychellanbook($date,$from,$to){
		$this->db->select('*')
		->from('tbl_deliverychellan_master');

		if($date!='')
		{
			$this->db->where('deliverychellan_master_date',$date);
		}
		if($from !='' && $to !='')
		{
			$this->db->where('deliverychellan_master_date>=', $from);
		    $this->db->where('deliverychellan_master_date<=', $to);

		}
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_sales_returnyes($date){
		$this->db->select('*')
		->from('tbl_salesreturn');

		
			$this->db->where('sales_return_date',$date);
		
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_ledgeraccountreport($value,$acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments')
		 ->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
		
		$this->db->where('tbl_bank_payments.ledger',$acnum);
		$this->db->where('tbl_bank_payments.date >=',$from);
		$this->db->where('tbl_bank_payments.date <=',$to);
		$this->db->where_in('receiptorpay_on',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_ledgeraccountreportbank($value,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments')
		 ->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
		
		
	
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
		$this->db->where_in('payment_type',$value);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_ledgeraccountreportfinance($value,$acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments')
		->join('tbl_sales_master','tbl_sales_master.sales_master_bill_no=tbl_bank_payments.receiptnumber','left');
		$this->db->where('sales_master_finance_id',$acnum);
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
		// $this->db->where_in('receiptorpay_on',$value);
		$data=$this->db->get();
		return $data->result(); 	
	}
	
	public function get_ledgeraccountreportb2b($actype,$acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments')
		->join('tbl_customer','tbl_customer.customer_id=tbl_bank_payments.ledger','left');
		
		$this->db->where('receiptorpay_on',$actype);
		$this->db->where('ledger',$acnum);
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function get_ledgeraccountreportsuplier($actype,$acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_bank_payments');
		
		$this->db->where('receiptorpay_on',$actype);
		$this->db->where('ledger',$acnum);
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function getfinancereportb2c($actype,$acnum,$from,$to){
		
		$this->db->select('*')
		->from('tbl_sales_master');
		
		$this->db->where('sales_master_finance_id',$acnum);
		$this->db->where('tbl_sales_master.sales_master_date >=',$from);
		$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_salesorder_ledgereport($actype,$acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_sales_order_master');
		//$this->db->where('sales_created',0);
		$this->db->where('sales_order_master_login_id',$acnum);
		$this->db->where('tbl_sales_order_master.sales_order_master_date >=', $from);
		$this->db->where('tbl_sales_order_master.sales_order_master_date <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_logincustomer_id($acnum){
		$this->db->select('*')
		->from('tbl_customer');
		$this->db->where('customer_id',$acnum);
		$data=$this->db->get();
		return $data->row(); 
	}
	// public function getfinancereportb2b($actype,$acnum,$from,$to){
	// 	$this->db->select('*')
	// 	->from('tbl_billing_master');
		
	// 	$this->db->where('sales_master_finance_id',$acnum);
	// 	$this->db->where('tbl_billing_master.sales_master_date >=', $from);
	// 	$this->db->where('tbl_billing_master.sales_master_date <=', $to);
	// 	$data=$this->db->get();
	// 	return $data->result(); 
	// }
	public function getpurchaseledgereport($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_purchase_master');
		
		$this->db->where('purchase_master_supplier',$acnum);
		$this->db->where('tbl_purchase_master.purchase_master_billdate >=', $from);
		$this->db->where('tbl_purchase_master.purchase_master_billdate <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function getpurchasereturnledgereport($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_purchase_return_master');
		
		$this->db->where('purreturn_master_supplier',$acnum);
		$this->db->where('tbl_purchase_return_master.purreturn_master_date >=', $from);
		$this->db->where('tbl_purchase_return_master.purreturn_master_date <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function get_supplieresult($acnum){
		$this->db->select('*')
		->from('tbl_supplier');
		$this->db->where('sup_id',$acnum);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function getb2bledgereport($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_billing_master');
		
		$this->db->where('billing_master_customer_login_id',$acnum);
		$this->db->where('tbl_billing_master.billingdate >=', $from);
		$this->db->where('tbl_billing_master.billingdate <=', $to);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function getb2cledgereport($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_sales_master');
		
		$this->db->where('sales_master_customer_login_id',$acnum);
		$this->db->where('tbl_sales_master.sales_master_date >=', $from);
		$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		$data=$this->db->get();
		return $data->result();
	}
	public function getsalesreturnledgereport($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_salesreturn');
		$this->db->where('salesreturn_cus_loginid',$acnum);
		$this->db->where('tbl_salesreturn.sales_return_date >=', $from);
		$this->db->where('tbl_salesreturn.sales_return_date <=', $to);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_deliverychellanleger($acnum,$from,$to){
		$this->db->select('*')
		->from('tbl_deliverychellan_master');
		
		$this->db->where('deliverychellan_master_consignee_name',$acnum);
		$this->db->where('tbl_deliverychellan_master.deliverychellan_master_date >=', $from);
		$this->db->where('tbl_deliverychellan_master.deliverychellan_master_date <=', $to);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_branchledgersum($from,$to){
		
		$this->db->select("sum(tbl_deliverychellan_master.deliverychellan_master_grandtotal) as mysum ");
		$this->db->from('tbl_deliverychellan_master');
	
		if($from!='' && $to!=''){
			$this->db->where('tbl_deliverychellan_master.deliverychellan_master_date >=', $from);
			$this->db->where('tbl_deliverychellan_master.deliverychellan_master_date <=', $to);
		}
		$query=$this->db->get();
		return $query->row();
	}
	
	public function get_convertedsaleorder(){
		$this->db->select('*')
		->from('tbl_sales_order_master')
		->join('tbl_sales_order_trans','tbl_sales_order_trans.sales_order_trans_master_id=tbl_sales_order_master.sales_order_master_id','left')
		->where('tbl_sales_order_trans.sales_order_status',0);
		$this->db->order_by('sales_order_master_id', 'DESC');
		$data=$this->db->get();
		return $data->result(); 	
	}
	public function getalltablewhereresultorder($where){
	    $this->db->select('*')
	            ->from('tbl_sales_order_trans')
				->join('tbl_item','tbl_item.itm_code=tbl_sales_order_trans.sales_order_trans_itm_code','left')
				->join('tbl_imbm','tbl_imbm.item_id=tbl_item.itm_id','left')
				->join('tbl_hsn','tbl_hsn.hsn_code=tbl_item.itm_hsn','left')
	            ->where($where);
	    $data=$this->db->get();
		return $data->result(); 
	}
	public function getalltablewhereresultordernew($master_id){
		$this->db->select('*')
		->from('tbl_sales_order_trans')
		->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_order_trans.sales_order_batch_id','left')
		->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left')
		 ->join('tbl_hsn','tbl_hsn.hsn_code=tbl_imbm.hsn_code','left')
		->where('tbl_sales_order_trans.sales_order_trans_master_id',$master_id);
		$data=$this->db->get();
		return $data->result(); 
	}
	public function getallcustomer_accounts($loginid, $type){
	    $this->db->select('*')
	            ->from('login')
				//->join('login','login.id=tbl_customer.sales_master_login_id','left')
				->join('tbl_sales_master','tbl_sales_master.sales_master_customer_login_id=login.id','inner')
				->order_by('login.id', 'DESC')
				->where('login.customer_type', $type)
				->where('tbl_sales_master.sales_master_login_id', $loginid)
				->where('tbl_sales_master.sales_master_id = (
					SELECT MAX(sales_master_id)
					FROM tbl_sales_master
					WHERE sales_master_customer_login_id = login.id
				 )', NULL, FALSE);
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result(); 
	}
	public function get_checkoutstandingcustomer($logincusid){
		$this->db->select("*")
		->from('tbl_outstandingcustomer')
		->where('outcusid_customer_id',$logincusid);
		$data=$this->db->get();
		return $data->row(); 
	}
	public function getallb2bcustomer_accounts($loginid, $type){
	    $this->db->select('*')
	            ->from('login')
				->join('tbl_billing_master','tbl_billing_master.billing_master_customer_login_id=login.id','inner')
				->order_by('login.id', 'DESC')
				->where('login.customer_type', $type)
				->where('tbl_billing_master.billing_master_employee_loginid', $loginid)
				->where('tbl_billing_master.billing_master_id = (
					SELECT MAX(billing_master_id)
					FROM tbl_billing_master
					WHERE billing_master_customer_login_id = login.id
				 )', NULL, FALSE);
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result(); 
	}
	public function getallsupplier_accounts(){
	    $this->db->select('*')
	            ->from('tbl_supplier')
				->join('tbl_purchase_master','tbl_purchase_master.purchase_master_supplier=tbl_supplier.sup_id','inner')
				->order_by('tbl_supplier.sup_id', 'DESC')
				->where('tbl_purchase_master.purchase_master_id = (
					SELECT MAX(purchase_master_id)
					FROM tbl_purchase_master
					WHERE purchase_master_supplier = tbl_supplier.sup_id
				 )', NULL, FALSE);
		$data=$this->db->get();
		//echo $this->db->last_query();
		return $data->result(); 
	}
	public function getallsupplier_purchase($suplierid){
		$this->db->select("SUM(purchase_master_grandtotal) AS MySum")
		->from('tbl_purchase_master')
		->where('purchase_master_supplier',$suplierid);
		
		
		$data=$this->db->get();
//echo $this->db->last_query();
		return $data->row(); 
	}
	public function getsupplierbalanceamount($suplierid){
		$this->db->select("SUM(paybal_amount) AS MySum")
		->from('tbl_supplier_paybalance')
		
		->where('paybal_supplier_id',$suplierid)
		->where('status',7);
		
		$data=$this->db->get();

		return $data->row(); 
	}
	public function getsupplierbalanceamounttrial(){
		$this->db->select("SUM(paybal_amount) AS MySum")
		->from('tbl_supplier_paybalance')
		
	
		->where('status',7);
		
		$data=$this->db->get();

		return $data->row(); 
	}
	public function get_supplierpaidamountNew($suplierid){
		$this->db->select("SUM(paybal_amount) AS MySum")
		->from('tbl_supplier_paybalance')
		->where('paybal_supplier_id',$suplierid)
		->where('status',6);
		
		$data=$this->db->get();
//echo $this->db->last_query();
		return $data->row(); 
	}
	public function get_supplierpaidamountNewtrial(){
		$this->db->select("SUM(paybal_amount) AS MySum")
		->from('tbl_supplier_paybalance')
		
		->where('status',6);
		
		$data=$this->db->get();
//echo $this->db->last_query();
		return $data->row(); 
	}
public function get_salestotalb2c($loginid,$from){
	$this->db->select("SUM(sales_master_grand_total) AS b2csum,SUM(sales_master_amount_paid) AS b2csum1")
	->from('tbl_sales_master')
	->where('sales_master_customer_login_id',$loginid)
	->where('sales_master_date <',$from);
	
	$data=$this->db->get();

	return $data->row(); 
}
public function get_salestotalb2b($loginid,$from){
		$this->db->select("SUM(billing_master_grandtotal) AS b2bsum,SUM(billing_master_paid_amount) AS b2bsum1")
	->from('tbl_billing_master')
	->where('billing_master_customer_login_id',$loginid)
	->where('billingdate <',$from);
	
	$data=$this->db->get();

	return $data->row(); 
}
public function get_salesorder($loginid,$from){
	$this->db->select("SUM(sales_order_master_amount_paid) AS ordersum")
	->from('tbl_sales_order_master')
	->where('sales_order_master_login_id',$loginid)
	->where('sales_order_master_date <',$from);
	$data=$this->db->get();

	return $data->row();
}
	public function get_supplierpaidamount($suplierid){
		$this->db->select("SUM(amount) AS tpaid")
		->from('tbl_bank_payments')
		->where('payment_type',3)
		//->where('payment_type',1)
		->where('receiptorpay_on',4)
		->where('ledger',$suplierid);
	
		
		$data=$this->db->get();
//echo $this->db->last_query();
		return $data->row(); 
	}
	public function get_supplierpaidamountb($suplierid){
		$this->db->select("SUM(amount) AS tpaid")
		->from('tbl_bank_payments')
		//->where('payment_type',3)
		->where('payment_type',1)
		->where('receiptorpay_on',4)
		->where('ledger',$suplierid);
	
		
		$data=$this->db->get();
//echo $this->db->last_query();
		return $data->row(); 
	}
	public function getcheckcustomerloginid($customerid){
		$this->db->select("*")
		->from('tbl_outstandingcustomer')
		->join('tbl_customer','tbl_customer.customer_id=tbl_outstandingcustomer.outcusid_customer_id','inner')
	
		->where('customer_id',$customerid);
	
		
		$data=$this->db->get();
//echo $this->db->last_query();
		return $data->row(); 
	}
	public function getallinventorydata($loginid, $usertype,$type=1){
	    $this->db->select('*')
	            ->from('tbl_inventory_stock')
				->join('tbl_item','tbl_item.itm_id=tbl_inventory_stock.inventory_stock_item_id','left')
				->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left')
				->join('tbl_godownfirm','tbl_godownfirm.godownid=tbl_inventory_stock.inventory_location_id','left')
				->order_by('tbl_inventory_stock.inventory_stock_id', 'DESC');
				$this->db->where('tbl_godownfirm.firmorgodown', $type);		 
		if($usertype!=1)
			$this->db->where('tbl_godownfirm.login_id', $loginid);	
					
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result(); 
	}
	public function get_inventoryitemlistreport($loginid){
		$this->db->select('*')
		->from('tbl_inventory_stock')
		->join('tbl_item','tbl_item.itm_id=tbl_inventory_stock.inventory_stock_item_id','left')
		->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left')
		->join('tbl_godownfirm','tbl_godownfirm.godownid=tbl_inventory_stock.inventory_location_id','left')
		->group_by('tbl_inventory_stock.inventory_stock_item_id') 
		->order_by('tbl_inventory_stock.inventory_stock_id', 'DESC');
		$this->db->where('tbl_godownfirm.firmorgodown',1);	
		$this->db->where('tbl_godownfirm.login_id', $loginid);	
		$data=$this->db->get();
		return $data->result();
	}
	public function get_inventoryitemlistreportgodown($loginid){
		$this->db->select('*')
		->from('tbl_inventory_stock')
		->join('tbl_item','tbl_item.itm_id=tbl_inventory_stock.inventory_stock_item_id','left')
		->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left')
		->join('tbl_godownfirm','tbl_godownfirm.godownid=tbl_inventory_stock.inventory_location_id','left')
		->group_by('tbl_inventory_stock.inventory_stock_item_id') 
		->order_by('tbl_inventory_stock.inventory_stock_id', 'DESC');
		$this->db->where('tbl_godownfirm.firmorgodown',2);	
		//$this->db->where('tbl_godownfirm.login_id','!=', $loginid);	
		$data=$this->db->get();
		return $data->result();
	}
	public function get_inventoryitemlistreportbatwise($item_id,$location_id){
		$this->db->select('*')
		->from('tbl_inventory_stock')
		->join('tbl_item','tbl_item.itm_id=tbl_inventory_stock.inventory_stock_item_id','left')
		->join('tbl_imbm','tbl_imbm.batch_id=tbl_inventory_stock.inventory_stock_item_batch_id','left')
		->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left')
		->join('tbl_godownfirm','tbl_godownfirm.godownid=tbl_inventory_stock.inventory_location_id','left')
		->order_by('tbl_inventory_stock.inventory_stock_id', 'DESC');
		$this->db->where('tbl_inventory_stock.inventory_stock_item_id',$item_id);	
		$this->db->where('tbl_inventory_stock.inventory_location_id',$location_id);	
		$data=$this->db->get();
		return $data->result();
	}
	public function getallcurrent_stocks(){
	    $this->db->select('*')
	            ->from('tbl_current_stock')
				->join('tbl_item','tbl_item.itm_id=tbl_current_stock.cur_stock_item_id','left')
				->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left')
				->join('tbl_supplier','tbl_supplier.sup_id=tbl_item.itm_sup','left')
				->join('tbl_brands','tbl_brands.brand_id=tbl_item.itm_brand_id','left')
				->join('tbl_hsn','tbl_item.itm_hsn=tbl_hsn.hsn_id','inner')
				->order_by('tbl_current_stock.cur_stock_id', 'DESC');
			
		$data=$this->db->get();
		//echo $this->db->last_query();
		return $data->result(); 
	}
	public function getalltablegroup($table,$group){ 
	    $this->db->select('*')
	            ->from($table)
	            ->group_by($group);
	    $data=$this->db->get();
		return $data->result();
	}
	public function get_batchcodenum(){
		$this->db->select('item_batchcode')
		->from('tbl_item');
		$this->db->order_by('itm_id',"desc")
		->limit(1);
		$data=$this->db->get();
		return $data->result();

	}
	public function get_automaticbill(){
		$this->db->select("COUNT(sales_master_bill_no) AS mycount");
		$this->db->from("tbl_sales_master");
		
		$data=$this->db->get();
		return $data->row();
	}
	public function get_automaticbill1(){
		$this->db->select("COUNT(sales_order_master_id) AS mycount");
		$this->db->from("tbl_sales_order_master");
		
		$data=$this->db->get();
		return $data->row();
	}
	
	public function get_countsalesreturn(){
		$this->db->select("COUNT(sales_return_id) AS mycount");
		$this->db->from("tbl_salesreturn");
	    $data=$this->db->get();
		return $data->row();
	}
	public function get_lastbillnumber(){
		$this->db->select('sales_master_bill_no');
		$this->db->from("tbl_sales_master");
		$this->db->order_by("sales_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_lastbillnumberinsalesreturn(){
		$this->db->select('sales_retuurn_bill_no');
		$this->db->from("tbl_salesreturn");
		$this->db->order_by("sales_return_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_lastbillnumber1(){
		$this->db->select('sales_order_master_id');
		$this->db->from("tbl_sales_order_master");
		$this->db->order_by("sales_order_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_lastbillnumber3(){
		$this->db->select('sales_master_bill_no');
		$this->db->from("tbl_sales_master");
		$this->db->order_by("sales_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_automaticbillb2b(){
		$this->db->select("COUNT(billing_master_billno) AS mycount");
		$this->db->from("tbl_billing_master");
		
		$data=$this->db->get();
		return $data->row();
	}
	
	public function get_automaticchellan(){
		$this->db->select("COUNT(deliverychellan_master_id) AS mycount");
		$this->db->from("tbl_deliverychellan_master");
		
		$data=$this->db->get();
		return $data->row();
	}
	public function get_automaticbillb2c(){
		$this->db->select("COUNT(sales_master_bill_no) AS mycount");
		$this->db->from("tbl_sales_master");
		
		$data=$this->db->get();
		return $data->result();
	}
	public function get_lastbillnumberb2b(){
		$this->db->select('billing_master_billno');
		$this->db->from("tbl_billing_master");
		$this->db->order_by("billing_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_lastbillnumberdeliverychellan(){
		$this->db->select('deliverychellan_master_chellanno');
		$this->db->from("tbl_deliverychellan_master");
		$this->db->order_by("deliverychellan_master_id","desc");
		$this->db->limit(1); 
		$data=$this->db->get();
		return $data->row();
	}
	public function get_branches(){
		$this->db->select("*");
		$this->db->from("tbl_branch");
		
		$data=$this->db->get();
		return $data->result();
	}
	
	public function get_branchlistaddress($id){
		$this->db->select("*");
		$this->db->from("tbl_branch");
		$this->db->where('brn_id',$id);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_salesreturn($limit,$start){
		$this->db->select("*");
		$this->db->from("tbl_salesreturn");
		$this->db->limit($limit,$start);
		$this->db->order_by("sales_return_id","desc");
		$data=$this->db->get();
		return $data->result();
	}

	
	public function get_automaticbillstock(){
		$this->db->select("COUNT(stocktransfer_master_delivery_chellanno) AS mycount");
		$this->db->from("tbl_stocktransfer_master");
		
		$data=$this->db->get();
		return $data->result();
	}
		public function get_lastbillnumberstock(){
		$this->db->select('stocktransfer_master_delivery_chellanno');
		$this->db->from("tbl_stocktransfer_master");
		$this->db->order_by("stocktransfer_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_automaticbillquan(){
		$this->db->select("COUNT(quotationbill_master_quotation_no) AS mycount");
		$this->db->from("tbl_quotationbill_master");
		
		$data=$this->db->get();
		return $data->row();
	}
		public function get_lastbillnumberquat(){
		$this->db->select('quotationbill_master_quotation_no');
		$this->db->from("tbl_quotationbill_master");
		$this->db->order_by("quotationbill_master_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_automaticbillpayrec(){
		$this->db->select("COUNT(referalnumber) AS mycount");
		$this->db->from("tbl_bank_payments");
		
		$data=$this->db->get();
		return $data->result();
	}
		public function get_lastbillnumberpayrec(){
		$this->db->select('referalnumber');
		$this->db->from("tbl_bank_payments");
		$this->db->order_by("bp_id","desc");
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_ledgercreation(){
		$this->db->select("*");
		$this->db->from("tbl_ledger");
		$this->db->limit(10);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function getcustomerfetching(){
		$this->db->order_by("cus_name","asc");
		$this->db->select("*");
		$this->db->from("tbl_customer");
		$this->db->limit(10);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function getcustomersearchfetching($search){
			$this->db->order_by("cus_name","asc");
		$this->db->select("*");
		$this->db->from("tbl_customer");
		//  $this->db->like('cus_name', $search);
		  $this->db->like('cus_phonenumber', $search);
		$this->db->limit(10);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function getsupplierfetching(){
		$this->db->select("*");
		$this->db->from("tbl_supplier");
		$this->db->limit(10);
		$data=$this->db->get();
		return $data->result_array();
	}
	
	public function get_cashpayment(){
		$this->db->select("*");
		$this->db->from("tbl_bank_payments")
		->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left')
		->join('tbl_supplier','tbl_supplier.sup_id=tbl_bank_payments.ledger ','left')
		->join('tbl_staff','tbl_staff.stf_id=tbl_bank_payments.ledger ','left')
		->join('tbl_customer','tbl_customer.customer_id=tbl_bank_payments.ledger ','left')
		->where('payment_type',3);
		$data=$this->db->get();
		return $data->result();
	}

	public function getcashpayment_single($id){
		$this->db->select("tbl_bank_payments.*,tbl_ledger.le_name,tbl_supplier.sup_name,tbl_staff.stf_name,tbl_customer.cus_name");
		$this->db->from("tbl_bank_payments")
		->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left')
		->join('tbl_supplier','tbl_supplier.sup_id=tbl_bank_payments.ledger ','left')
		->join('tbl_staff','tbl_staff.stf_id=tbl_bank_payments.ledger ','left')
		->join('tbl_customer','tbl_customer.customer_id=tbl_bank_payments.ledger ','left')
		->where('bp_id',$id);
		$data=$this->db->get()->row();
		return $data;
	}

	public function get_cashrecipt(){
		$this->db->select("*");
		$this->db->from("tbl_bank_payments")
		->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left')
		->join('tbl_staff','tbl_bank_payments.ledger=tbl_staff.stf_id','left')
		
		->join('tbl_supplier','tbl_bank_payments.ledger=tbl_supplier.sup_id','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left')
		->where('payment_type',4);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_cashrecipt_single($id)
	{
		$this->db->select("tbl_bank_payments.*");
		$this->db->from("tbl_bank_payments")
		->where('bp_id',$id);
		$data=$this->db->get()->row();
		return $data;

	}
	public function get_paymenttypesearchreceipt(){
		$this->db->select("MAX(receipt_number) as receipt")
		->from('tbl_payment_receipt');
		 $data=$this->db->get()->row();
		  return $data;
		
	}
	public function get_paymenttypesearchpayment(){
		$this->db->select("MAX(payment_number) as payment")
		->from('tbl_payment_receipt');
		 $data=$this->db->get()->row();
		  return $data;
		
	}
	public function get_lastinsertidinpayandreceipt(){
		$this->db->select("COUNT(payment_recipt_master_id) as payreccount")
		->from('tbl_payment_receipt');
		 $data=$this->db->get()->row();
		
		 
	}
	public function get_receiptandpayment(){
		$this->db->select("*")
		->from('tbl_payment_receipt');
		//->where('',)
		$data=$this->db->get();
		return $data->result();
	}
	public function paymentreceipt_edit($id){
		$this->db->select("*")
		->from('tbl_payment_receipt');
		$this->db->where('payment_recipt_master_id',$id);
		$data=$this->db->get();
		return $data->result();
	}

public function get_balance_amount($id, $type, $ledger)
{
    if ($type == 2) {

        $data = $this->db
            ->where('billing_master_billno', $id)
            ->where('billing_master_customer_login_id', $ledger)
            ->get('tbl_billing_master')
            ->row();

        $outstanding = $data->billing_master_outstanding ?? 0;

    } elseif ($type == 3) {

        $data = $this->db
            ->where('sales_master_bill_no', $id)
			 ->where('sales_master_customer_login_id', $ledger)
            ->get('tbl_sales_master')
            ->row();

        $outstanding = $data->sales_master_outstanding ?? 0;

    } elseif ($type == 7) {

        $data = $this->db
            ->where('sales_order_master_id', $id)
            ->where('sales_order_master_login_id', $ledger)
            ->get('tbl_sales_order_master')
            ->row();

        $outstanding = $data->sales_order_master_outstanding ?? 0;

    } else {

        $data = $this->db
            ->where('le_id',$ledger)
            ->get('tbl_ledger')
            ->row();
        $outstanding =  0;
    }


    // Record not found
    if (!$data) {

        return [
            'status'  => false,
            'message' => 'Bill not found',
            'amount'  => 0
        ];
    }


    // Outstanding amount is zero
    if ($outstanding <= 0) {

        return [
            'status'  => false,
            'message' => 'No Outstanding Amount',
            'amount'  => 0
        ];
    }


    // Outstanding amount available
    return [
        'status'      => true,
        'message'     => 'Outstanding Amount Available',
        'amount'      => $outstanding,
        'data'        => $data
    ];
}
	public function searchitemall($where,$godownid=''){

		$this->db->order_by("itm_name","asc");
		$this->db->order_by("tbl_imbm.batch_id","DESC");
		$this->db->select('*')
		->from('tbl_item')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left');
		if($godownid!=''){
			$this->db->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_id = tbl_item.itm_id AND tbl_inventory_stock.inventory_location_id='.$godownid,'inner');
		}
		$this->db->where($where);
		
		$data=$this->db->get();
		return $data->result_array();

	}
	public function searchitemalllist($godownid=''){
		$this->db->order_by("itm_name","asc");
		$this->db->order_by("tbl_imbm.batch_id","DESC");
		$this->db->select('*')
		->from('tbl_item')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id','inner')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left');
		if($godownid!=''){
			$this->db->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_id = tbl_item.itm_id AND tbl_inventory_stock.inventory_location_id='.$godownid,'inner');
		}
		
		$data=$this->db->get();
		return $data->result_array();

	}
	public function searchcustmodal($where){
		$this->db->select('*')
		->from('tbl_customer')
		
		->where($where);
		
		$data=$this->db->get();
		return $data->result_array();
	}
	public function searchcustmodallist(){
		$this->db->select('*')
		->from('tbl_customer');
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_bank(){
		$this->db->select("*")
		->from('tbl_bank');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_bank_details()
	{
		$this->db->select("*")
		->from('tbl_bank')
		->join('tbl_bankaccount','tbl_bankaccount.ba_bank_id=tbl_bank.bank_id');
		$data=$this->db->get();
		return $data->result();
	}
	public function changestock($id,$qty){
	    $this->db->where('itm_id',$id);
	    $this->db->update('tbl_item',$qty);
	}
	
	public function getsaletransaction($table,$where){
	    $this->db->select('*')
	            ->from('tbl_sales_trans')
	            ->join('tbl_item','tbl_sales_trans.sales_trans_itm_code=tbl_item.itm_code','left')
	            ->where($where);
	    $data=$this->db->get();
		return $data->result();
	}
	public function get_bankpaymentlist(){
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left')
		->join('tbl_staff','tbl_bank_payments.ledger=tbl_staff.stf_id','left')
		->join('tbl_ledger','tbl_bank_payments.ledger=tbl_ledger.le_id ','left')
		->join('tbl_supplier','tbl_bank_payments.ledger=tbl_supplier.sup_id','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left');
		$this->db->where('payment_type',1);
		$data=$this->db->get();
		return $data->result();
	}
	public function bankpaymentlist_edit($sid){
		
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left')
		
		->join('tbl_staff','tbl_bank_payments.ledger=tbl_staff.stf_id','left')
		->join('tbl_ledger','tbl_bank_payments.ledger=tbl_ledger.le_id ','left')
		->join('tbl_supplier','tbl_bank_payments.ledger=tbl_supplier.sup_id','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left');
		$this->db->where('payment_type',1);
		$this->db->where('bp_id',$sid);
		$data=$this->db->get();
		
		return $data->result();
	}
	
    public function bankpaymentlist_update($data,$id){
	    $this->db->where('bp_id',$id);
	    $this->db->update('tbl_bank_payments',$data);
	}
	public function bankreceiptlist_edit($sid){
		
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left')
		->join('tbl_staff','tbl_bank_payments.ledger=tbl_staff.stf_id','left')
		->join('tbl_ledger','tbl_bank_payments.ledger=tbl_ledger.le_id ','left')
		->join('tbl_supplier','tbl_bank_payments.ledger=tbl_supplier.sup_id','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left');
		$this->db->where('payment_type',2);
		$this->db->where('bp_id',$sid);
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_bankreciptlist($id){
		$this->db->select("*")
		->from('tbl_bank_payments');
		$this->db->where('bp_id',$id);
		$data=$this->db->get();
		return $data->row_array();
	}
	
    public function bankreceiptlist_update($data,$id){
	    $this->db->where('bp_id',$id);
	    $this->db->update('tbl_bank_payments',$data);
	}
	public function get_bankreceiptlist(){
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left')
		->join('tbl_staff','tbl_bank_payments.ledger=tbl_staff.stf_id','left')
		->join('tbl_ledger','tbl_bank_payments.ledger=tbl_ledger.le_id ','left')
		->join('tbl_supplier','tbl_bank_payments.ledger=tbl_supplier.sup_id','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left');
		$this->db->where('payment_type',2);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_bankaccount(){
		$this->db->select("*")
		->from('tbl_bankaccount')
		->join('tbl_bank','tbl_bank.bank_id=tbl_bankaccount.ba_bank_id','left');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_paymentfullreport($date_from, $date_to){
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left')
		->join('tbl_ledger','tbl_bank_payments.ledger=tbl_ledger.le_id ','left')
		->join('tbl_supplier','tbl_bank_payments.ledger=tbl_supplier.sup_id ','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left')
		->join('tbl_staff','tbl_bank_payments.ledger=tbl_staff.stf_id','left');
		$this->db->where(' (`payment_type` = 1 OR `payment_type` = 3) ');
		//$this->db->or_where('payment_type',3);
		if($date_from!='' && $date_to!='' ){
			$this->db->where('date >=', $date_from);
			$this->db->where('date <=', $date_to);
		}
		
		$data=$this->db->get();
		//echo $this->db->last_query();exit;
		return $data->result();
	}
	public function get_receiptfullreport($date_from, $date_to){
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left')
		->join('tbl_ledger','tbl_bank_payments.ledger=tbl_ledger.le_id ','left')
		->join('tbl_customer','tbl_bank_payments.ledger=tbl_customer.customer_id ','left');
		// $this->db->where('payment_type',2);
		// $this->db->or_where('payment_type',4);
		$this->db->where(' (`payment_type` = 2 OR `payment_type` = 4) ');
		//$this->db->or_where('payment_type',3);
		if($date_from!='' && $date_to!='' ){
			$this->db->where('date >=', $date_from);
			$this->db->where('date <=', $date_to);
		}
		$data=$this->db->get();
		return $data->result();
	}
	public function get_bankaccountfetch(){
		$this->db->select("*")
		->from('tbl_bankaccount');
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_bankreconcialisationfetch($bank,$from,$to){
		$this->db->select("*")
		->from('tbl_bank_payments');
		$this->db->where('bp_bankaccountid',$bank);
		$this->db->where('date >=',$from); 
		$this->db->where('date <=',$to);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_bankreconcialisation(){
		$value=array(1,2);
		//$value1=array(NULL,'0000-00-00');
		$this->db->select("*")
		->from('tbl_bank_payments');
		$this->db->where('bank_date','0000-00-00');
		$this->db->where_in('payment_type',$value);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_bankbalance($baccount){
		$this->db->select("*")
		->from('tbl_bankaccount');
		$this->db->where('ba_id',$baccount);
		$data=$this->db->get();
		return $data->row_array();
	}
	public function get_paymentlastid(){
		$this->db->order_by("bp_id ","desc");
		$this->db->select("*")
		->from('tbl_bank_payments')
		//->where('payment_type',1)
		->limit('1');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_paymentlastidrecipt(){
		$this->db->order_by("bp_id ","desc");
		$this->db->select("*")
		->from('tbl_bank_payments')
		//->where('payment_type',2)
		->limit('1');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_ledgerfetch($ledger){
		$this->db->select("*")
		->from('tbl_ledger');
		$this->db->where('le_id',$ledger);
		$data=$this->db->get();
		return $data->row_array();
	}
	public function get_ledgerfetchquery(){
		$this->db->select("*")
		->from('tbl_ledger');
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_bankpayment(){
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left');
		$this->db->where('payment_type',1);
		$data=$this->db->get();
		return $data->result();
	}
	public function getbankreceipt(){
		$this->db->select("*")
		->from('tbl_bank_payments')
		->join('tbl_bankaccount','tbl_bank_payments.bp_bankaccountid=tbl_bankaccount.ba_id','left');
		$this->db->where('payment_type',2);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_banreceiptamount($receipt,$date){
		$this->db->select("SUM(amount) AS MySum")
		->from('tbl_bank_payments');
		$this->db->where('bp_bankaccountid',$receipt);
		$this->db->where('date',$date);
		$this->db->where('payment_type',2);
		$data=$this->db->get();
		return $data->row_array();
	}
	public function get_bankpaymentamount($receipt,$date){
		$this->db->select("SUM(amount) AS Mypayment")
		->from('tbl_bank_payments');
		$this->db->where('bp_bankaccountid',$receipt);
		$this->db->where('date',$date);
		$this->db->where('payment_type',1);
		$data=$this->db->get();
		return $data->row_array();
	}
	public function get_journalslastid(){
		$this->db->order_by("journal_id","desc");
		$this->db->select("*")
		->from('tbl_journal_master')
		->limit('1');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_journallist(){
		$this->db->select("*")
		->from('tbl_journal_master');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_journallistbyid($id){
		$this->db->select("*")
		->from('tbl_journal_master')
		->where('journal_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_jounalfulllist($id){
		$this->db->select("*")
		->from('tbl_journals')
		->join('tbl_bankaccount','tbl_journals.creditbankaccount_id=tbl_bankaccount.ba_id','left')
		->join('tbl_ledger','tbl_journals.creditbankaccount_id=tbl_ledger.le_id','left');
		$this->db->where('journal_mster_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_firmlastid(){
		$this->db->order_by("id ","desc");
		$this->db->select("*")
		->from('tbl_firm')
		->limit('1');
		$data=$this->db->get();
		return $data->result();
	}
 public function get_firmlist(){
	$this->db->select("*")
	->from('tbl_godownfirm');
	$this->db->where('firmorgodown',1);
	$data=$this->db->get();
	return $data->result();
 }
 public function firmlist_edit($sid){
		$this->db->where('godownid',$sid);
		$this->db->select('*');
		$this->db->from('tbl_godownfirm');
		$data=$this->db->get();
		
		return $data->result();
	}
	
	public function firmlist_update($data,$id){
	    $this->db->where('godownid',$id);
	    $this->db->update('tbl_godownfirm',$data);
	}
 public function get_godwonlastid(){
	$this->db->order_by("godownid","desc");
	$this->db->select("*")
	->from('tbl_godownfirm')
	->limit('1');
	$data=$this->db->get();
	return $data->result();
 }
 public function get_godownlist(){
	$this->db->select("*")
	->from('tbl_godownfirm');
	$this->db->where('firmorgodown',2);
	$data=$this->db->get();
	return $data->result();
 }
 public function get_godownlistfetch(){
	$this->db->select("*")
	->from('tbl_godownfirm');
	$this->db->where('firmorgodown',2);
	$data=$this->db->get();
	return $data->row(); 
 }

 public function godownlist_edit($sid){
		$this->db->where('godownid',$sid);
		$this->db->select('*');
		$this->db->from('tbl_godownfirm');
		$data=$this->db->get();
		
		return $data->result();
	}
	
 public function godownlist_update($data,$id){
	    $this->db->where('godownid',$id);
	    $this->db->update('tbl_godownfirm',$data);
	}
 public function get_godownfirmlist(){
	$this->db->select("*")
	->from('tbl_godownfirm');
	$data=$this->db->get();
	return $data->result();
 }
 public function get_godowncheck($fromid){
	$this->db->select("*")
	->from('tbl_godownfirm');
	$this->db->where('godownid',$fromid);
	$data=$this->db->get();
	return $data->row(); 
 }
 public function stockingodownorfirmlist($id){
	$this->db->select("*")
	->from('tbl_inventory_stock')
	->join('tbl_item','tbl_inventory_stock.inventory_stock_item_id=tbl_item.itm_id','left')
	->join('tbl_itemgroup','tbl_item.itm_group=tbl_itemgroup.ig_id','left')
	->join('tbl_hsn','tbl_item.itm_hsn=tbl_hsn.hsn_id','left');
	$this->db->where('inventory_location_id',$id);
	$data=$this->db->get();
	return $data->result_array();
 }
 public function get_inventorylastid(){
	$this->db->order_by("inventory_id","desc");
	$this->db->select("*")
	->from('tbl_inventory_transfer_master')
	->limit('1');
	$data=$this->db->get();
	return $data->result();
 }
 //==========Edited By Niby on 29-Sep-2020 Tuesday========//
 public function get_inventorytransferlist(){
	$this->db->select("*,(SELECT tbl_godownfirm.name FROM tbl_godownfirm WHERE tbl_godownfirm.godownid=tbl_inventory_transfer_master.inventory_from) AS from_godownfirm,
	(SELECT tbl_godownfirm.name FROM tbl_godownfirm WHERE tbl_godownfirm.godownid=tbl_inventory_transfer_master.inventory_to) AS to_godownfirm")
	->from('tbl_inventory_transfer_master')
	->join('tbl_godownfirm','tbl_inventory_transfer_master.inventory_from=tbl_godownfirm.godownid','left');
	//->join('tbl_inventory_trans','tbl_inventory_transfer_master.inventory_id=tbl_inventory_trans.inventory_master_id','left');
   // $this->db->where('tbl_inventory_transfer_master.inventory_id', $where);
	$data=$this->db->get();
	return $data->result();
 }
 //==========Edited By Niby on 29-Sep-2020 Tuesday End========//
 public function get_toname($to){
	$this->db->select("*")
	->from('tbl_godownfirm');
	$this->db->where('godownid',$to);
	$data=$this->db->get();
	return $data->row();
 }
 //==========Edited By Niby on 29-Sep-2020 Tuesday========//
 public function get_inventorytransferdetails($id){
	$this->db->select("*")
	->from('tbl_inventory_transfer_master');
    $this->db->where('tbl_inventory_transfer_master.inventory_id', $id);
	$data=$this->db->get();
	return $data->result();
 }
 public function get_inventoryitemlist($id){
	$this->db->select("*")
	->from('tbl_inventory_trans')
	->join('tbl_item','tbl_inventory_trans.inventory_trans_item_id=tbl_item.itm_id','left')
	->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id AND tbl_imbm.batch_id = tbl_inventory_trans.inventory_trans_item_batch_id','inner');
	
	$this->db->where('inventory_master_id',$id);
	$data=$this->db->get();
	return $data->result_array();
 }
 //==========Edited By Niby on 29-Sep-2020 Tuesday End========//

 public function get_physicalstockitemfetch($id){
	$this->db->select("*")
	->from('tbl_physicalstock_adjusment_trans')
	->join('tbl_item','tbl_physicalstock_adjusment_trans.psat_item_id=tbl_item.itm_id','left')
	->join('tbl_godownfirm','tbl_physicalstock_adjusment_trans.psat_location=tbl_godownfirm.godownid','left');
	$this->db->where('psat_master_id',$id);
	$data=$this->db->get();
	return $data->result_array();
 }
 public function get_physicalstockadjusmentlist(){
	$this->db->select("*")
	->from('tbl_physicalstock_adjustment_master');
	//->join('tbl_physicalstock_adjusment_trans','tbl_physicalstock_adjustment_master.psa_id=tbl_physicalstock_adjusment_trans.psat_master_id','left');;
	$data=$this->db->get();
	return $data->result();
 }
 public function get_physicalstcklastid(){
		$this->db->order_by("psa_id","desc");
		$this->db->select("*")
		->from('tbl_physicalstock_adjustment_master')
		->limit('1');
		$data=$this->db->get();
		return $data->result();
	}

	public function get_iteminstock(){
		$this->db->select("*")
		->from('tbl_current_stock')
		->join('tbl_imbm','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left')
		->join('tbl_item','tbl_imbm.item_id=tbl_item.itm_id','left')
		->join('tbl_itemgroup','tbl_item.itm_group=tbl_itemgroup.ig_id','left')
		->join('tbl_brands','tbl_item.itm_brand_id=tbl_brands.brand_id','left')
		->join('tbl_hsn','tbl_imbm.hsn_code=tbl_hsn.hsn_id','left');
		$data=$this->db->get();
		return $data->result();
	}
//==========Edited By Niby on 30-Sep-2020 Wednesday========//
	public function get_physicalstockaddetails($id){
		$this->db->select("*")
		->from('tbl_physicalstock_adjustment_master');
		$this->db->where('tbl_physicalstock_adjustment_master.psa_id', $id);
		$data=$this->db->get();
		return $data->result();
	 }
//==========Edited By Niby on 30-Sep-2020 Wednesday End========//

	public function get_purchasetransfetching($purchase_master_id){
		$this->db->select("*")
		->from('tbl_purchase_trans');
	
		$this->db->where('purchase_trans_purchase_master_id',$purchase_master_id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_salestransfetching($id){
		$this->db->select("*")
		->from('tbl_sales_trans');
	
		$this->db->where('sales_trans_master_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_checkcurrentstock($current_where){
		$this->db->select("*")
		->from('tbl_current_stock');
	
		$this->db->where($current_where);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_checkinventorystcok($inventory_where){
		$this->db->select("*")
		->from('tbl_inventory_stock');
	
		$this->db->where($inventory_where);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_salesitemfetch($id){
		$this->db->select("*")
		->from('tbl_sales_trans')
		->join('tbl_item','tbl_sales_trans.sales_trans_item_id=tbl_item.itm_id','left')
		->join('tbl_imbm','tbl_imbm.item_id = tbl_item.itm_id AND tbl_imbm.batch_id = tbl_sales_trans.sales_trans_item_batch_id','inner')
		
		->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_batch_id=tbl_imbm.batch_id','left')
		->join('tbl_hsn','tbl_hsn.hsn_id = tbl_imbm.hsn_code','left'); 
		$this->db->where('sales_trans_master_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_salesorderitemfetch($id){
		$this->db->select("*")
		->from('tbl_sales_order_trans')
		->join('tbl_imbm','tbl_sales_order_trans.sales_order_batch_id=tbl_imbm.batch_id ','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	
	
		$this->db->where('sales_order_trans_master_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function getwhereresult($table,$where){
		$this->db->where($where);
		$this->db->select('*');
		$this->db->from($table);
		$data=$this->db->get();
		
		return $data->row();
	}
	public function get_lastaddedsales(){
		$this->db->select('sales_master_id');
		$this->db->from("tbl_sales_master");
		$this->db->order_by("sales_master_id","desc");
		$this->db->limit(1);
		//var_dump($this->db->get());exit;
		//if(!empty($this->db->get()->result())){
			$query=$this->db->get();
			$data=$query->row();
			//$data = $result->sales_master_id;
		// }
		// else{
		// 	$data = ''; 
		// }
		
		return $data;
	}
	
	
	public function add_incentive($data)
	{
		$this->db->insert('tbl_sale_incentive',$data);

	}
	public function get_incentive_id($itemid)
	{
		$this->db->select('incentive_type as incentive_id');
		$this->db->from('tbl_sale_incentive');
		$this->db->where('item_id',$itemid);
		$result=$this->db->get()->row();
		if($result)
		{
			return $result->incentive_id;
		}
		else{
	         return 0;
		}
		
	}

	public function get_incentivedata_by_id($batch_id,$item_id,$incentive_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_sale_incentive');
		//$this->db->where('item_id',$item_id);
		//$this->db->where('batch_id',$batch_id);
		$this->db->where('id',$incentive_id);
		return $this->db->get()->row();

	}
	public function get_incentivedata_check($batch_id,$item_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_sale_incentive');
		$this->db->where('item_id',$item_id);
		$this->db->where('batch_id',$batch_id);
		return $this->db->get()->row();

	}
	public function get_customerfulldetails($id){
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->where('customer_id',$id);
		return $this->db->get()->row();
	}
	public function get_locationfulldetails($id){
		$this->db->select('*');
		$this->db->from('tbl_maps');
		$this->db->where('id',$id);
		return $this->db->get()->row();
	}
	public function get_satfflist($acnum){
		$this->db->select('*');
		$this->db->from('tbl_staff');
		$this->db->where('stf_id',$acnum);
		return $this->db->get()->row();
	}
	public function get_financelist($acnum){
		$this->db->select('*');
		$this->db->from('tbl_finance');
		$this->db->where('id',$acnum);
		return $this->db->get()->row();
	}
	public function get_ledgername($acnum){
		$this->db->select('*');
		$this->db->from('tbl_ledger');
		$this->db->where('le_id',$acnum);
		return $this->db->get()->row();	
	}
	public function update_incentive($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_sale_incentive',$data);
	}
	public function get_supplier_billdetais($supid)
	{
		$this->db->select('*');
		$this->db->from('tbl_supplier_paybalance');
		$this->db->join('tbl_purchase_master','tbl_purchase_master.purchase_master_billno=tbl_supplier_paybalance.paybal_bill_number','left');
		$this->db->where('tbl_supplier_paybalance.paybal_supplier_id',$supid);
		$this->db->where('tbl_supplier_paybalance.status',6);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_profit_loss_details($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
        $this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	   
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();

	}
	public function get_profitlosscount(){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
        $this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	 
		$query=$this->db->get();
		return $query->result();
	}

	public function get_profit_loss_detailsfilter($from,$to,$cat,$group,$staff)
	{
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
        $this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	     if($from!='' && $to!=''){
			$this->db->where('tbl_sales_master.sales_master_date >=', $from);
			$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		 }
	 if($cat!=''){
		$this->db->where('tbl_item.itm_cat',$cat);
	 }
	 if($group!=''){
		$this->db->where('tbl_item.itm_group',$group);
	 }
	 if($staff!=''){
		$this->db->where('tbl_sales_trans.sales_employee_name',$staff);
	 }
		$query=$this->db->get();
		return $query->result();

	}
	public function get_profit_loss_purchasecost(){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
       

		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		
		
		return $this->db->get()
		->result();

	}
	public function get_profit_loss_purchasecostfromto($from,$to){
		$this->db->select('SUM(e_pc) as esum,SUM(t_pc) as tsum,SUM(sales_trans_unit_price)as unitsum');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
       
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_sales_trans.sales_trans_item_id','left');
	    $this->db->join('tbl_imbm','tbl_imbm.item_id=tbl_item.itm_id','left');
		$this->db->where('tbl_sales_master.sales_master_date >=', $from);
		$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		
		return $this->db->get()->row();

	}
	public function get_profit_loss_detailscount(){
		
		return $this->db->count_all('tbl_sales_trans');
	}

	public function record_count_b2bcount(){
		return $this->db->count_all('tbl_billing_master');
	}
	public function b2bsalessummery($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
	//	$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
		

			$this->db->where('tbl_billing_master.billingdate >=', $from);
			$this->db->where('tbl_billing_master.billingdate <=', $to);
		
		$query=$this->db->get();
		return $query->result();
	}
	public function b2bsalessummerysum($from,$to){
		$this->db->select('SUM(billing_master_grandtotal) as b2bsum');
		$this->db->from('tbl_billing_master');
	//	$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
		

			$this->db->where('tbl_billing_master.billingdate >=', $from);
			$this->db->where('tbl_billing_master.billingdate <=', $to);
		
		$query=$this->db->get();
		return $query->row();
	}
	public function b2bsalessummerylistsum(){
		$this->db->select('SUM(billing_master_grandtotal) as b2bsum');
		$this->db->from('tbl_billing_master');
	
		
		$query=$this->db->get();
		return $query->row();
	}
	public function b2bsalessummerylist($limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->limit($limit,$start);
		
		$query=$this->db->get();
		return $query->result();
	}
	public function b2csalessummery($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		//$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
		
			$this->db->where('tbl_sales_master.sales_master_date >=', $from);
			$this->db->where('tbl_sales_master.sales_master_date <=', $to);
			
		$query=$this->db->get();
		return $query->result();
	}
	
	public function b2csalescount($from,$to){
	
		$this->db->where('tbl_sales_master.sales_master_date >=', $from);
		$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		return $this->db->count_all('tbl_sales_master');
	}
	public function b2csalescountlist(){
		return $this->db->count_all('tbl_sales_master');
	}
	public function salesreturncount(){
		return $this->db->count_all('tbl_salesreturn');
	}
	public function b2csalessummerysum($from,$to){
		$this->db->select('SUM(sales_master_grand_total) as grandsum');
		$this->db->from('tbl_sales_master');
		//$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
		
			$this->db->where('tbl_sales_master.sales_master_date >=', $from);
			$this->db->where('tbl_sales_master.sales_master_date <=', $to);
	
		$query=$this->db->get();
		return $query->row();
	}
	public function b2csalessummerylistsum(){
		$this->db->select('SUM(sales_master_grand_total) as grandsum');
		$this->db->from('tbl_sales_master');
		
		$query=$this->db->get();
		return $query->row();
	}
	public function b2csalessummerylist($limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_profit_loss_details_btob()
	{
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
        $this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_billing_trans.billing_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	   
		$query=$this->db->get();
		return $query->result();

	}
	public function get_profit_loss_details_category($cat,$group,$staff)
	{
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
        $this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_billing_trans.billing_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.batch_id','left');
	    
		
		if($cat!=''){
			$this->db->where('tbl_item.itm_cat',$cat);
		 }
		 if($group!=''){
			$this->db->where('tbl_item.itm_group',$group);
		 }
		 if($staff!=''){
			$this->db->where('tbl_billing_trans.billing_employee_id',$staff);
		 }
		 if( $from!='' && $to !='')
		 {
 
			 $this->db->where('tbl_billing_master.billingdate >=', $from);
			 $this->db->where('tbl_billing_master.billingdate <=', $to);
		 }
		$query=$this->db->get();
		return $query->result();

	}
	public function get_currentstockreportaging($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_purchase_trans');
		$this->db->join('tbl_purchase_master','tbl_purchase_master.purchase_master_id=tbl_purchase_trans.purchase_trans_purchase_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_purchase_trans.purchase_item_batch_id','left');
		
	    $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_purchase_trans.purchase_item_batch_id','left');
		//$this->db->limit($limit,$start);
		$this->db->where('tbl_purchase_master.purchase_master_billdate >=', $from);
		$this->db->where('tbl_purchase_master.purchase_master_billdate <=', $to);
		$this->db->group_by('tbl_purchase_trans.purchase_item_batch_id');
		//$this->db->limit(5);
		
		$query=$this->db->get();
		return $query->result();
	}
	public function get_purchasecount($from,$to,$batchid){
		$this->db->select('SUM(tbl_purchase_trans.purchase_trans_qty) AS MySum');
		$this->db->from('tbl_purchase_master');
		$this->db->join('tbl_purchase_trans','tbl_purchase_trans.purchase_trans_purchase_master_id=tbl_purchase_master.purchase_master_id','left');
		
		$this->db->where('tbl_purchase_master.purchase_master_billdate >=', $from);
		$this->db->where('tbl_purchase_master.purchase_master_billdate <=', $to);
		$this->db->where('tbl_purchase_trans.purchase_item_batch_id',$batchid);
		
		$query=$this->db->get();
		return $query->row();
	}
	public function get_salesdatewise_details_btoc($sale_date)
	{
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
        $this->db->join('tbl_imbm','tbl_imbm.item_id=tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	   
		if($sale_date!="")
		{
			$this->db->where('tbl_sales_master.sales_master_date',$sale_date);
		}
		$query=$this->db->get();
		return $query->result();

	}
	public function get_salesdatewise_details_btob($sale_date){
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
       
		if($sale_date!="")
		{
			
			$this->db->like('tbl_billing_master.billing_master_billdate', $sale_date);
		}
		$query=$this->db->get();
		return $query->result();
	}
	public function get_salesbill_wise_details_btoc($bill_no)
	{
		$this->db->select('*');
		$this->db->from('tbl_billing_trans');
		$this->db->join('tbl_billing_master','tbl_billing_master.billing_master_id=tbl_billing_trans.billing_trans_billing_masterid','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_billing_trans.billing_item_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.item_id=tbl_item.itm_id','left');
		if($bill_no!="")
		{
			$this->db->where('tbl_billing_master.billing_master_billno',$bill_no);
		}
		$query=$this->db->get();
		return $query->result();

	}
	public function get_salesbill_wise_details_btocchange($bill_no){
		$this->db->select('*');
		$this->db->from('tbl_sales_trans');
		$this->db->join('tbl_sales_master','tbl_sales_master.sales_master_id=tbl_sales_trans.sales_trans_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		
		if($bill_no!="")
		{
			$this->db->where('tbl_sales_master.sales_master_bill_no',$bill_no);
		}
		$query=$this->db->get();
		return $query->result();
	}
	public function get_salesgstwise_details_btocchange($limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_sales_trans');
		$this->db->join('tbl_sales_master','tbl_sales_master.sales_master_id=tbl_sales_trans.sales_trans_master_id','left');
		
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		
	
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_salesreturngstwise_details_btocchange($billnumber,$gst,$limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_salesreturn_trans');
		$this->db->join('tbl_salesreturn','tbl_salesreturn.sales_return_id =tbl_salesreturn_trans.salesreturntrans_master_id','left');
		
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_salesreturn_trans.salesreturntrans_item_batch_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		
		if($gst!="")
		{
			$this->db->where('tbl_imbm.hsn_code',$gst);
		}
		if($billnumber!=""){
			$this->db->where('tbl_salesreturn.sales_retuurn_bill_no',$billnumber);
		}
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_salesreturngstwise_details_btocchangefromto($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_salesreturn_trans');
		$this->db->join('tbl_salesreturn','tbl_salesreturn.sales_return_id =tbl_salesreturn_trans.salesreturntrans_master_id','left');
		
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_salesreturn_trans.salesreturntrans_item_batch_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->where('tbl_salesreturn.sales_return_date >=', $from);
		$this->db->where('tbl_salesreturn.sales_return_date <=', $to);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_salesgstwise_details_btobchange($gst,$from,$to,$tax){
		$this->db->select('*');
		$this->db->from('tbl_billing_trans');
		$this->db->join('tbl_billing_master','tbl_billing_master.billing_master_id=tbl_billing_trans.billing_trans_billing_masterid','left');
		
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_billing_trans.billing_item_batch_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		
		if($gst!='')
		{
			$this->db->where('tbl_imbm.hsn_code',$gst);
		}
		if($tax!='')
		{
			$this->db->where('tbl_hsn.hsn_tax',$tax);
		}
		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_billing_master.billingdate >=', $from);
			$this->db->where('tbl_billing_master.billingdate <=', $to);
		}
		$query=$this->db->get();
		return $query->result();
	}
	public function get_deliverychellansummery($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_deliverychellan_master');
		if($from!='' && $to!=''){
		
			$this->db->where('DATE_FORMAT(tbl_deliverychellan_master.deliverychellan_master_date,"%Y-%m-%d") >=', $from);
			$this->db->where('DATE_FORMAT(tbl_deliverychellan_master.deliverychellan_master_date,"%Y-%m-%d") <=', $to);
		}
		//$this->db->join('tbl_deliverychellan_trans','tbl_deliverychellan_trans.deliverychellan_trans_billing_masterid=tbl_deliverychellan_master.deliverychellan_master_id ','left');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_billwisedeliverychellanreport(){
		$this->db->select('*');
		$this->db->from('tbl_deliverychellan_trans');
	
		$this->db->join('tbl_deliverychellan_master','tbl_deliverychellan_master.deliverychellan_master_id=tbl_deliverychellan_trans.deliverychellan_trans_billing_masterid','left');
		$this->db->join('tbl_branch','tbl_branch.brn_id=tbl_deliverychellan_master.deliverychellan_master_consignee_name','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_deliverychellan_trans.deliverychellan_item_batch_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_bills()
	{
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$query=$this->db->get();
		return $query->result();

	}
	public function get_billsb2c(){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$query=$this->db->get();
		return $query->result();

	}
	public function get_supplierwisesummery($from,$to,$supplier){
		$this->db->where('purchase_status !=',1);
		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_purchase_master.purchase_master_billdate >=', $from);
			$this->db->where('tbl_purchase_master.purchase_master_billdate <=', $to);
		}
		if($supplier !='')
		{
			$this->db->where('tbl_supplier.sup_id',$supplier);
		}
		
		$this->db->select('*');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id   = tbl_purchase_master.purchase_master_supplier','left');
		$this->db->from('tbl_purchase_master');
		
		
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_supplierwisesummerygst($from,$to,$supplier,$tax,$hsncode){
		
		
		$this->db->select('*');
		$this->db->from('tbl_purchase_trans');
		$this->db->join('tbl_purchase_master','tbl_purchase_master.purchase_master_id = tbl_purchase_trans.purchase_trans_purchase_master_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_code = tbl_purchase_trans.purchase_trans_hsncode','left');
	    $this->db->join('tbl_supplier','tbl_supplier.sup_id   = tbl_purchase_master.purchase_master_supplier','left');
		$this->db->where('purchase_status !=',1);
		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_purchase_master.purchase_master_billdate >=', $from);
			$this->db->where('tbl_purchase_master.purchase_master_billdate <=', $to);
		}
		if($supplier !='')
		{
			$this->db->where('tbl_supplier.sup_id',$supplier);
		}
		if($tax !='')
		{
			$this->db->where('tbl_hsn.hsn_tax',$tax);
		}
		if($hsncode !='')
		{
			$this->db->where('tbl_hsn.hsn_id',$hsncode);
		}
	
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_purchasereturngst($from,$to){
		$this->db->select('*');
		$this->db->from('tbl_purchase_return_trans');
		$this->db->join('tbl_purchase_return_master','tbl_purchase_return_master.purreturn_master_id  = tbl_purchase_return_trans.purreturn_trans_purreturn_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_purchase_return_trans.purreturn_item_batch_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
        $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	    $this->db->join('tbl_supplier','tbl_supplier.sup_id   = tbl_purchase_return_master.purreturn_master_supplier','left');
		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_purchase_return_master.purreturn_master_date >=', $from);
			$this->db->where('tbl_purchase_return_master.purreturn_master_date <=', $to);
		}
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_categorywisesales($itemname,$from,$to,$itm_group,$itm_category)
	{
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id =tbl_item.itm_cat','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');

	    if( $from!='' && $to !='')
		{
		$this->db->where('tbl_sales_master.sales_master_date >=', $from);
		$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		}
		if($itm_group!=''){
			$this->db->where('tbl_itemgroup.ig_id',$itm_group);
		}
		if($itm_category!=''){
			$this->db->where('tbl_itemcategory.itcat_id',$itm_category);
		}
		if($itemname!=null){
			$this->db->where('tbl_item.itm_id',$itemname);
		}
		
		$query=$this->db->get();
		return $query->result();
	}

	public function get_categorywisesalesb2b($itemname,$from,$to,$itm_group,$itm_category)
	{
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_billing_trans.billing_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id =tbl_item.itm_cat','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');

	    if( $from!='' && $to !='')
		{
		$this->db->where('tbl_billing_master.billing_master_billdate >=', $from);
		$this->db->where('tbl_billing_master.billing_master_billdate <=', $to);
		}
		if($itm_group!=''){
			$this->db->where('tbl_itemgroup.ig_id',$itm_group);
		}
		if($itm_category!=''){
			$this->db->where('tbl_itemcategory.itcat_id',$itm_category);
		}
		if($itemname!=null){
			$this->db->where('tbl_item.itm_id',$itemname);
		}
		
		$query=$this->db->get();
		return $query->result();
	}


	public function get_categorywisesaleslist($limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id =tbl_item.itm_cat','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_categorywisesaleslistb2b($limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_billing_trans.billing_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id =tbl_item.itm_cat','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_employeewise($from,$to,$employee)
	{
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_sales_trans.sales_trans_item_id','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left');
		$this->db->join('tbl_staff','tbl_staff.stf_id=tbl_sales_trans.sales_employee_name','left');

		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_sales_master.sales_master_date >=', $from);
			$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		}
		if($employee !='')
		{
			$this->db->where('tbl_sales_trans.sales_employee_name', $employee);
		}
		$query=$this->db->get();
		return $query->result();

	}
	public function get_employeewisereport($from,$to,$employee,$cat){
		$this->db->select('*,tbl_staff_incentive.amount as incentiveamount');
		$this->db->from('tbl_staff_incentive');
		
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_staff_incentive.batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id=tbl_item.itm_cat','left');
		$this->db->join('tbl_staff','tbl_staff.stf_id=tbl_staff_incentive.staff_id','left');

		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_staff_incentive.added_date >=', $from);
			$this->db->where('tbl_staff_incentive.added_date <=', $to);
		}
		if($employee !='')
		{
			$this->db->where('tbl_staff_incentive.staff_id', $employee);
		}
		if($cat !='')
		{
			$this->db->where('tbl_itemcategory.itcat_id', $cat);
		}
		$query=$this->db->get();
		return $query->result();

	}

	public function get_employeewiseb2b($from,$to,$employee)
	{
		
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_billing_trans.billing_item_id','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left');
		$this->db->join('tbl_staff','tbl_staff.stf_id=tbl_billing_trans.billing_employee_id','left');

		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_billing_master.billingdate >=', $from);
			$this->db->where('tbl_billing_master.billingdate <=', $to);
		}
		if($employee !='')
		{
			$this->db->where('tbl_billing_trans.billing_employee_id', $employee);
		}
		$query=$this->db->get();
		return $query->result();

	}
	public function get_employees()
	{
		$this->db->select('*');
		$this->db->from('tbl_staff');
		$query=$this->db->get();
		return $query->result();

	}
	public function add_bank($data)
	{
		$this->db->insert('tbl_bank',$data);
	}
	public function edit_bank($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_bank');
		$this->db->where('bank_id',$id);
		$query=$this->db->get();
		return $query->result();

	}
	public function update_bank($data,$id)
	{
		$this->db->where('bank_id',$id);
		$this->db->update('tbl_bank',$data);

	}
	public function get_payable_amount($supplierid,$purchase_bill_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_supplier_paybalance');
		$this->db->where('paybal_supplier_id',$supplierid);
		$this->db->where('paybal_bill_number',$purchase_bill_id);
		$query=$this->db->get();
		return $query->row();

	}
	public function get_statecode(){
		$this->db->select("*")
		->from('tbl_state');
		$data=$this->db->get();
		return $data->result();
	}
	public function add_state($data)
	{
		$this->db->insert('tbl_state',$data);
	}
	public function edit_state($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_state');
		$this->db->where('state_id',$id);
		$query=$this->db->get();
		return $query->result();

	}
	public function update_state($data,$id)
	{
		$this->db->where('state_id',$id);
		$this->db->update('tbl_state',$data);

	}
	public function get_finances()
	{
		$this->db->select('*');
		$this->db->from('tbl_finance');
		$query=$this->db->get();
		return $query->result();

	}
	public function finance_edit($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_finance');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_pending_amt($sup_id,$bill_no,$status)
	{
		$this->db->select('SUM(paybal_amount) AS payable_amount');
		$this->db->from('tbl_supplier_paybalance');
		$this->db->where('paybal_supplier_id',$sup_id);
		$this->db->where('paybal_bill_number',$bill_no);
		$this->db->where('status',$status);
		$query=$this->db->get();
		return $query->row();

	}
	public function get_salesb2cfetching($id){
		$this->db->select("*,COUNT(tbl_sales_trans.sales_trans_id) AS mycount ");
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id ','left');
		$this->db->where('tbl_sales_master.sales_master_id',$id);
		$query=$this->db->get();
		return $query->row();
	}
	public function get_salesb2ctransfetching($id,$loc){
		$this->db->select("*");
		$this->db->from('tbl_sales_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id ','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id ','left');
		$this->db->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_batch_id=tbl_sales_trans.sales_trans_item_batch_id ','left');
		$this->db->where('tbl_sales_trans.sales_trans_master_id',$id);
		$this->db->where('tbl_inventory_stock.inventory_location_id',$loc);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_itembatchfeting($itemid){
		$this->db->select('*');
		$this->db->from('tbl_imbm');
	
		$this->db->where('tbl_imbm.item_id',$itemid);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_fetchitemstock($item,$batchid){
		$this->db->select('*');
		$this->db->from('tbl_current_stock');
	
		$this->db->where('cur_stock_item_id',$item);
		$this->db->where('current_stock_batch_id',$batchid);
		$query=$this->db->get();
		return $query->row();
	}
	public function get_inventorystock($godown_or_firm_id,$itemid,$batchid){
		$this->db->select('*');
		$this->db->from('tbl_inventory_stock');
	
		$this->db->where('inventory_stock_item_id',$itemid);
		$this->db->where('inventory_stock_item_batch_id',$batchid);
		$this->db->where('inventory_location_id',$godown_or_firm_id);
		$query=$this->db->get();
		return $query->row();
	}
	public function get_itemtransfetching($trans){
		$this->db->select('*');
		$this->db->from('tbl_sales_trans');
	
		$this->db->where('sales_trans_id',$trans);
	
		$query=$this->db->get();
		return $query->row();
	}
	public function getstockcompair(){
		$this->db->select('tbl_imbm.batchcode,tbl_item.itm_code,tbl_item.itm_name,tbl_inventory_stock.inventory_stock_itemcount,tbl_current_stock.cur_stock_item_count');
		$this->db->from('tbl_imbm');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_batch_id=tbl_imbm.batch_id ','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left');
		
		$query=$this->db->get();
		return $query->result();
	}
	public function getstockhistory($limit,$start){
		
		$this->db->select('*');
		$this->db->from('tbl_current_stock_history');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_current_stock_history.cur_stock_history_batchid','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->limit($limit,$start);
		$this->db->order_by("cur_stock_history_id","desc");
		$query=$this->db->get();
		return $query->result();
	}
	public function get_salesorderfeting($itemtoconvertid,$inventory){
		$this->db->select('*');
		$this->db->from('tbl_sales_order_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_order_trans.sales_order_batch_id ','left');

		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_sales_order_trans.sales_order_batch_id','left');
		$this->db->where('sales_order_trans_id',$itemtoconvertid);
		//$this->db->where('tbl_inventory_stock.inventory_location_id',$inventory);
		$query=$this->db->get();
		return $query->row();
	}
	public function get_currentstockcount(){
		return $this->db->count_all('tbl_current_stock');
	}
	public function getbatchcode(){
		return $this->db->count_all('tbl_imbm');
	}
	public function get_fullstock_report($limit,$start){
		$this->db->select('*')
		->from('tbl_imbm');
		
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->limit($limit,$start);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_fullstock_report1(){
		$this->db->select('*')
		->from('tbl_imbm');
		
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		
		$data=$this->db->get();
		return $data->result();
	}
	public function get_totalpurchasecount($batchid){
		$this->db->select("SUM(purchase_trans_qty) as mysum")
		
		->from('tbl_purchase_master')
		->join('tbl_purchase_trans','tbl_purchase_trans.purchase_trans_purchase_master_id=tbl_purchase_master.purchase_master_id','left');
		$this->db->where('purchase_item_batch_id',$batchid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_totalphysicalstockcount($batchid){
		$this->db->select("SUM(psat_qty) as mysum")
		
		->from('tbl_physicalstock_adjustment_master')
		->join('tbl_physicalstock_adjusment_trans','tbl_physicalstock_adjusment_trans.psat_master_id=tbl_physicalstock_adjustment_master.psa_id','left');
		$this->db->where('psat_item_batch_id',$batchid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_totalpurchasereturncount($batchid){
		$this->db->select("SUM(purreturn_trans_qty) as mysum")
		
		->from('tbl_purchase_return_master')
		->join('tbl_purchase_return_trans','tbl_purchase_return_trans.purreturn_trans_purreturn_master_id=tbl_purchase_return_master.purreturn_master_id ','left');
		$this->db->where('purreturn_trans_batch',$batchid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_totalsalecount($batchid){
		$this->db->select("SUM(sales_trans_qty) as mysum")
		
		->from('tbl_sales_master')

		->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
		
		$this->db->where('sales_trans_item_batch_id',$batchid);

		//$this->db->where('deleted_status',0);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_totalsalereturncount($batchid){
		$this->db->select("SUM(salesreturntrans_qty) as mysum")
		
		->from('tbl_salesreturn')
		->join('tbl_salesreturn_trans','tbl_salesreturn_trans.salesreturntrans_master_id=tbl_salesreturn.sales_return_id','left');
		$this->db->where('salesreturntrans_item_batch_id',$batchid);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_all_item(){
		$this->db->order_by("id","asc");
		$data=$this->db->get('tbl_all_item');
		return $data->result();
		
	}
	public function get_all_item_by_id($id){
		$this->db->select('*');
		$this->db->from('tbl_all_item');
	
		$this->db->where('tbl_all_item.id',$id);
		$query=$this->db->get();
		return $query->row();
		
	}
	public function get_salestransget(){
		$this->db->select('*');
		$this->db->from('tbl_sales_trans');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_branchlist($id){
		$this->db->select('*');
		$this->db->from('tbl_godownfirm');
	
		$this->db->where('login_id',$id);
		$query=$this->db->get();
		return $query->row();
	}
	
	
public function getstockreportdownload(){
	$this->db->select('*')
	->from('tbl_imbm');
		
    $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left');
    // $this->db->order_by("tbl_imbm.batch_id", "desc");
		// $this->db->limit(7000);
		$q=$this->db->get();
    $response = $q->result_array();
    return $response;
  }
  public function get_barcodefetching($batchid){
	$this->db->select('*');
	$this->db->from('tbl_imbm');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_sale_incentive','tbl_sale_incentive.batch_id=tbl_imbm.batch_id','left');
	$this->db->where('tbl_imbm.batch_id',$batchid);
	$query=$this->db->get();
	return $query->row();
  }
  public function get_accountgroup(){
	$this->db->select("*")
	->from('tbl_accountgp');
	$data=$this->db->get();
	return $data->result();
  }
  public function get_cashflowinpayment($accountgpid,$from,$to){
	  $value=array(3,4);
	$this->db->select("tbl_bank_payments.*,sum(tbl_bank_payments.amount) as mysum ");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->where('le_accgrp',$accountgpid);
	$this->db->where('receiptorpay_on',1);
	$this->db->where_in('payment_type',$value);
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$query=$this->db->get();
	return $query->row();
  }

  public function get_trailbalancedebit($accountgpid,$from,$to){
	$value=array(1,3);
  $this->db->select("tbl_bank_payments.*,sum(tbl_bank_payments.amount) as mysum ");
  $this->db->from('tbl_bank_payments');
  $this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
  $this->db->where('le_accgrp',$accountgpid);
  $this->db->where('receiptorpay_on',1);
  $this->db->where_in('payment_type',$value);
  if($from!='' && $to!=''){
	  $this->db->where('tbl_bank_payments.date >=', $from);
	  $this->db->where('tbl_bank_payments.date <=', $to);
  }
  $query=$this->db->get();
  return $query->row();
}
public function get_salaryledgersum($from,$to){
	$value=array(1,3);
	$this->db->select("tbl_bank_payments.*,sum(tbl_bank_payments.amount) as mysum ");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	
	$this->db->where('receiptorpay_on',5);
	$this->db->where_in('payment_type',$value);
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$query=$this->db->get();
	return $query->row();
}

public function get_trailbalancecredit($accountgpid,$from,$to){
	$value=array(2,4);
  $this->db->select("tbl_bank_payments.*,sum(tbl_bank_payments.amount) as mysum ");
  $this->db->from('tbl_bank_payments');
  $this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
  $this->db->where('le_accgrp',$accountgpid);
  $this->db->where('receiptorpay_on',1);
  $this->db->where_in('payment_type',$value);
  if($from!='' && $to!=''){
	  $this->db->where('tbl_bank_payments.date >=', $from);
	  $this->db->where('tbl_bank_payments.date <=', $to);
  }
  $query=$this->db->get();
  return $query->row();
}
  public function get_accountgroupb2csales($from,$to){
	$this->db->select("SUM(sales_master_amount_paid) AS mysum ");
	$this->db->from('tbl_sales_master');
	$this->db->where('sales_master_payment_mode',6);
	
	if($from!='' && $to!=''){
		$this->db->where('sales_master_date >=', $from);
		$this->db->where('sales_master_date <=', $to);
	}
	$query=$this->db->get();
	return $query->row();
  }

  public function get_accountgroupb2csalestrial($from,$to){
	$this->db->select("SUM(sales_master_grand_total) AS paidsum");
	$this->db->from('tbl_sales_master');
	
	
	if($from!='' && $to!=''){
		$this->db->where('sales_master_date >=', $from);
		$this->db->where('sales_master_date <=', $to);
	}
	$query=$this->db->get();
	return $query->row();
  }
  public function get_accountgroupb2bsales($from,$to){
	$this->db->select("SUM(billing_master_paid_amount) AS mysum ");
	$this->db->from('tbl_billing_master');
	$this->db->where('billing_master_paymentmode',6);
	
	if($from!='' && $to!=''){
		$this->db->where('billing_master_billdate >=', $from);
		$this->db->where('billing_master_billdate <=', $to);
	}
	$query=$this->db->get();
	return $query->row(); 
  }

  public function get_accountgroupb2bsalestrial($from,$to){
	$this->db->select("SUM(billing_master_grandtotal) AS paidsum");
	$this->db->from('tbl_billing_master');
	
	
	if($from!='' && $to!=''){
		$this->db->where('billing_master_billdate >=', $from);
		$this->db->where('billing_master_billdate <=', $to);
	}
	$query=$this->db->get();
	return $query->row(); 
  }
  public function get_sundrydeborstsum(){
	$this->db->select("SUM(outcus_amount) AS sumamount");
	$this->db->from('tbl_outstandingcustomer');
	
	$query=$this->db->get();
	return $query->row(); 
  }
  public function get_cashinhandtoday($today){
	$this->db->select("*");
	$this->db->from('tbl_closing_blance');
	$this->db->where('date',$today);
	$this->db->where('type',1);
	$query=$this->db->get();
	return $query->row(); 
  }
  public function get_bankaccounttoday($today){
	$this->db->select("*");
	$this->db->from('tbl_closing_blance');
	$this->db->where('date',$today);
	$this->db->where('type',2);
	$query=$this->db->get();
	return $query->row(); 
  }
 
  public function get_accountgroupsalesorder($from,$to){
	$this->db->select("SUM(sales_order_master_amount_paid) AS mysum ");
	$this->db->from('tbl_sales_order_master');
	$this->db->where('sales_order_master_payment_mode',6);
	
	if($from!='' && $to!=''){
		$this->db->where('sales_order_master_date >=', $from);
		$this->db->where('sales_order_master_date <=', $to);
	}
	$query=$this->db->get();
	return $query->row(); 
  }

  public function get_accountgroupsalesordertrial($from,$to){
	$this->db->select("SUM(sales_order_master_amount_paid) AS paidsum ","SUM(sales_order_master_bankamount) AS banksum ");
	$this->db->from('tbl_sales_order_master');
	//$this->db->where('sales_order_master_payment_mode',6);
	
	if($from!='' && $to!=''){
		$this->db->where('sales_order_master_date >=', $from);
		$this->db->where('sales_order_master_date <=', $to);
	}
	$query=$this->db->get();
	return $query->row(); 
  }


//   public function get_accountgroupdeliverychellan($from,$to){
// 	$this->db->select("sum(tbl_sales_order_master.sales_order_master_amount_paid) as mysum ");
// 	$this->db->from('tbl_deliverychellan_master');
// 	$this->db->where('sales_order_master_payment_mode',6);
	
// 	if($from!='' && $to!=''){
// 		$this->db->where('sales_order_master_date >=', $from);
// 		$this->db->where('sales_order_master_date <=', $to);
// 	}
// 	$query=$this->db->get();
// 	return $query->row();  
//   }
public function get_accountgrouppurchase($from,$to){
	$this->db->select("SUM(purchase_master_grandtotal) AS mysum ");
	$this->db->from('tbl_purchase_master');
	//$this->db->where('purchase_master_payment_mode',6);
	
	if($from!='' && $to!=''){
		$this->db->where('purchase_master_billdate >=', $from);
		$this->db->where('purchase_master_billdate <=', $to);
	}
	$query=$this->db->get();
	return $query->row(); 
}
public function get_accountgrouppurchasereturn($from,$to){
	$this->db->select("SUM(purreturn_master_grandtotal) AS mysum ");
	$this->db->from('tbl_purchase_return_master');
	//$this->db->where('purchase_master_payment_mode',6);
	
	if($from!='' && $to!=''){
		$this->db->where('purreturn_master_date >=', $from);
		$this->db->where('purreturn_master_date <=', $to);
	}
	$query=$this->db->get();
	return $query->row(); 
}
public function get_directexpensesum($from,$to){
	$this->db->select("SUM(amount) AS mysum ");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->join('tbl_accountgp','tbl_accountgp.ag_id =tbl_ledger.le_accgrp','left');
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$this->db->where('tbl_accountgp.ag_id',13);
	$query=$this->db->get();
	return $query->row(); 
}

public function get_directincomesum($from,$to){
	$this->db->select("SUM(amount) AS mysum ");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->join('tbl_accountgp','tbl_accountgp.ag_id =tbl_ledger.le_accgrp','left');
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$this->db->where('tbl_accountgp.ag_id',34);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_indirectexpense($from,$to){
	$this->db->select("SUM(amount) AS mysum ");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->join('tbl_accountgp','tbl_accountgp.ag_id =tbl_ledger.le_accgrp','left');
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$this->db->where('tbl_accountgp.ag_id',12);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_indirectincome($from,$to){
	$this->db->select("SUM(amount) AS mysum ");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->join('tbl_accountgp','tbl_accountgp.ag_id =tbl_ledger.le_accgrp','left');
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$this->db->where('tbl_accountgp.ag_id',11);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_fixedassets($from,$to){
	$value=array(8,22,30);
	$this->db->select("*");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->join('tbl_accountgp','tbl_accountgp.ag_id =tbl_ledger.le_accgrp','left');
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$this->db->where_in('tbl_accountgp.ag_id',$value);
	$query=$this->db->get();
	return $query->result(); 
}
public function get_liability($from,$to){
	$value=array(5,21,29);
	$this->db->select("*");
	$this->db->from('tbl_bank_payments');
	$this->db->join('tbl_ledger','tbl_ledger.le_id=tbl_bank_payments.ledger','left');
	$this->db->join('tbl_accountgp','tbl_accountgp.ag_id =tbl_ledger.le_accgrp','left');
	if($from!='' && $to!=''){
		$this->db->where('tbl_bank_payments.date >=', $from);
		$this->db->where('tbl_bank_payments.date <=', $to);
	}
	$this->db->where_in('tbl_accountgp.ag_id',$value);
	$query=$this->db->get();
	return $query->result(); 
}
public function get_salesordersummery($from,$to){
	$this->db->select("*");
	$this->db->from('tbl_sales_order_master');
	if($from!='' && $to!=''){
		$this->db->where('tbl_sales_order_master.sales_order_master_date >=', $from);
		$this->db->where('tbl_sales_order_master.sales_order_master_date <=', $to);
		// $this->db->or_where('tbl_sales_order_master.sales_edited_date >=', $from);
		// $this->db->or_where('tbl_sales_order_master.sales_edited_date <=', $to);
	}
	$this->db->where('sales_created',0);
	$query=$this->db->get();
	return $query->result(); 
}
public function get_salesordersummery1($from,$to){
	$this->db->select("*");
	$this->db->from('tbl_sales_order_master');
	if($from!='' && $to!=''){
		// $this->db->where('tbl_sales_order_master.sales_order_master_date >=', $from);
		// $this->db->where('tbl_sales_order_master.sales_order_master_date <=', $to);
		$this->db->where('tbl_sales_order_master.sales_edited_date >=', $from);
		$this->db->where('tbl_sales_order_master.sales_edited_date <=', $to);
	}
	$this->db->where('sales_created',0);
	$query=$this->db->get();
	return $query->result(); 
}
public function get_purchasereturn_master($id){
	$this->db->select("*");
	$this->db->from('tbl_purchase_return_master');
	
	$this->db->where('purreturn_master_id',$id);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_purchasereturn_trans($id){
	$this->db->select("*");
	$this->db->from('tbl_purchase_return_trans');
	$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_purchase_return_trans.purreturn_item_batch_id','left');
	//$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_purchase_return_trans.purreturn_trans_batch','left');
	$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_purchase_return_trans.purreturn_item_batch_id','left');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
	$this->db->where('purreturn_trans_purreturn_master_id',$id);
	$this->db->order_by("purreturn_trans_id", "asc");
	$query=$this->db->get();
	return $query->result(); 
}
public function checksupplierpaubalance($data_where){
	$this->db->select("*");
	$this->db->from('tbl_supplier_paybalance');
	
	$this->db->where($data_where);
	$query=$this->db->get();
	return $query->row(); 
}
public function checkReturnpurchasebill($sid){
	$this->db->select("*");
	$this->db->from('tbl_purchase_return_master');
	
	$this->db->where('purreturn_master_id',$sid);
	$query=$this->db->get();
	return $query->row(); 
}
public function checkReturnpurchasebill1($sid){
	$this->db->select("*");
	$this->db->from('tbl_purchase_master');
	
	$this->db->where('purchase_master_billno',$sid);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_salesb2ctrans($refnum,$batchid){
	$this->db->select("*");
	$this->db->from('tbl_sales_master');
	$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
	$this->db->where('sales_master_bill_no',$refnum);
	$this->db->where('sales_trans_item_batch_id',$batchid);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_salesb2btrans($refnum,$batchid){
	$this->db->select("*");
	$this->db->from('tbl_billing_master');
	$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid=tbl_billing_master.billing_master_id','left');
	$this->db->where('billing_master_billno',$refnum);
	$this->db->where('billing_item_batch_id',$batchid);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_staffincentivetrans($reftype,$salestransid){
	$this->db->select("*");
	$this->db->from('tbl_staff_incentive');
	
	$this->db->where('sale_order_id',$salestransid);
	$this->db->where('sale_type',$reftype);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_salesordersummerysum($from,$to){
	$this->db->select("SUM(sales_order_master_grand_total) AS mysum ");
	$this->db->from('tbl_sales_order_master');
		if($from!='' && $to!=''){
		$this->db->where('tbl_sales_order_master.sales_order_master_date >=', $from);
		$this->db->where('tbl_sales_order_master.sales_order_master_date <=', $to);
	}
	$this->db->where('sales_created',0);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_salesreturnmaster($id){
	$this->db->select("*");
	$this->db->from('tbl_salesreturn');
	
	$this->db->where('sales_return_id',$id);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_salesreturntrans($id){
	$this->db->select("*");
	$this->db->from('tbl_salesreturn_trans');
	$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_salesreturn_trans.salesreturntrans_item_batch_id','left');
	//$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_purchase_return_trans.purreturn_trans_batch','left');
	$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_salesreturn_trans.salesreturntrans_item_batch_id','left');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
	$this->db->where('salesreturntrans_master_id',$id);
	$this->db->order_by("salesreturntrans_id", "asc");
	$query=$this->db->get();
	return $query->result(); 
}
public function get_salesgstwise_details_btocchangefromto($gst,$from,$to,$tax){
	$this->db->order_by("sales_master_date","asc");
	$this->db->select('*');
	$this->db->from('tbl_sales_trans');
	$this->db->join('tbl_sales_master','tbl_sales_master.sales_master_id=tbl_sales_trans.sales_trans_master_id','left');
	
	$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
	
	
	

	$this->db->where('tbl_sales_master.sales_master_id !=', 'NULL');
	$this->db->where('tbl_sales_trans.deleted_status !=', '1');
	if($from!='' && $to!=''){
		$this->db->where('tbl_sales_master.sales_master_date >=',$from);
		$this->db->where('tbl_sales_master.sales_master_date <=',$to);
	}
	if($gst!=''){
		$this->db->where('tbl_imbm.hsn_code',$gst);
	}
	if($tax!=''){
		$this->db->where('tbl_hsn.hsn_tax',$tax);
	}
	
	$query=$this->db->get();
	return $query->result();
}
public function get_godwonstock($cat,$item){
	$this->db->select("*");
	$this->db->from('tbl_inventory_stock');
	$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_inventory_stock.inventory_stock_item_batch_id','left');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_godownfirm','tbl_godownfirm.godownid=tbl_inventory_stock.inventory_location_id','left');
	$this->db->where('firmorgodown',2);
	if($cat!=''){
		$this->db->where('tbl_item.itm_cat',$cat);
	}
	if($item!=''){
		$this->db->where('tbl_item.itm_id',$item);
	}
	$query=$this->db->get();
	return $query->result(); 
}
public function get_transsalestable($b2ctransid){
	$this->db->select("*");
	$this->db->from('tbl_sales_trans');
	
	$this->db->where('sales_trans_id',$b2ctransid);
	$query=$this->db->get();
	return $query->row(); 
}
public function get_deliverychellantransid($deliverychellantransid){
	$this->db->select("*");
	$this->db->from('tbl_deliverychellan_trans');
	
	$this->db->where('deliverychellan_trans_id',$deliverychellantransid);
	$query=$this->db->get();
	return $query->row(); 
}

public function get_transb2bcolum($b2btransid){
	$this->db->select("*");
	$this->db->from('tbl_billing_trans');
	
	$this->db->where('billing_trans_id',$b2btransid);
	$query=$this->db->get();
	return $query->row(); 
}

public function get_outstandingcustomersum($cusid){
	$this->db->select("SUM(amount) as mysum");
	$this->db->from('tbl_outstandingcushistory');
	$this->db->where('type',3);
	$this->db->where('customer_id',$cusid);
	$query=$this->db->get();
	return $query->row(); 	
}
public function get_quatationbilldetails(){
	$this->db->select("*");
	$this->db->from('tbl_quotationbill_master');
	$query=$this->db->get();
	return $query->result(); 
}
public function get_viewquatationmbill($id){
	$this->db->select("*");
	$this->db->from('tbl_quotationbill_master');
	$this->db->where('quotationbill_master_id',$id);
	$query=$this->db->get();
	return $query->row();
}
public function get_viewquatationmbilltrans($id){
	$this->db->select("*");
	$this->db->from('tbl_quotationbill_trans');

	$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_quotationbill_trans.quotationbill_trans_batch','left');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
	$this->db->where('quotationbill_trans_quotbill_master_id',$id);
	$query=$this->db->get();
	return $query->result(); 
}
	
public function get_batchcheckincentive($batch_id){
	$this->db->select("*");
	$this->db->from('tbl_sale_incentive');
	$this->db->where('batch_id',$batch_id);
	$query=$this->db->get();
	return $query->row();	
}

public function get_furniturestocks($cat,$sup,$id){
		$this->db->select('tbl_itemcategory.itcat_name,tbl_item.itm_id,tbl_imbm.batchcode,tbl_imbm.batch_id,tbl_item.itm_code,tbl_item.itm_name,tbl_current_stock.cur_stock_item_count,tbl_current_stock.cur_stock_id');
		$this->db->from('tbl_imbm');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id=tbl_item.itm_cat','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_group',$id);
		if($cat!=''){
			$this->db->where('tbl_item.itm_cat',$cat);
		}
		if($sup!=''){
			$this->db->where('tbl_imbm.supplier',$sup);
		}
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
}
public function record_count_furniture($cat,$sup,$id){
	   $this->db->where('tbl_item.itm_group',$id);
		if($cat!=''){
			$this->db->where('tbl_item.itm_cat',$cat);
		}
		if($sup!=''){
			$this->db->where('tbl_imbm.supplier',$sup);
		}
	return $this->db->count_all('tbl_salesreturn');
}
public function get_homeapplicesstocks($cat,$sup){
	$this->db->select('tbl_itemcategory.itcat_name,tbl_item.itm_id,tbl_imbm.batchcode,tbl_imbm.batch_id,tbl_item.itm_code,tbl_item.itm_name,tbl_current_stock.cur_stock_item_count,tbl_current_stock.cur_stock_id');
		$this->db->from('tbl_imbm');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id=tbl_item.itm_cat','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_group','2');
		if($cat!=''){
			$this->db->where('tbl_item.itm_cat',$cat);
		}
		if($sup!=''){
			$this->db->where('tbl_imbm.supplier',$sup);
		}
		$query=$this->db->get();
		return $query->result();
}
public function get_electronicstocks($cat,$sup){
	$this->db->select('tbl_itemcategory.itcat_name,tbl_item.itm_id,tbl_imbm.batchcode,tbl_imbm.batch_id,tbl_item.itm_code,tbl_item.itm_name,tbl_current_stock.cur_stock_item_count,tbl_current_stock.cur_stock_id');
		$this->db->from('tbl_imbm');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id=tbl_item.itm_cat','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left');
		$this->db->where('tbl_item.itm_group','1');
		if($cat!=''){
			$this->db->where('tbl_item.itm_cat',$cat);
		}
		if($sup!=''){
			$this->db->where('tbl_imbm.supplier',$sup);
		}
		$query=$this->db->get();
		return $query->result();
}
public function get_incentiveedit($id,$cat,$sup){
	$this->db->select('tbl_sale_incentive.*,tbl_imbm.batchcode,tbl_imbm.batch_id,tbl_item.itm_code,tbl_item.itm_name');
	$this->db->from('tbl_imbm');
	$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
	$this->db->join('tbl_sale_incentive','tbl_sale_incentive.batch_id=tbl_imbm.batch_id','left');
	$this->db->where('tbl_item.itm_group',$id);
	if($cat!=''){
		$this->db->where('tbl_item.itm_cat',$cat);
	}
	if($sup!=''){
		$this->db->where('tbl_imbm.supplier',$sup);
	}
	$query=$this->db->get();
	return $query->result();
}
public function get_categoryfetch($id){
	$this->db->from('tbl_itemcategory');
	$this->db->where('itcat_grp',$id);
	$query=$this->db->get();
	return $query->result();
}

public function get_branchstock($batchid){
	$this->db->select("*");
	$this->db->from('tbl_inventory_stock');
	$this->db->where('inventory_stock_item_batch_id',$batchid);
	$this->db->where('inventory_location_id',1);
	$query=$this->db->get();
	return $query->row();	
}
public function checkgodwonstockIs($item,$batchid){
	$this->db->select("*");
	$this->db->from('tbl_inventory_stock');
	$this->db->where('inventory_stock_item_id',$item);
	$this->db->where('inventory_stock_item_batch_id',$batchid);
	$this->db->where('inventory_location_id',2);
	$query=$this->db->get();
	return $query->row();
}
public function getcheckCurrentStock($item,$batchid){
	$this->db->select("*");
	$this->db->from('tbl_current_stock');
	$this->db->where('cur_stock_item_id',$item);
	$this->db->where('current_stock_batch_id',$batchid);
	$query=$this->db->get();
	return $query->row();	
}
public function checkbranchstockIs($item,$batchid){
	$this->db->select("*");
	$this->db->from('tbl_inventory_stock');
	$this->db->where('inventory_stock_item_id',$item);
	$this->db->where('inventory_stock_item_batch_id',$batchid);
	$this->db->where('inventory_location_id',1);
	$query=$this->db->get();
	return $query->row();
}
public function get_godwonstock1($batchid){
	$this->db->select("*");
	$this->db->from('tbl_inventory_stock');
	$this->db->where('inventory_stock_item_batch_id',$batchid);
	$this->db->where('inventory_location_id',2);
	$query=$this->db->get();
	return $query->row();	
}
public function get_checksalestoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_sales_master');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();	
}
public function get_checksalesb2btoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_billing_master');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();
}
public function get_checkdctoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_deliverychellan_master');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();
}
public function get_checkordertoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_sales_order_master');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();
}
public function get_checkreturntoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_salesreturn');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();
}
public function get_checkpurchasetoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_purchase_master');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();
}
public function get_checkpreturntoken($unique){
	$this->db->select("*");
	$this->db->from('tbl_purchase_return_master');
	$this->db->where('token',$unique);
	$query=$this->db->get();
	return $query->row();
}
}

