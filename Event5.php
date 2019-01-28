<?php
    require "init.php";
    $invoice1 = $_POST['invoice1'];
    $invoice2 = $_POST['invoice2'];

    $res3 = mysqli_query($con, "select * from transactions where orderID='$invoice1'");
    $row3 = mysqli_fetch_assoc($res3);
    $status1 = $row3['status'];
    
    $res4 = mysqli_query($con, "select * from transactions where orderID='$invoice2'");
    $row4 = mysqli_fetch_assoc($res3);
    $status2 = $row4['status'];

    $check1 = "select groupid from event5 where member1=$invoice1";
    $res1 = mysqli_query($con, $check1);
    $row1 = mysqli_fetch_assoc($res1);
    $gp1 = $row1['groupid'];

    $check2 = "select groupid from event5 where member2=$invoice2";
    $res2 = mysqli_query($con, $check2);
    $row2 = mysqli_fetch_assoc($res2);
    $gp2 = $row2['groupid'];

    

    if($invoice1=="" || $invoice2=="")
        header("location:LaserMazer.php?msg=Enter%20both%20order%20ID");
    else if($invoice1 == $invoice2)
        header("location:LaserMazer.php?msg=Same%20invoice%20number");
    else if($status1!="TXN_SUCCESS" && $status!="TXN_SUCCESS")
            header("location:LaserMazer.php?msg=Please%20check%20your%20pyment%20status");
    else if($gp1=="" && $gp2=="")
        {
            $sql = "INSERT INTO event5(member1, member2) VALUES('$invoice1', '$invoice2')";
            mysqli_query($con, $sql);
            header("location:LaserMazer.php?msg=Team%20formation%20Successful");
        }
    
     else
            header("location:LaserMazer.php?msg=Team%20already%20exists");
    
    
?>