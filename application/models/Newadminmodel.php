<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newadminmodel extends CI_Model {
    public function get_bill_no(){
		$this->db->select("purchase_master_billno");
		$this->db->from("tbl_purchase_master");
		
		$data=$this->db->get();
		return $data->result();
	}
	public function get_purchasereturncount(){
		$this->db->select("COUNT(purreturn_master_id) AS mycount");
		$this->db->from("tbl_purchase_return_master");
		
		$data=$this->db->get();
		return $data->row();
	}
	public function get_purchasereturnbill_no(){
		$this->db->select("purreturn_master_debitno");
		$this->db->from("tbl_purchase_return_master");
		$this->db->order_by('purreturn_master_id','desc');
		$this->db->limit(1);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_purchasereturnlist(){
		$this->db->select("*");
		$this->db->from("tbl_purchase_return_master");
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_purchase_return_master.purreturn_master_supplier','left');
		
		$this->db->order_by('purreturn_master_id','DESC');
		$data=$this->db->get();
		return $data->result();
	}
	public function record_count_purchasereturn(){
		return $this->db->count_all('tbl_purchase_return_master');
	}
	public function get_purchasereturnlistlimitfetch($limit,$start){
		$this->db->select("*");
		$this->db->from("tbl_purchase_return_master");
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_purchase_return_master.purreturn_master_supplier','left');
		
		//$this->db->limit($limit,$start);
		$this->db->order_by('purreturn_master_id','DESC');
		$data=$this->db->get();
		return $data->result();
	}
	public function get_supplierwisedetailedb2c($limit,$start){
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id = tbl_sales_master.sales_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id =tbl_item.itm_cat','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_imbm.supplier','left');
		
		$this->db->order_by("sales_master_bill_no", "asc");
		$this->db->limit($limit,$start);
		
		
		$data=$this->db->get();
		
		return $data->result();
	}

	public function get_supplierwisedetailedb2csearch($from,$to,$sub){
		
	
		
		$this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id = tbl_sales_master.sales_master_id','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_id =tbl_item.itm_cat','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_itemcategory.itcat_grp','left');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_imbm.supplier','left');
		
		$this->db->order_by("sales_master_bill_no", "asc");

		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_sales_master.sales_master_date >=', $from);
			$this->db->where('tbl_sales_master.sales_master_date <=', $to);
		}
		if($sub !='')
		{
			$this->db->where('tbl_supplier.sup_id',$sub);
		}
		
	
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_supplierwisedetailedb2b($from,$to,$supplier){
		
		if( $from!='' && $to !='')
		{

			$this->db->where('tbl_billing_master.billing_master_billdate >=', $from);
			$this->db->where('tbl_billing_master.billing_master_billdate <=', $to);
		}
		if($supplier !='')
		{
			$this->db->where('tbl_supplier.sup_id',$supplier);
		}
		
		$this->db->select('*');
		$this->db->from('tbl_billing_master');
		$this->db->join('tbl_billing_trans','tbl_billing_trans.billing_trans_billing_masterid = tbl_billing_master.billing_master_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_billing_trans.billing_item_id','left');
		$this->db->join('tbl_itemgroup','tbl_itemgroup.ig_id=tbl_item.itm_group','left');
		$this->db->join('tbl_itemcategory','tbl_itemcategory.itcat_grp=tbl_item.itm_group','left');
		$this->db->join('tbl_imbm','tbl_imbm.item_id=tbl_item.itm_id','left');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_imbm.supplier','left');
		$this->db->order_by("billing_master_billno", "asc");
		
		
		
		$data=$this->db->get();
		
		return $data->result();
	}
	public function get_b2csale_masternew($id){
		$this->db->select('*')
		->from('tbl_sales_master');
		$this->db->where('sales_master_id',$id);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_b2csale_transnew($id){
		$this->db->select('*')
		->from('tbl_sales_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id =tbl_imbm.batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
		$this->db->where('sales_trans_master_id',$id);
		$this->db->order_by("sales_trans_id", "asc");
	
		$data=$this->db->get();
		return $data->result();
	}
	public function get_billnumbersearchpurchase($num){
		$this->db->select('*')
		->from('tbl_purchase_master');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_purchase_master.purchase_master_supplier','left');
		$this->db->like('purchase_master_billno',$num);
		$this->db->or_like('invoiceno',$num);
		$this->db->or_like('sup_name',$num);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_billnumbersearchb2csale($num){
		$this->db->select('*')
		->from('tbl_sales_master');
		$this->db->like('sales_master_customer_name',$num);
		$this->db->or_like('sales_master_phone_no',$num);
		
		$data=$this->db->get();
		return $data->result_array();
	}

	public function get_billnumbersearchsalesorder($num){
		$this->db->select('*')
		->from('tbl_sales_order_master');
		$this->db->like('sales_order_master_bill_no',$num);
		$this->db->or_like('sales_order_master_customer_name',$num);
		$this->db->or_like('sales_order_master_phone_no',$num);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_billnumbersearchb2bsale($num){
		$this->db->select('*')
		->from('tbl_billing_master');
		$this->db->like('billing_master_customer_name',$num);
		$this->db->or_like('billing_master_phoneno',$num);
		
		$data=$this->db->get();
		return $data->result_array();
	}
	public function get_purchasemasterlist($id){
		$this->db->select('*')
		->from('tbl_purchase_master');
		$this->db->where('purchase_master_id',$id);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_purchaseitemlistnew($id){
		$this->db->select('*')
		->from('tbl_purchase_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_purchase_trans.purchase_item_batch_id','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_imbm.batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
		$this->db->where('purchase_trans_purchase_master_id',$id);
		$this->db->order_by("purchase_trans_id", "asc");
		$data=$this->db->get();
		return $data->result();
	}
	public function get_sales_master_edit($id){
		$this->db->select('tbl_sales_order_master.*,tbl_maps.location')
		->from('tbl_sales_order_master');
		$this->db->join('tbl_maps','tbl_maps.id=tbl_sales_order_master.location_id','left');
		$this->db->where('sales_order_master_id',$id);
	
		$data=$this->db->get();
		return $data->row();
	}
	public function get_salesorder_trans($id){
		$this->db->select('*')
		->from('tbl_sales_order_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_order_trans.sales_order_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_hsn','tbl_hsn.hsn_id=tbl_imbm.hsn_code','left');
		$this->db->where('sales_order_trans_master_id',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_b2bsaleslist($id){
		$this->db->select('*')
		->from('tbl_billing_master');
		$this->db->where('billing_master_id',$id);
		$this->db->order_by("billing_master_id", "asc");
		$data=$this->db->get();
		return $data->row();
	}
	public function get_b2bsaleslisttrans($id){
		$this->db->select('*')
		->from('tbl_billing_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_billing_trans.billing_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_current_stock','tbl_current_stock.current_stock_batch_id=tbl_billing_trans.billing_item_batch_id','left');
		$this->db->where('billing_trans_billing_masterid',$id);
		$this->db->order_by("tbl_billing_trans.billing_trans_id", "asc");
		$data=$this->db->get();
		return $data->result();
	}
	public function get_delivery_master($id){
		$this->db->select('*')
		->from('tbl_deliverychellan_master');
		$this->db->where('deliverychellan_master_id',$id);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_delivery_trans($id){
		$this->db->select('*')
		->from('tbl_deliverychellan_trans');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_deliverychellan_trans.deliverychellan_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		// $this->db->join('tbl_inventory_stock','tbl_inventory_stock.inventory_stock_item_batch_id=tbl_imbm.batch_id','left');
		$this->db->where('deliverychellan_trans_billing_masterid',$id);
		$data=$this->db->get();
		return $data->result();
	}
	public function get_routelist(){
		$this->db->select('*')
		->from('tbl_routes');
		
		$data=$this->db->get();
		return $data->result();
	}
	public function get_maplist(){
		$this->db->select('*')
		->from('tbl_maps');
		$this->db->join('tbl_routes','tbl_routes.id=tbl_maps.route_id','left');
		$this->db->select('tbl_maps.*','tbl_routes.routename');
		$data=$this->db->get();
		return $data->result();
	}
	public function locationedit($id){
		$this->db->select('*')
		->from('tbl_maps');
		$this->db->where('id',$id);
		$data=$this->db->get();
		return $data->row();
	}
	public function get_deliverymap($sup,$depart,$cate,$rote,$mdate,$from,$to){
		$this->db->select('*')
		->from('tbl_sales_order_master');
		$this->db->join('tbl_sales_order_trans','tbl_sales_order_trans.sales_order_trans_master_id=tbl_sales_order_master.sales_order_master_id ','left');
		$this->db->join('tbl_imbm','tbl_imbm.batch_id=tbl_sales_order_trans.sales_order_batch_id ','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
		$this->db->join('tbl_supplier','tbl_supplier.sup_id=tbl_imbm.supplier ','left');
		$this->db->join('tbl_maps','tbl_maps.id=tbl_sales_order_master.location_id ','left');
		$this->db->join('tbl_routes','tbl_routes.id=tbl_maps.route_id','left');
		if($sup!=0){
			$this->db->where('tbl_supplier.sup_id',$sup);
		}
		if($depart!=0){
			$this->db->where('tbl_item.itm_group',$depart);
		}
		if($mdate!=""){
			$this->db->where('tbl_sales_order_master.sales_order_master_date',$mdate);
		}
		if($cate!=0){
			$this->db->where('tbl_item.itm_cat',$cate);
		}
		if($rote!=0){
			$this->db->where('tbl_routes.id',$rote);
		}
		if($from!="" && $to!=""){
			$this->db->where('tbl_sales_order_master.sales_order_master_delivery_date >=', $from);
		    $this->db->where('tbl_sales_order_master.sales_order_master_delivery_date <=', $to);
		}
		$this->db->where('tbl_sales_order_trans.sales_order_status',0);
		$data=$this->db->get();
		return $data->result();
	}
	

}