<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Billing_model extends CC_Model { 
    public function __construct() {
        parent::__construct();
    } 
    private $_bill = 'tbl_bill'; 
	
	
	public function store_bill($data) { 
        $this->db->insert($this->_bill, $data); 
        return $this->db->insert_id(); 
    }
	
	public function store_tras_bill($billdata) { 
        $this->db->insert('tbl_trans_bill', $billdata); 
        return $this->db->insert_id(); 
    }
	
	public function store_payment($payment){ 
        $this->db->insert('tbl_payment', $payment); 
        return $this->db->insert_id(); 
    }
	
	
    public function stock_info($page='1',$search="") {
		$PAGINATION=10;
		
		if($page<1){
			 $page=1;
		 } 
		 $offset = ($page - 1) * $PAGINATION;  
		
        $this->db->select('*')
                ->from('tbl_stock')
				->where('deletion_status',0)
                ->order_by('id', 'desc')
				->limit($PAGINATION,$offset);
			$where=' 1=1 ';		
		
		if($search!=""){ 
			$where .= ' and merchant_name LIKE "%'.trim($search).'%" ';  
			 
		}		
		$this->db->where( $where );  	
        $query_result = $this->db->get();
		//echo $this->db->last_query();exit();
        $result = $query_result->result_array();
        return $result;
    }
	
	 public function billing_info($page='1',$search="", $id="") {
		
		$PAGINATION=10;
		
		if($page<1){
			 $page=1;
		 } 
		 $offset = ($page - 1) * $PAGINATION;  
		 
		
		
         $this->db->select('bill.*, trans.stock_id, trans.total_qty, trans.amount as trans_amount, stock.stock_date, 
		          stock.product_name,stock.batch_no,stock.mgf_company,stock.mgf_date,stock.exp_date,stock.hsn_sac,stock.cases,
stock.qty,stock.price_pcs,stock.amount,stock.created_date')
                ->from('tbl_bill as bill')
				->join('tbl_trans_bill as trans', 'bill.id = trans.bill_id', 'left')
				->join('tbl_stock as stock', 'trans.stock_id = stock.id', 'left')
				->where('bill.deletion_status',0)
				->group_by('trans.bill_id')
                ->order_by('bill.id', 'desc')
				->limit($PAGINATION,$offset);
			$where=' 1=1 ';		
		
		  if($id !=""){
					
				$where .=' and bill.id = '.$id;
				}
				
		if($search!=""){ 
			$where .= ' and customer_name LIKE "%'.trim($search).'%" OR bill_no LIKE "%'.trim($search).'%" OR mobile_no LIKE "%'.trim($search).'%"';  
			 
		}		
		$this->db->where( $where );  	
        $query_result = $this->db->get();
		//echo $this->db->last_query();exit();
        $result = $query_result->result_array();
        return $result;
    }
	
	public function bill_count(){
		 $this->db->select('bill.*, trans.stock_id, trans.total_qty, trans.amount as trans_amount, stock.stock_date, 
		          stock.product_name,stock.batch_no,stock.mgf_company,stock.mgf_date,stock.exp_date,stock.hsn_sac,stock.cases,
stock.qty,stock.price_pcs,stock.amount,stock.created_date')
                ->from('tbl_bill as bill')
				->join('tbl_trans_bill as trans', 'bill.id = trans.bill_id', 'left')
				->join('tbl_stock as stock', 'trans.stock_id = stock.id', 'left')
				->where('bill.deletion_status',0)
				->group_by('trans.bill_id')
                ->order_by('bill.id', 'desc');
			$where=' 1=1 ';		
		  if($id !=""){
				$where .=' and bill.id = '.$id;
				}
				
		if($search!=""){ 
			$where .= ' and customer_name LIKE "%'.trim($search).'%" OR bill_no LIKE "%'.trim($search).'%" OR mobile_no LIKE "%'.trim($search).'%"';  
			 
		}		
		$this->db->where( $where );  	
        $query_result = $this->db->get();
		//echo $this->db->last_query();exit();
        $result = $query_result->result_array();
        return count($result);
	}
	
	public function get_exportcsv_bill(){
		$PAGINATION=10;
		
		if($page<1){
			 $page=1;
		 } 
		 $offset = ($page - 1) * $PAGINATION;  
		 
		$this->db->select('bill.bill_no,bill.customer_name,bill.mobile_no,bill.bill_date,bill.sub_total,bill.cgst_mp_price,bill.sgst_mp_price,bill.grand_total')
                ->from('tbl_bill as bill')
				->join('tbl_trans_bill as trans', 'bill.id = trans.bill_id', 'left')
				->join('tbl_stock as stock', 'trans.stock_id = stock.id', 'left')
				->where('bill.deletion_status',0)
				->group_by('trans.bill_id')
                ->order_by('bill.id', 'desc');
				
			$where=' 1=1 ';		
		
		  if($id !=""){
					
				$where .=' and bill.id = '.$id;
				}
				
		if($search!=""){ 
			$where .= ' and customer_name LIKE "%'.trim($search).'%" OR bill_no LIKE "%'.trim($search).'%" OR mobile_no LIKE "%'.trim($search).'%"';  
			 
		}		
		$this->db->where( $where );  	
        $query_result = $this->db->get();
		//echo $this->db->last_query();exit();
        $result = $query_result->result_array();
        return $result;
	}
	
    public function get_bill_trans_by_id($bill_id) {
         $this->db->select('bill.*, trans.stock_id, trans.total_qty, trans.amount as trans_amount, stock.stock_date, 
		          stock.product_name,stock.batch_no,stock.mgf_company,stock.pack_size,stock.mgf_date,stock.exp_date,stock.hsn_sac,stock.cases,
stock.qty,stock.price_pcs,stock.amount,stock.created_date')
                ->from('tbl_bill as bill')
				->join('tbl_trans_bill as trans', 'bill.id = trans.bill_id', 'left')
				->join('tbl_stock as stock', 'trans.stock_id = stock.id', 'left')
				->where('bill.deletion_status',0)
                ->where('bill.id',$bill_id);
				$query_result = $this->db->get();
				//echo $this->db->last_query();exit();
		$result = $query_result->result_array();
        return $result;
    }
	
	public function get_bill_by_id($bill_id) {
          $result = $this->db->get_where('tbl_bill', array('id' => $bill_id, 'deletion_status' => 0));
        return $result->row_array();
    }
	
	public function get_stock_info($id){
		$result = $this->db->get_where('tbl_stock', array('id' => $id));
		//echo $this->db->last_query();exit();
        return $result->row_array();
	}
	
	public function getpaymentlist($bill_id){
		$result = $this->db->get_where('tbl_payment', array('bill_id' => $bill_id));
        return $result->result_array();
		
	}
	
	public function get_deposit_amount($id){
		$this->db->select_sum('deposit');
		$this->db->where('bill_id', $id);
        $result = $this->db->get('tbl_payment')->row();  
        return $result->deposit;	  
	}

    public function get_stock_by_id($stock_id) {
        $result = $this->db->get_where('tbl_stock', array('id' => $stock_id, 'deletion_status' => 0));
        return $result->row_array();
    }
	
	public function update_bill($edit_id, $data) {
        $this->db->update('tbl_bill', $data, array('id' => $edit_id));
        return $this->db->affected_rows();
    }
	
	public function update_stock_qty($sid, $update) {
        $this->db->update('tbl_stock', $update, array('id' => $sid));
        return $this->db->affected_rows();
    }
	
	public function update_stock($stock_id, $data) {
        $this->db->update('tbl_stock', $data, array('id' => $stock_id));
        return $this->db->affected_rows();
    }
	
	   public function del_trans_by_id($bill_id) {
		    $this->db-> where('bill_id', $bill_id);
            $this->db-> delete('tbl_trans_bill');
        }
	
	public function remove_stock_by_id($stock_id) {
        $this->db->update('tbl_stock', array('deletion_status' => 1), array('id' => $stock_id));
        return $this->db->affected_rows();
    }

}
