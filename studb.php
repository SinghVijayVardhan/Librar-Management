<?php
    if(isset($_POST['studbname'])){
        $servername="localhost";
        $username="root";
        $password="";
        $db=$_POST['studbname'];
        $tb=$_POST['stutable'];
        $con= new mysqli($servername,$username,$password);
        $sql="CREATE DATABASE $db";
        if($con->query($sql)===TRUE){
            echo "Student DataBase Created !!";
        }
        else
            echo "Error creating database $con->error";
        $tsql="CREATE TABLE $db.$tb(
            SRN VARCHAR(13) PRIMARY KEY ,
            Student_Name TEXT(30) NOT NULL,
            Dept VARCHAR(10) NOT NULL
        )";
        if($con->query($tsql))
            echo "Student Table Created";
        else
            echo "Table Not Cretaed $con->error";
        $nsql="CREATE TABLE $db.borrow(
            Sr_no INT(4) PRIMARY KEY AUTO_INCREMENT,
            SRN VARCHAR(13),
            FOREIGN KEY (SRN) REFERENCES $db.$tb(SRN),
            Book_id INT(6),
            FOREIGN KEY (Book_id) REFERENCES library.books(Book_id),
            Issue TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            DUE DATE 
        )";
        if($con->query($nsql)===TRUE)
            echo "Borrow Table Created";
        else
            echo "Borrow Table not created $con->error";
        $con->close();
    }
?>
 