<?php
require('dbconnect.php');
$sql = "SELECT * FROM employee ORDER BY fname ASC";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
$order = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Playpen+Sans+Thai:wght@100..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Krub', sans-serif;
        } 
    </style>
</head>
<body>
    <div class="container mt-4 text-center ">
        <h2 class="mb-4">All Employees</h2>
        <hr>
        <?php if ($count > 0 ) {?>
        <form action="searchData.php" method="post">
            <label for="" class="fs-4">Found Employee</label>
            <input type="text" name = "empname" class="form-control " placeholder="Search Name">
            <input type="submit" value="Search" class = "my-3 btn btn-primary">
        </form>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>List</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Department</th>
                    <th>Monthly Income</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Multi-Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_object($result)) { ?>
                    <tr>
                        <td><?php echo $order++;?></td>
                        <td><?php echo $row->fname;?></td>
                        <td><?php echo $row->lname;?></td>
                        <td><?php echo $row->department;?></td>
                        <td><?php echo $row->salary;?></td>
                        <td>
                            <a href="editform.php?idemp=<?php echo $row -> id;?>" 
                            class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="deleteQueryString.php?idemp=<?php echo $row -> id;?>" 
                            class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                        <form action="multipleDelete.php" method="POST">
                            <td>
                                <input type="checkbox" name="idcheck[]" 
                                class="form-check-input"value="<?php echo $row -> id?>">
                            </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <div class="alert alert-danger">
                <b> No Employee Data </b>
            </div>
        <?php } ?>
        <a href="insertForm.php" class="btn btn-primary">Add Data</a>
        <?php if ($count > 0 ) {?>
            <input type="submit" value="Multi-Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">
        <?php }?>
        </form>
            <?php if ($count > 0 ) {?>
            <button class="btn btn-success" onclick="checkAll()">Select All</button>
            <button class="btn btn-warning" onclick="uncheckAll()">Cancel</button>
        <?php }?>
    </div>
<script>
    function checkAll() {
        var form_ele = document.forms[1].length;
        //console.log(form_ele);
        for( i = 0 ; i < form_ele - 1 ; i++) {
            document.forms[1].elements[i].checked = true;
        }
    }    
    function uncheckAll() {
                var form_ele = document.forms[1].length;
        //console.log(form_ele);
        for( i = 0 ; i < form_ele - 1 ; i++) {
            document.forms[1].elements[i].checked = false;
        }
    }
    
</script>
    





 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>