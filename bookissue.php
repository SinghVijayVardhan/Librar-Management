<?php
    session_start();
      $server="localhost";
      $user="root";
      $pswrd="";
      $student="student";
      $conn=new mysqli($server,$user,$pswrd);
    if(isset($_POST['issuebook'])){
        $due=$_POST['due'];
        $srn=$_SESSION['srn'];
        $bkk=$_POST['issuebook'];
        $re="SELECT Available FROM `library`.`books` WHERE `Book_id`=$bkk";
        $ret=$conn->query($re);
        $num=$ret->fetch_array();
        $brr="INSERT INTO $student.`borrow`(`SRN`,`Book_id`,`DUE`)VALUES('$srn','$bkk','$due')";
        if($num[0]==0)
            die("NOT AVAILABLE");
        if($conn->query($brr)){
            echo "Inserted ";
            $new=$num[0]-1;
            $qu="UPDATE `library`.`books` SET Available=$new WHERE `Book_id`=$bkk";
            $conn->query($qu);
        }
        else
            echo "$conn->error";
       }
       $conn->close();
    session_destroy();
?>