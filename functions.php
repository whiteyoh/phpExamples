function connectToDatabase(){
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
    return $conn;
}

function insert($table,$object){
    //INSERT INTO authors (name, email) VALUES (?,?);
    //INSERT INTO address (line1, line2z,postcode,latlong) VALUES (?,?);
    
    $sql = "INSERT INTO " . $table . " (";
    $bind = " VALUES (";
    echo "i want to replicate INSERT INTO authors (name, email) VALUES (?,?)";
    $vals = array();
    
    foreach ($object as $key => $value) {
        $sql =  $sql . $key . ",";
        $bind = $bind . "?,";
        $vals[] = $value;
        echo "<br />";
        echo $sql;
        echo "<br />";
        echo $bind;
        echo "<br />";
        echo "<pre>";
        print_r($vals);
        echo "</pre>";
        echo "*************************************************";
    }
    echo "<br /> before sql " . $sql;
    $sql = substr_replace($sql,")",-1);
    echo "<br /> before sql " . $sql;
    $bind = substr_replace($bind,");",-1);
    $conn = connectToDatabase();
    echo "<br />FINAL SQL " . $sql.$bind;
    echo "<br />";
    print_r($vals);
    $conn->prepare($sql.$bind)->execute($vals); 
    return $conn->lastInsertId();
}

$conn = connectToDatabase();
