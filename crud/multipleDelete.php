<?php 
require('dbconnect.php');
$id_arr = $_POST['idcheck'];
if ($_POST == null) {
    header("location:index.php") ;
    exit(0);
}

$multiple_id = implode("," , $id_arr);

$sql = "DELETE FROM employee WHERE id IN ($multiple_id)";
$result = mysqli_query($con , $sql);

if ($result) {
    header("location:index.php") ;
    exit(0);
} else {
    echo "Error! <br>";
    echo "<a href='index.php'> Return </a>";
}

?>