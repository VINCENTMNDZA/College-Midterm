<?php
class job{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
public function new_job_type($tname){
		
	/* Setting Timezone for DB */
	$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
	$NOW = $NOW->format('Y-m-d H:i:s');

	$data = [
		[$tname,$NOW,$NOW,'1'],
	];
	$stmt = $this->conn->prepare("INSERT INTO tbl_type (type_name, type_date_added, type_time_added, type_status) VALUES (?,?,?,?)");
	try {
		$this->conn->beginTransaction();
		foreach ($data as $row)
		{
			$stmt->execute($row);
		}
		$id= $this->conn->lastInsertId();
		$this->conn->commit();
		
	}catch (Exception $e){
		$this->conn->rollback();
		throw $e;
	}

	return $id;

	}
	public function new_product($product_name){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$product_name,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_products (product_name, product_date_added, product_time_added, product_status) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}

	public function new_job_order($trans_id, $customer_name,$customer_number,$price,$job_availed,$products_availed){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$trans_id,$customer_name,$customer_number,'1',$price,$NOW,$NOW,$job_availed,$products_availed],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_job_order(trans_id, customer_name, customer_number, prod_status, job_price, job_date_added, job_time_added, job_availed, products_availed) VALUES (?,?,?,?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}

	public function list_products(){
			$sql="SELECT * FROM tbl_products";
			$q = $this->conn->query($sql) or die("failed!");
			while($r = $q->fetch(PDO::FETCH_ASSOC)){
			$data[]=$r;
			}
			if(empty($data)){
			   return false;
			}else{
				return $data;	
			}
		}
	public function list_product_type(){
		$sql="SELECT * FROM tbl_type";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	public function list_JO(){
		$sql="SELECT * FROM tbl_job_order";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	public function list_types(){
		$sql="SELECT * FROM tbl_type";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	public function update_job_order($customer_name, $customer_number,$ptype,$id, $price){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_job_order SET customer_name=:customer_name,customer_number=:customer_number,prod_date_updated=:prod_date_updated,prod_time_updated=:prod_time_updated,type_name=:type_name,type_id=:type_id,job_price=:job_price WHERE trans_id=:trans_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':customer_name'=>$customer_name, ':customer_number'=>$customer_number, ':type_id'=>$ptype,':trans_id'=>$id, ':job_price'=>$job_price));
		return true;
	}
	function get_trans_id($id){
		$sql="SELECT trans_id FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$trans_id = $q->fetchColumn();
		return $trans_id;
	}
	function get_customer_name($id){
		$sql="SELECT customer_name FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$customer_name = $q->fetchColumn();
		return $customer_name;
	}
	function get_products_availed($id){
		$sql="SELECT products_availed FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$products_availed = $q->fetchColumn();
		return $products_availed;
	}
	function get_job_price($id){
		$sql="SELECT job_price FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$job_price = $q->fetchColumn();
		return $job_price;
	}
	function get_job_availed($id){
		$sql="SELECT job_availed FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$job_availed = $q->fetchColumn();
		return $job_availed;
	}
    function get_customer_number($id){
		$sql="SELECT customer_number FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$customer_number = $q->fetchColumn();
		return $customer_number;
	}

	function get_prod_type_name($id){
		$sql="SELECT type_name FROM tbl_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_name = $q->fetchColumn();
		return $type_name;
	}
	function get_prod_type($id){
		$sql="SELECT type_id FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_product_name($id){
		$sql="SELECT product_name FROM tbl_products WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_name = $q->fetchColumn();
		return $product_name;
	}
	function get_product_id($id){
		$sql="SELECT product_id FROM tbl_products WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_id = $q->fetchColumn();
		return $product_id;
	}
	

		
	
}