<?php
class Ticket{
	private $conn;
	private $table_name = "ticket";

	public $id;
	public $route;
	public $providername;
	public $status;
	public function __construct($db){
		$this->conn = $db;
	}
	public function register(){
		$query="INSERT INTO ".$this->table_name."
				SET
					id=:id,
					route=:route,
					providername=:providername,
					status=:status";
		$stmt = $this->conn->prepare($query);
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->route=htmlspecialchars(strip_tags($this->route));
		$this->providername=htmlspecialchars(strip_tags($this->providername));
		$this->status=htmlspecialchars(strip_tags($this->status));

		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':route', $this->route);
		$stmt->bindParam(':providername', $this->providername);
		$stmt->bindParam(':status', $this->status);
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
}


