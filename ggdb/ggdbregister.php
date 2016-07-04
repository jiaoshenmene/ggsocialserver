 <?php


// echo "IP: ".$ip;


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

	public $m_username = 'username';
	public $m_password = 'password';
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
	// echo "Connected successfully";
	}

	public function create_db($dbname)
	{
		$sql = "CREATE DATABASE " . $dbname ;
		echo ($sql);
		if (mysqli_query(self::$conn , $sql)) {
			echo "Database created successfully" . $dbname;
		}else{
			echo "Error creating database: " . $conn->error;
		}
	}

	public function create_table()
	{
		$sql = "CREATE TABLE IF NOT EXISTS registertable (
			    userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			    username VARCHAR(30) NOT NULL,
			    password VARCHAR(30) NOT NULL,
			    email VARCHAR(50)
			    )";

	  
	    if (mysqli_query(self::$conn, $sql)) {
		    echo "Table registertable created successfully";
		} else {
		    echo "Error creating table: " . mysqli_error(self::$conn);
		}
	}

	public function insertDB( $name , $password)
	{
		$stmt = self::$conn->prepare("INSERT INTO registertable (username, password) VALUES (?, ?)");
		$stmt->bind_param("ss", $name2, $password1);

		$name2 = $name;
		$password1 = $password;
		$stmt->execute();

		$stmt->close();
	}

	public function queryDB()
	{
		$sql = "SELECT  username, password FROM registertable";
		$result = mysqli_query(self::$conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		        echo "id: " . " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
		    }
		} else {
		    echo "0 results";
		}
	}

	public function queryUserFriendsList($uname)
	{
		$sql = "SELECT  username , password FROM registertable ";
		$result = mysqli_query(self::$conn, $sql);
		if (mysqli_num_rows($result)) {
			while($row = mysqli_fetch_assoc($result)) {
				$arrayName = array('username' => $row["username"], 
					'password' => $row["password"] ,
					'userID' => '1234' , 
					'nikename' => 'shenqi' ,
					'avatarURL' => 'http://a.hiphotos.baidu.com/zhidao/wh%3D600%2C800/sign=9766f7d6cf3d70cf4cafa20bc8ecfd38/00e93901213fb80e93b4c43830d12f2eb83894fc.jpg' , 
					'remarkName' => 'yiii'
					);
				$test = array($arrayName,$arrayName);
				return $test;
			}
			
		}else  {
			 $arrayName = array('status' => 'failed');
			return $arrayName;
		}
	}

	public function queryVerificationInfo($name1)
	{
		$sql = "SELECT  username , password FROM registertable WHERE username = '$name1'".PHP_EOL;
		$result = mysqli_query(self::$conn, $sql);
		if (mysqli_num_rows($result)) {
			while($row = mysqli_fetch_assoc($result)) {
				$arrayName = array('name' => $row["username"], 'password' => $row["password"]);
				return $arrayName;
			}
			
		}else  {
			 $arrayName = array('status' => 'failed');
			return $arrayName;
		}

	}


	public function closeDB()
	{
		$conn->close();
	}
}



// $mydb = new GGDB;

// $mydb->connectionDB();
// $mydb->create_db("ggdb");
// $mydb->create_table();
// $mydb->queryDB();

// $sql = "UPDATE MyGuests SET lastname='shenqi' WHERE id=2";

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }



?>