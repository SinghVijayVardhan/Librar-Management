<?php
session_start();
      $server="localhost";
      $user="root";
      $pswrd="";
      $student="student";
      $conn=new mysqli($server,$user,$pswrd);
      if(isset($_POST['submitbook'])){
          $bkid=$_POST['submitbook'];
          $inc="SELECT Available FROM `library`.`books` WHERE `Book_id`=$bkid";
          $incr=$conn->query($inc);
          $num=$incr->fetch_array();
          $value=$num[0];
          $srn=$_SESSION['srn'];
          $row="SELECT `Sr_no` FROM `$student`.`borrow` WHERE `SRN`='$srn' AND `Book_id`='$bkid'";
          $vj=$conn->query($row);
          if($vj->num_rows>0){
              foreach($vj->fetch_assoc() as $k=>$v){
                  $sql="DELETE FROM $student.`borrow` WHERE `Sr_no`=$v";
                  $conn->query($sql);
                  $value++;
                  echo "<h4>BOOK SUBMITTED SUCCESSFULLY</h4>";
              }
          }
          unset($inc);
          $inc="UPDATE `library`.`books` SET `Available`=$value WHERE `Book_id`=$bkid";
          $conn->query($inc);
      }
      $conn->close();
      session_destroy();
      ?>