<?php
class TrainVendor{
	private $conn;
	private $table_name = "trainvendor";

	public $companyname;
	public $companyaddress;
	public $companylocation;
	public $companymoto;
	public $companyusername;
	public $companylogo;
	public $companypassword;


	public function __construct($db){
		$this->conn = $db;
	}
	public function register(){
		$query="INSERT INTO ".$this->table_name."
				SET
					companyname=:companyname,
					companypassword=:companypassword,
					companyusername=:companyusername,
					companyaddress=:companyaddress,
					companymoto=:companymoto,
					companylocation=:companylocation,
					companylogo=:companylogo";
		$stmt = $this->conn->prepare($query);
		$this->companyname=htmlspecialchars(strip_tags($this->companyname));
		$this->companypassword=htmlspecialchars(strip_tags($this->companypassword));
		$this->companyaddress=htmlspecialchars(strip_tags($this->companyaddress));
		$this->companyusername=htmlspecialchars(strip_tags($this->companyusername));
		$this->companymoto=htmlspecialchars(strip_tags($this->companymoto));
		$this->companylocation=htmlspecialchars(strip_tags($this->companylocation));
		$this->companylogo=htmlspecialchars(strip_tags($this->companylogo));

		$stmt->bindParam(':companyname', $this->companyname);
		$stmt->bindParam(':companypassword', $this->companypassword);
		$stmt->bindParam(':companyusername', $this->companyusername);
		$stmt->bindParam(':companyaddress', $this->companyaddress);
		$stmt->bindParam(':companymoto', $this->companymoto);
		$stmt->bindParam(':companylocation', $this->companylocation);
		$stmt->bindParam(':companylogo', $this->companylogo);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	function companyNameExists(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE companyname = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->companyname=htmlspecialchars(strip_tags($this->companyname));
		$stmt->bindParam(1, $this->companyname);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;
	}
	function companyUsernameExists(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE companyusername = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->companyusername=htmlspecialchars(strip_tags($this->companyusername));
		$stmt->bindParam(1, $this->companyusername);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;
	}

	function listTrainVendors(){
		$query = "SELECT companyname
				FROM " . $this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			$result=$stmt->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}
		return false;
	}

	function searchTrainVendor(){
		$query = "SELECT companyname,companyaddress,companymoto,companylocation,companylogo
				FROM " . $this->table_name ."
				WHERE companyname = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->companyname=htmlspecialchars(strip_tags($this->companyname));
		$stmt->bindParam(1, $this->companyname);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			$result=$stmt->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}
		return false;
	}
	function searchForMatchingTrainVendor(){
		$query = "SELECT companyname,companyaddress,companymoto,companylocation,companylogo
				FROM " . $this->table_name ."
				WHERE companyname LIKE '%".$this->companyname."%'
				LIMIT 0,5";
		$stmt = $this->conn->prepare( $query );
		$this->companyname=htmlspecialchars(strip_tags($this->companyname));
		$stmt->bindParam(1, $this->companyname);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			$result=$stmt->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}
		return false;
	}
	function checkTrainVendorNameAndPassword(){
		$query="SELECT * 
		FROM ".$this->table_name." 
		WHERE companyusername=:companyusername
				AND
				companypassword=:companypassword";
		$stmt = $this->conn->prepare( $query );
		$this->companyusername=htmlspecialchars(strip_tags($this->companyusername));
		$this->companypassword=htmlspecialchars(strip_tags($this->companypassword));
		$stmt->bindParam(":companyusername", $this->companyusername);
		$stmt->bindParam(":companypassword", $this->companypassword);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->companyname=$row["companyname"];
			return true;
		}
		return false;
	}
}

?>