<?php
class Admin{
	private $conn;
	private $table_name = "admin";

	public $adminname;
	public $password;

	public $firstname;
	public $lastname;
	public $phonenumber;
	public $email;
	public $accountnumber;

	public function __construct($db){
		$this->conn = $db;
	}
	public function register(){
		$query="INSERT INTO ".$this->table_name."
				SET
					adminname=:adminname,
					password=:password,
					firstname=:firstname,
					lastname=:lastname,
					phonenumber=:phonenumber,
					email=:email,
					accountnumber=:accountnumber";
		$stmt = $this->conn->prepare($query);
		$this->adminname=htmlspecialchars(strip_tags($this->adminname));
		$this->password=htmlspecialchars(strip_tags($this->password));
		$this->phonenumber=htmlspecialchars(strip_tags($this->phonenumber));
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->lastname=htmlspecialchars(strip_tags($this->lastname));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->accountnumber=htmlspecialchars(strip_tags($this->accountnumber));

		$stmt->bindParam(':adminname', $this->adminname);
		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':phonenumber', $this->phonenumber);
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':accountnumber', $this->accountnumber);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	function phoneNumberExists(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE phonenumber = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->phonenumber=htmlspecialchars(strip_tags($this->phonenumber));
		$stmt->bindParam(1, $this->phonenumber);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;
	}
	function adminnameExists(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE adminname = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->adminname=htmlspecialchars(strip_tags($this->adminname));
		$stmt->bindParam(1, $this->adminname);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;
	}

	function checkAdminnameAndPassword(){
		$query="SELECT * 
		FROM ".$this->table_name." 
		WHERE adminname=:adminname
				AND
				password=:password";
		$stmt = $this->conn->prepare( $query );
		$this->adminname=htmlspecialchars(strip_tags($this->adminname));
		$this->password=htmlspecialchars(strip_tags($this->password));
		$stmt->bindParam(":adminname", $this->adminname);
		$stmt->bindParam(":password", $this->password);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return true;
		}
		return false;
	}


}

?>