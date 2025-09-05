<?php
require('dbconnect.php');

$id = $_POST['idemp'];
$sql = "DELETE FROM employee WHERE id = $id";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "Deleted Successful <br>";
    echo"<a href='index.php'>Return</a>";
} else {
    echo "Error!".mysqli_error($con);
}

?>