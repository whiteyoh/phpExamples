<?php

$table = "something";
try {
     $db = new PDO("mysql:dbname=mydb;host=localhost", "root", "" );
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
     $sql ="CREATE table $table(
     ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
     Prename VARCHAR( 50 ) NOT NULL, 
     Name VARCHAR( 250 ) NOT NULL,
     StreetA VARCHAR( 150 ) NOT NULL, 
     StreetB VARCHAR( 150 ) NOT NULL, 
     StreetC VARCHAR( 150 ) NOT NULL, 
     County VARCHAR( 100 ) NOT NULL,
     Postcode VARCHAR( 50 ) NOT NULL,
     Country VARCHAR( 50 ) NOT NULL);" ;
     $db->exec($sql);
     print("Created $table Table.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "INSERT INTO authors (name, email) VALUES (?,?)";
$conn->prepare($sql)->execute(["paul", "email@email.com"]);

$lastId = $conn->lastInsertId();
$sql = "UPDATE authors SET name=?, email=? WHERE id=?";
$conn->prepare($sql)->execute(["paul Changed", "paul@paul.com", $lastId]);

$stmt = $conn->query("SELECT * FROM authors");
while ($row = $stmt->fetch()) {
    echo $row['name']."<br />\n";
}
?>
