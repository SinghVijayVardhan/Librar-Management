<?php
    session_start();
  if(isset($_POST['srn'])){
    $flag=0;
    $srn=$_POST['srn'];
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="student";
    $tablename="details";
    $borrowlist="borrow";
    $con=new mysqli($servername,$username,$password,$dbname);
    if($con->connect_error)
        die("Not Connected $con->connect_error");
    $sql="SELECT Student_Name FROM $tablename WHERE SRN='$srn'";
    $result=$con->query($sql);
    if(!$result)
        echo "NOT FETCHED ";
    else    
        $_SESSION['srn']=$srn;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <link  rel="stylesheet" href="studentstyle.css" type="text/css">
    <style>
        table{
            width:100%;
            margin-left:auto;
            margin-right:auto;
            text-align: center;
            border: 4px solid black;
            background-color: rgb(182, 188, 175);
            color: rgb(173, 132, 8);
        }
        td,th{
            border : 1px solid black;
        }
        .row{
            display:flex;
        }
        .row form{
            flex:100%;
        }
    </style>
</head>
<body>
    <?php if($result->num_rows>0){
        foreach($result->fetch_assoc() as $key=>$value){
        echo "<h1>$value</h1>";
     } 
    }else {echo "<h2>INVALID SRN</h2>";
        $flag=1;} ?>
<br><br>
<?php $borr="SELECT Book_id,Issue,DUE FROM $borrowlist WHERE SRN='$srn'";
       $book=$con->query($borr);
       ?>
    <table>
        <tr>
            <th>BOOK ID</th>
            <th>ISSUE DATE</th>
            <th>DUE DATE</th>
        </tr>
        <?php while($row=$book->fetch_assoc()){
             ?> <tr>
            <?php foreach($row as $key=>$value){?>
       
            <td><?php echo "$value"; ?></td>
       
        <?php } ?>
         </tr> 
    <?php } ?>
    </table>
<?php 
    if($flag==0){
        require "libraryop.php";
    }
    else
        session_destroy();
$con->close();?>
</body>
</html>