<?php 
 class DB{   
 
      private $connection = NULL; 
    //========================================//	
 	function __construct($dbname, $host = "localhost", $user="root", $password=''){
 		$this->connection = new mysqli($host, $user, $password, $dbname);
 		$this->connection->query("SET NAMES 'utf8'"); 
 		$this->deletingOldInfo();		
 	}
 	//========================================//
 	private function fetchAssoc($result){
 		$arr = array();
 		if(!empty($result))
 		while($row = $result->fetch_assoc()){
 			$arr[] = $row; 
 		}
 		return $arr;
 	}
 	function deletingOldInfo(){
 		$this->deleteInfo("DELETE FROM `tbl_order_car` WHERE `tbl_order_car`.`fromdate` < CAST('". date('Y-m-d')."' AS DATE");
		$this->deleteInfo("DELETE FROM `tbl_book_taxi` WHERE `tbl_book_taxi`.`fromdate` < CAST('". date('Y-m-d')."' AS DATE");
 		 
 		
 		
 	}
 	
 	//========================================//
 	function selectInfo($query){
 		return $this->fetchAssoc($this->connection->query($query));
 	}
 	//========================================//
 	function deleteInfo($query){
 		$this->connection->query($query);
 	}
 	//========================================//
 	function insertInfo($query){
 		$this->connection->query($query);
 	}
 	
 	//========================================//
 	function updateInfo($query){
 		$this->connection->query($query);
 	}
 	
 	//========================================//
 	function __destruct(){
 		$this->connection->close();
 	} 	
 	   //========================================//
 }
   
  
  
?>