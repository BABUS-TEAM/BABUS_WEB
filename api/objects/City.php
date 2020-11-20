<?php
class City{
	private $conn;
	private $table_name = "city";

	public $name;
	public $latitude;
	public $longitude;
	public $description;
	public $picture;
	public function __construct($db){
		$this->conn = $db;
	}
	public function register(){
		$query="INSERT INTO ".$this->table_name."
				SET
					name=:name,
					latitude=:latitude,
					longitude=:longitude,
					description=:description,
					picture=:picture";
		$stmt = $this->conn->prepare($query);
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->latitude=htmlspecialchars(strip_tags($this->latitude));
		$this->longitude=htmlspecialchars(strip_tags($this->longitude));
		$this->description=htmlspecialchars(strip_tags($this->description));
		$this->picture=htmlspecialchars(strip_tags($this->picture));

		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':latitude', $this->latitude);
		$stmt->bindParam(':longitude', $this->longitude);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':picture', $this->picture);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	public function cityAlreadyExist(){
		$query = "SELECT *
				FROM " . $this->table_name . "
				WHERE name = ?
				LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$this->name=htmlspecialchars(strip_tags($this->name));
		$stmt->bindParam(1, $this->name);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0){
			return true;
		}
		return false;		
	}


}


