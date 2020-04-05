<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL PHP</title>
</head>
<body>
    <?php
        echo "<h3>MySQLi Library Tinker<h3>";
        echo htmlspecialchars($_SERVER["PHP_SELF"]) . "</br>";

        class Database{
            public $db_connect;
            public $dbname;
            const SERVERNAME = "localhost";
            const USERNAME   = "root";
            const PASSWORD   = "";

            public function __construct($dbName){
                $this->dbname = $dbName;
            }

            public function connect(){
                // create db connection
                $this->db_connect = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, $this->dbname);

                // check connection establishment 
                if($this->db_connect->connect_error){
                    die("db connection failed! " . $this->db_connect->connect_error);
                }else{
                    echo "db connection successfull </br>";
                }
            }

            public function createTable($tableName){
                $sql = "CREATE TABLE $tableName (
                    id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username    VARCHAR(30)     NOT NULL,
                    useremail   VARCHAR(30),
                    district    VARCHAR(30)     NOT NULL
                    )";

                if ($db_connect->query($sql) === TRUE) {
                    echo "Table $tableName created successfully";
                } else {
                    echo "Error creating table: " . $db_connect->error;
                }
            }

            public function insertData($tableName, $name, $email, $dist){
                $sql = "INSERT INTO $tableName (username, useremail, district) 
                        VALUES ('$name', '$email', '$dist')";

                if ($this->db_connect->query($sql) === TRUE) {
                    $last_id = $this->db_connect->insert_id;
                    echo "Data inserted successfully to $tableName table, at id=$last_id </br>";
                } else {
                    echo "Error inserting data: " . $this->db_connect->error;
                }
            }

            public function prepareAndBindTest(){
                $stmt = $this->db_connect->prepare("INSERT INTO RandomUser2 (username, useremail, district) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $userName, $userEmail, $userDistrict);

                // set parameters and execute
                $userName  = "tina";
                $userEmail = "tina@gmail.com";
                $userDistrict = "libia";
                $stmt->execute();

                $userName  = "mina";
                $userEmail = "mina@gmail.com";
                $userDistrict = "libia";
                $stmt->execute();
            }

            public function updateData($tableName, $dataField, $data, $id){
                $sql = "UPDATE $tableName SET $dataField='$data' WHERE id=$id";
                if ($this->db_connect->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $this->db_connect->error;
                }
            }

            public function selectDataAndPrint(){
                $sql = "SELECT id, username, useremail FROM RandomUser2 LIMIT 5 OFFSET 3";
                $result = $this->db_connect->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " - Email: " . $row["useremail"]. "<br>";
                    }
                }else{
                    echo "0 results";
                }
            }

            public function selectDataAndOrder(){
                $sql = "SELECT id, username, useremail FROM RandomUser2 ORDER BY id DESC";
                $result = $this->db_connect->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " - Email: " . $row["useremail"]. "<br>";
                    }
                }else{
                    echo "0 results";
                }
            }

            public function deleteData($tableName, $id){
                $sql = "DELETE FROM $tableName WHERE id=$id";
                if ($this->db_connect->query($sql) === TRUE) {
                    echo "Record deleted successfully </br>";
                } else {
                    echo "Error deleting record: " . $this->db_connect->error;
                }
            }

            public function createDatabase($db){ 
                $sql = "CREATE DATABASE $db";
                if($this->db_connect->query($sql)){
                    echo "database created successfully </br>";
                }else{
                    echo "error creating database. " . $this->db_connect->error . "</br>";
                }      
            }

            public function disconnect(){
                $this->db_connect->close();
                echo "db disconnected </br>";
            }
        }

        function handleFormPostRequest(){
            $userName = $userEmail = $userDistrict = "";
            if (empty($_POST["username"])) {
                echo "Name is required </br>";
            } else {
                $userName = test_input($_POST["username"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $userName)) {
                    echo "Only letters and white space allowed in name field </br>";
                }
            }
            if (empty($_POST["useremail"])) {
                echo "Email is required </br>";
            } else {
                $userEmail = test_input($_POST["useremail"]);
                // check if e-mail address is well-formed
                if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                    echo "Invalid email format </br>";
                }
            }
            if (empty($_POST["userdistrict"])) {
                echo "District is required </br>";
            } else {
                $userDistrict = test_input($_POST["userdistrict"]);
                // check if district only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $userDistrict)) {
                    echo "Only letters and white space allowed in district field </br>";
                }
            }

            echo "username: "   . $userName     . '</br>';
            echo "email: "      . $userEmail    . '</br>';
            echo "district: "   . $userDistrict . '</br>';

            // store data to database
            $dbObject = new Database('mydb');
            $dbObject->connect();
            // $dbObject->insertData('RandomUser2', $userName, $userEmail, $userDistrict);
            // $dbObject->updateData('RandomUser2', 'username', 'dhiman', 11);
            // $dbObject->selectDataAndPrint();
            // $dbObject->selectDataAndOrder();
            $dbObject->prepareAndBindTest();
            $dbObject->disconnect();

        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleFormPostRequest();
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


    ?>
</body>
</html>