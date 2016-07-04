 <?php



// Create connection

/**
* 
*/
class GGDB
{
	public $servername = "localhost";
	public $username = "root";
	public $password = "123";
	public $dbname = "myDB";
	static private $_instance;
	static public $conn ;

	function __construct()
	{
		
	}

	// static public function getInstance()
	// {
	// 	self::_instance = new self();
	// 	return self::_instance;
	// }

	public function connectionDB()
	{
		self::$conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . self::$conn->connect_error);
	} 
	echo "Connected successfully";
	}

	public function create_table()
	{
		$sql = "CREATE TABLE MyGuests1 (
			    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			    firstname VARCHAR(30) NOT NULL,
			    lastname VARCHAR(30) NOT NULL,
			    email VARCHAR(50),
			    reg_date TIMESTAMP
			    )";

	  
	    if (mysqli_query(self::$conn, $sql)) {
		    echo "Table MyGuests1 created successfully";
		} else {
		    echo "Error creating table: " . mysqli_error(self::$conn);
		}
	}


	public function queryDB()
	{
		$sql = "SELECT id, firstname, lastname FROM MyGuests";
		$result = mysqli_query(self::$conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		    }
		} else {
		    echo "0 results";
		}
	}


	public function closeDB()
	{
		$conn->close();
	}
}



$mydb = new GGDB;

$mydb->connectionDB();
$mydb->create_table();
// $mydb->queryDB();

// $sql = "UPDATE MyGuests SET lastname='shenqi' WHERE id=2";

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }



?>