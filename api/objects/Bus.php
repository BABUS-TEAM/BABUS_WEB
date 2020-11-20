<?php
class Bus{
	private $conn;
	private $table_name = "bus";

	public $id;
	public $companyname;
	public $status;
	public $plateNumber;
	public $numberOfSeats;
	public $registrationDate;
	public $picture;

	public function __construct($db){
		$this->conn = $db;
	}
	public function register(){
		$query="INSERT INTO ".$this->table_name."
				SET
					companyname=:companyname,
					id=:id,
					status=:status,
					plateNumber=:plateNumber,
					numberOfSeats=:numberOfSeats,
					registrationDate=:registrationDate,
					picture=:picture";
		$stmt = $this->conn->prepare($query);
		$this->companyname=htmlspecialchars(strip_tags($this->companyname));
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->plateNumber=htmlspecialchars(strip_tags($this->plateNumber));
		$this->status=htmlspecialchars(strip_tags($this->status));
		$this->numberOfSeats=htmlspecialchars(strip_tags($this->numberOfSeats));
		$this->registrationDate=htmlspecialchars(strip_tags($this->registrationDate));
		$this->picture=htmlspecialchars(strip_tags($this->picture));

		$stmt->bindParam(':companyname', $this->companyname);
		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':plateNumber', $this->plateNumber);
		$stmt->bindParam(':numberOfSeats', $this->numberOfSeats);
		$stmt->bindParam(':registrationDate', $this->registrationDate);
		$stmt->bindParam(':picture', $this->picture);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	public function getId(){
		$query="SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare($query);
		if($stmt->execute()){
			return $stmt->rowCount()+1;
		}
		return false;
	}				
	function plateNumberExists(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE plateNumber = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->plateNumber=htmlspecialchars(strip_tags($this->plateNumber));
		$stmt->bindParam(1, $this->plateNumber);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;
	}
	function listBusesOfCompany(){
		$query="SELECT * 
		FROM ".$this->table_name." 
		WHERE companyname= ?";
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
}
