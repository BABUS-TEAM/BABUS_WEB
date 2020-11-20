<?php
class Seat{
	private $conn;
	private $table_name = "seat";

	public $ticketid;
	public $round;
	public $maxnumofseats;
	public $busid;
	public function __construct($db){
		$this->conn = $db;
	}
	public function register(){
		$query="INSERT INTO ".$this->table_name."
				SET
					ticketid=:ticketid,
					round=:round,
					maxnumofseats=:maxnumofseats,
					busid=:busid";
		$stmt = $this->conn->prepare($query);
		$this->ticketid=htmlspecialchars(strip_tags($this->ticketid));
		$this->round=htmlspecialchars(strip_tags($this->round));
		$this->maxnumofseats=htmlspecialchars(strip_tags($this->maxnumofseats));
		$this->busid=htmlspecialchars(strip_tags($this->busid));

		$stmt->bindParam(':ticketid', $this->ticketid);
		$stmt->bindParam(':round', $this->round);
		$stmt->bindParam(':maxnumofseats', $this->maxnumofseats);
		$stmt->bindParam(':busid', $this->busid);
		if($stmt->execute()){
			return true;
		}
		return false;
	}

}


