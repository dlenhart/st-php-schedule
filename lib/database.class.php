<?php
/*
Author:		Drew D. Lenhart
File:		database.class.php
Desc:		PDO wrapper for SQLITE
Date:		7/13/16
Use:		Testing cli:  php database.class.php  - uncomment below
*/

class db
{
	public $db;
	private static $instance;

    function __construct(){
        $sqlitedb = "../data/" . DB_NAME . '.sqlite';

        try {
			$conn = "sqlite:{$sqlitedb}";
			$this->db = new PDO($conn);
 
        } catch(PDOException $e) {
            echo $e->getMessage(); exit(1);
        }
    }
	//Singleton instance
	public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
	
    //Grab single entry
    function getDataSingle($query){
		try {
			$queryEx = $this->db->prepare($query);
			$queryEx->execute();
			return $queryEx->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e ->getMessage();
		}  
    }
    
    //Grab multiple entries
    function getData($query){
		try {
			$queryEx = $this->db->prepare($query);
			$queryEx->execute();
			return $queryEx->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e ->getMessage();
		} 
    }
	
	//use update for Delete, or Update queries
    function updateData($query){
		$queryEx = $this->db->prepare($query);		
		return $queryEx->execute();
    }
    
    //Insert/Update/Delete
    function execQuery($query, $data){
		try {
			$queryEx = $this->db->prepare($query);		
			return $queryEx->execute($data);		
		} catch(PDOException $e) {
			echo $e ->getMessage();
		}
    }
	
	//Close connection
    function closeDB(){
		$this->db = null;	
    }

}
//for testing cli:  php database.class.php
/*$db = db::getInstance();
$sql = "SELECT * FROM JOBS";
$stmt = $db->getData($sql);

foreach($stmt as $row){
	echo $row['id'] . $row['title'];
}*/