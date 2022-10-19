<?php
    $server="localhost";
    $user="root";
    $pswrd="";
    $conn=new mysqli($server,$user,$pswrd);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY OP</title>
    <link rel="stylesheet" href="adminstyle.css" type="text/css">
    <style>
        .butt{
            background-color: coral;
            border:3px solid blueviolet;
            height:30px;
            width:80px;
            border-radius: 4px;
            }
        .inputbox{
            width:300px;
            height:30px;
            text-align: center;
            }
    </style>
</head>
<body>
<br /><br />
    <div class="row">
    <form method="POST" action="bookissue.php">
        <input type="textbox" name="due" style="visibility:hidden;" id="due">
        <input type="number" name="issuebook" placeholder="ENTER BOOK ID FOR ISSUE" class="inputbox"><br /><br />
        <input type="submit" value="SUBMIT" class="butt">
    </form>
    <form method="POST" action="booksubmit.php">
        <input type="number" name="submitbook" placeholder="ENTER BOOK ID FOR SUBMIT" class="inputbox"><br /><br />
        <input type="submit" value="SUBMIT" class="butt">
    </form>
    </div>
    <script>
            var date=new Date();
            var box=document.getElementById('due');
            var dd=date.getDate()+3;
            var mm=date.getMonth();
            var yy=date.getFullYear();
            box.value=yy+"-"+mm+"-"+dd;
    </script>
    <h2>BOOKS AVAILABLE</h2>
    <?php 
    $libdb="library";
    $info="SELECT * FROM $libdb.books";
    $bookli=$conn->query($info);
    ?>
    <table>
        <tr>
            <th>BOOK ID</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>PUBLICATION YEAR</th>
            <th>QUANTITY</th>
            <th>AVAILABLE</th>
        </tr>
        <?php if($bookli->num_rows>0){
            while($row=$bookli->fetch_assoc()) {?>
            <tr>
                <?php foreach($row as $key=>$value) {?>
                    <td> <?php echo "$value"; }?> </td>
        </tr>
        <?php }
         }
        $conn->close();
        ?>
    </table>
</body>
</html>