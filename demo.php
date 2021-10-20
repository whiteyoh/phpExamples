<?php

if(isset($_GET['dbaseType']) && $_GET['dbaseType'] == "pdo"){
    include("dbasePDO.php");
    echo "PDO database included";
} elseif(isset($_GET['dbaseType']) && $_GET['dbaseType'] == "mysqli"){
    include("dbaseMySqlI.php");
    echo "mysqli database included";
} else {
    include("dbasePDO.php");
    echo "default PDO database included";
}

if (isset($_POST['method'])){
    $method = $_POST['method'];
    switch($method){
        case "newAuthor":
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        break;
    }
}
?>


<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="method" value="newAuthor"/>
<input type"text" name="name" placeholder="name"/>
<input name="email" type"email" placeholder="email"/>
<input type="submit"/>
</form>