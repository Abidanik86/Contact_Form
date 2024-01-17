<?php 
//create a database in your MySQL by the name you want,Here is the default name contact_form .
//create a table, name the table message and give id,name,email,phone,website,message  as rows. 

class database{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "contact_form";

	private $result = array();
	private $mysqli = null;
	private $conn = false;

	//Function for connect the database.
	public function __construct(){

		if (!$this->conn) {
				$this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->dbname);

				$this->conn = true;

				if ($this->mysqli->connect_error) {
					array_push($this->result,$this->mysqli->connect_error);
				}
			}else{
				return true;
			}			
	}

	// Function for insert data to database.
	public function insert($name, $email, $phone, $website, $messageContent)
    {
    	// Validate inputs
    	if (empty($name) || empty($email) || empty($messageContent)) {
        // Handle validation error, redirect with an error message or display a message.
        header("Location: home.php?error=Please fill in all required fields");
        return;
    	}

    	// Validate email format
   		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle validation error for invalid email format
        header("Location: home.php?error=Invalid email format");
        return;
    	}

    	// If you have onether table name then use it after into.
       $sql = "INSERT INTO messages (`name`, `email`, `phone`, `website`, `message`) VALUES ('$name', '$email', '$phone', '$website', '$messageContent') ";

       //Make the Query to insert to the database.
       if ($this->mysqli->query($sql)) {

       header("Location: home.php"); // The data has been inserted.

       }else{
       	// Attay Pushing the error
       	array_push($this->result,$this->mysqli->error);
       	header("Location: home.php"); // The data has not been inserted. 
       }
    }

    // Function for close the connection.
	public function __destruct(){
		//Check if the connection on	
		if ($this->conn) {
			$this->mysqli->close(); //Close The connection
			$this->conn = false;	//Make conn value false
			return true;	
		}else{
			return false;
		}
	}
}

 ?>
