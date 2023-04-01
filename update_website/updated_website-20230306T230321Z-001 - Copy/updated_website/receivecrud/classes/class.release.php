<?php
class Finish{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_finish($finish_id, $user_id,$trans_id,$finish_payment){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$finish_id, $user_id,$trans_id,$finish_payment,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_finish(finish_id, user_id, trans_id, finish_payment, finish_date_updated, finish_time_updated, finish_status) VALUES (?,?,?,?,?,?,?)");
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

	
	public function list_finish(){
		$sql="SELECT * FROM tbl_finish";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return  $data;	
		}
}
	 function get_user_id($id){
		$sql="SELECT user_id FROM tbl_finish WHERE finish_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	function get_user_lastname($id){
		$sql="SELECT user_lastname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_lastname = $q->fetchColumn();
		return $user_lastname;
 
}
	function get_job_price($id){
		$sql="SELECT job_price FROM tbl_job_order WHERE finish_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$job_price = $q->fetchColumn();
		return $job_price;
	}


	function get_finish_id($id){
		$sql="SELECT finish_id FROM tbl_finish WHERE finish_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$finish_id = $q->fetchColumn();
		return $finish_id;
	}
	function get_finish_date_updated($id){
		$sql="SELECT finish_date_updated FROM tbl_finish WHERE finish_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$finish_date_updated = $q->fetchColumn();
		return $finish_date_updated;
	}
	function get_finish_payment($id){
		$sql="SELECT finish_payment FROM tbl_finish WHERE finish_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$finish_payment = $q->fetchColumn();
		return $finish_payment;
	}
	function get_trans_id($id){
		$sql="SELECT trans_id FROM tbl_job_order WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$trans_id = $q->fetchColumn();
		return $trans_id;
	}
	
}


