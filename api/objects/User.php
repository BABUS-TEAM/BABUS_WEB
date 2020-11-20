<?php
class User{
	private $conn;
	private $table_name = "user";

	public $username;
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
					username=:username,
					password=:password,
					firstname=:firstname,
					lastname=:lastname,
					phonenumber=:phonenumber,
					email=:email,
					accountnumber=:accountnumber";
		$stmt = $this->conn->prepare($query);
		$this->username=htmlspecialchars(strip_tags($this->username));
		$this->password=htmlspecialchars(strip_tags($this->password));
		$this->phonenumber=htmlspecialchars(strip_tags($this->phonenumber));
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->lastname=htmlspecialchars(strip_tags($this->lastname));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->accountnumber=htmlspecialchars(strip_tags($this->accountnumber));

		$stmt->bindParam(':username', $this->username);
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
	function usernameExists(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE username = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->username=htmlspecialchars(strip_tags($this->username));
		$stmt->bindParam(1, $this->username);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;
	}

	function checkUsernameAndPassword(){
		$query="SELECT * 
		FROM ".$this->table_name." 
		WHERE username=:username
				AND
				password=:password";
		$stmt = $this->conn->prepare( $query );
		$this->username=htmlspecialchars(strip_tags($this->username));
		$this->password=htmlspecialchars(strip_tags($this->password));
		$stmt->bindParam(":username", $this->username);
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