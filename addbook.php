<?php
if(isset($_POST['title'])){
    $servername="localhost";
    $username="root";
    $password="";
    $database="library";
    $tablename="books";
    $con=new mysqli($servername,$username,$password,$database);
    if($con->connect_error)
        die("NOT CONNECTED $con->connect->error");
    $id=$_POST['bkid'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $year=$_POST['pub_year'];
    $num=$_POST['quantity'];
    $sql="INSERT INTO `$tablename`(Book_id,Title,Author,Pub_year,Quantity,Available) VALUES ('$id','$title','$author','$year','$num','$num')";
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
    <h1>ADD BOOK</h1>
    <form method="POST" action="addbook.php">
        <input type="text" name="bkid" placeholder="BOOK ID" class="inputbox"><br>
        <input type="text" name="title" placeholder="BOOK TITLE" class="inputbox"><br>
        <input type="text" name="author" placeholder="AUTHOR NAME" class="inputbox"><br>
        <input type="number" name="pub_year" placeholder="PUBLICATION YEAR" class="inputbox"><br>
        <input type="number" name="quantity" placeholder="NUMBER OF BOOKS" class="inputbox"><br>
        <input type="submit" value="ADD" class="butt">
   </form>
</body>
</html>