<?php

/**
* 
*/
class Manage
{
	
	private $con;
	private $uid;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
		$this->uid = 0;
	}

	public function manageRecordWithPagination($table,$pno){
		$a = $this->pagination($this->con,$table,$pno,10);
		if ($table == "categories") $sql = "SELECT p.cid,p.category_name as category, c.category_name as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"];
		else if($table == "products")$sql = "SELECT p.pid,p.product_name,c.category_name,b.brand_name,p.added_date,p.product_stock,p.p_status FROM products p,brands b,categories c WHERE p.bid = b.bid AND p.cid = c.cid ".$a["limit"];
		else if($table == "manage_orders" AND $_SESSION["usertype"]>1) $sql = "SELECT * FROM manage_orders where in_status='0' ".$a["limit"];	
		else if($table == "invoice_details") $sql = "SELECT id,invoice_no,product_name,qty,serial_number,status,delivery_date FROM invoice_details ".$a["limit"];
		else $sql = "SELECT * FROM ".$table." ".$a["limit"];
		
		$pre_stmt = $this->con->prepare($sql);
		$pre_stmt->execute();// or die($this->con->error);
		$rows = $pre_stmt->fetchAll(PDO::FETCH_ASSOC);	
		//return "no data";
		return ["rows"=>$rows,"pagination"=>$a["pagination"]];

	}
	public function manageInvoiceWithPagination($u_id,$pno){
		$this->uid = $u_id;
		$a = $this->pagination($this->con,"invoice_details",$pno,10);		
		$sql = "SELECT id,invoice_no,product_name,qty,serial_number,status,delivery_date FROM invoice_details where code_unite=".$this->uid." ".$a["limit"];		
		$pre_stmt = $this->con->prepare($sql);
		$pre_stmt->execute();// or die($this->con->error);
		$rows = $pre_stmt->fetchAll(PDO::FETCH_ASSOC);	
		//return "no data";
		return ["rows"=>$rows,"pagination"=>$a["pagination"]];

	}

	private function pagination($con,$table,$pno,$n){
		if($table == "manage_orders" AND $_SESSION["usertype"]>1)$pre_stmt = $this->con->prepare("SELECT COUNT(*) as nbr FROM manage_orders where in_status='0'");
		else if($table == "invoice_details")$pre_stmt = $this->con->prepare("SELECT COUNT(*) as nbr FROM invoice_details where code_unite=".$this->uid);
		else $pre_stmt = $this->con->prepare("SELECT COUNT(*) as nbr FROM ".$table);
		$pre_stmt->execute();// or die($this->con->error);
		$row = $pre_stmt->fetch(PDO::FETCH_ASSOC);
		//$totalRecords = 100000;
		$pageno = $pno;
		$numberOfRecordsPerPage = $n;

		$last = ceil($row['nbr']/$numberOfRecordsPerPage);

		$pagination = "<ul class='pagination'>";

		if ($last != 1) {
			if ($pageno > 1) {
				$previous = "";
				$previous = $pageno - 1;
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#333;'> السابق  </a></li></li>";
			}
			for($i=$pageno - 5;$i< $pageno ;$i++){
				if ($i > 0) {
					$pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
				}
				
			}
			$pagination .= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color:#333;'> $pageno </a></li>";
			for ($i=$pageno + 1; $i <= $last; $i++) { 
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
				if ($i > $pageno + 4) {
					break;
				}
			}
			if ($last > $pageno) {
				$next = $pageno + 1;
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:#333;'> التالي
</a></li></ul>";
			}
		}
	//LIMIT 0,10
		//LIMIT 20,10
		$limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;

		return ["pagination"=>$pagination,"limit"=>$limit];
	}

	public function deleteRecord($table,$pk,$id){
		if($table == "categories"){
			$pre_stmt = $this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat = ?");
			$pre_stmt->execute([$id]);
			$nbrows = $pre_stmt->rowCount();			
			if ($nbrows > 0) {
				return "DEPENDENT_CATEGORY";
			}else{
				$pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
				$result = $pre_stmt->execute([$id]);
				
				if ($result>0) return "CATEGORY_DELETED";
			}
		}else{
			$pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
			$result = $pre_stmt->execute([$id]);			
			if ($result>0) return "DELETED";			
		}
	}


	public function getSingleRecord($table,$pk,$id){
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table." WHERE ".$pk."= ? LIMIT 1");
		$pre_stmt->execute([$id]);
		$result = $pre_stmt->rowCount();
		if ($result == 1) {
			$row = $pre_stmt->fetch(PDO::FETCH_ASSOC);
		}
		return $row;
	}

	public function update_record($table,$where,$fields){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND m_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		foreach ($fields as $key => $value) {
			//UPDATE table SET m_name = '' , qty = '' WHERE id = '';
			$sql .= $key . "='".$value."', ";
		}
		$sql = substr($sql, 0,-2);
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		$pre_stmt = $this->con->prepare($sql);
		$result = $pre_stmt->execute();
		//return $sql;
		if($result>0){
			return "UPDATED";
		}
	}
	public function update_invoice_details($id,$unite,$serialnumber,$status,$username){
		$sql = "UPDATE invoice_details SET code_unite=".$unite.",serial_number='".$serialnumber."',status='".$status."',user_name='".$username."' WHERE id=".$id.";";
		$pre_stmt = $this->con->prepare($sql);
		$result = $pre_stmt->execute();
		if($result>0){
			return "UPDATED";
		}
		return $sql;
	}


      public function storeCustomerOrderInvoice($orderdate,$demande_date,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sous_unite,$su,$discount,$net_total,$paid,$due,$payment_type,$username){
		
		$pre_stmt = $this->con->prepare("INSERT INTO `invoice`(`customer_name`, `order_date`, `demande_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`,`username`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$pre_stmt->execute([$cust_name,$orderdate,$demande_date,$sous_unite,$su,$discount,$net_total,$paid,$due,$payment_type,$username]);
		$invoice_no = $this->con->lastInsertID();
		//$result = $pre_stmt->fetch(PDO::lastInsertID);
		//$invoice_no = $pre_stmt->insert_id;
		if ($invoice_no != null) {
			for ($i=0; $i < count($ar_price) ; $i++) {
				//Here we are finding the remaing quantity after giving customer
				$rem_qty = $ar_tqty[$i] - $ar_qty[$i];
				if ($rem_qty < 0) {
					return "ORDER_FAIL_TO_COMPLETE";
				}else{
					//Update Product stock
					$sql = "UPDATE products SET product_stock = '$rem_qty' WHERE product_name = '".$ar_pro_name[$i]."'";
					$this->con->prepare($sql)->execute();
				}
				$insert_product = $this->con->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`) VALUES (?,?,?,?)");
				$insert_product->execute([$invoice_no,$ar_pro_name[$i],$ar_price[$i],$ar_qty[$i]]);
				
				//$insert_product->execute() or die($this->con->error);
			}
			return $invoice_no;
		}


	}



	
}

//$obj = new Manage();
//echo "<pre>";
//print_r($obj->manageRecordWithPagination("categories",1));
//echo $obj->deleteRecord("categories","cid",14);
//print_r($obj->getSingleRecord("categories","cid",1));
//echo $obj->update_record("categories",["cid"=>1],["parent_cat"=>0,"category_name"=>"Electro","status"=>1]);
?>