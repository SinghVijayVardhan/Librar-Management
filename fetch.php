<?php
if(isset($_POST['srno'])){
    $servername="localhost";
    $username="root";
    $password="";
    $con=mysqli_connect($servername,$username,$password);
    if(!$con){
        die("Not Connected".$con_connect_error());
    }
    else{
        $sr=mysqli_query("SELECT srno","")
    }
}
?>