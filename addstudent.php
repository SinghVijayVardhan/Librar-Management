<?php
if(isset($_POST['srn'])){
    $servername="localhost";
    $username="root";
    $password="";
    $database="student";
    $tablename="details";
    $con=new mysqli($servername,$username,$password,$database);
    if($con->connect_error)
        die("NOT CONNECTED $con->connect->error");
    $srn=$_POST['srn'];
    $name=$_POST['name'];
    $dept=$_POST['dept'];
    $sql="INSERT INTO `$tablename`(SRN,Student_Name,Dept) VALUES ('$srn','$name','$dept')";
    $con->query($sql);
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BOOKS</title>
    <link rel="stylesheet" href="adminstyle.css" type="text/css">
    <style>
        body{
        background-image:url(library_university.jpeg);
        background-repeat:no-repeat;
        background-size:cover;
        }
     </style>
</head>
<body>
    <h1>ADD STUDENTS</h1>
    <form method="POST" action="addstudent.php">
        <input type="text" name="srn" placeholder="ENTER SRN" class="inputbox"><br>
        <input type="text" name="name" placeholder="ENTER NAME" class="inputbox"><br>
        <input type="text" name="dept" placeholder="ENTER DEPARTMENT" class="inputbox"><br>
        <input type="submit" value="ADD" class="butt">
   </form>
</body>
</html>