<?php include_once("new_config.php");?>
<?php
class Database{
	public $conn;

// calling the connection
   function __construct(){
   	$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

   	if (!$this->conn) {
   		echo "okay mane";
   		
   	}
   }

 // find the query
 public function query($sql){
   $the_query =$this->conn->query($sql);
   return $the_query;
 }

 public function escape_string($string){
 	$the_string =$this->conn->real_escape_string($string);

 	return $the_string;
 }

 public function secure_input($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
 }

}
$connection = new Database();

?>