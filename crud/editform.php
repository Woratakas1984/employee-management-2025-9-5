<?php

    require('dbconnect.php');
    $id = $_GET["idemp"];
    $sql = "SELECT * FROM employee WHERE id = $id";
    $result = mysqli_query($con , $sql);

    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Edit Form</h1>
        <form action="Update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
            <div class="form-group my-3">
                <label for="firstname"class="fs-4">Name</label>
                <input type="text" name="fname" class="form-control"value="<?php echo $row["fname"];?>">
            </div>
            <div class="form-group my-3">
                <label for="lastname"class="fs-4">Surname</label>
                <input type="text" name="lname" class="form-control"value="<?php echo $row["lname"];?>">
            </div>
            <div class="form-group my-3">
                <label for="department"class="fs-4">Department</label>
                <input type="text" name="department" class="form-control"value="<?php echo $row["department"];?>">
            </div>
            <div class="form-group my-3">
                <label for="salary"class="fs-4">Monthly Income</label>
                <input type="number" name="salary" class="form-control"value="<?php echo $row["salary"];?>">
            </div>
            <div class="text-center">
                <input type="submit" value="Update Data" class="mt-3 btn btn-success">
                <input type="reset" value="Reset" class="mt-3 btn btn-danger">
                <a href="index.php" class="mt-3 btn btn-primary">Return</a>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>