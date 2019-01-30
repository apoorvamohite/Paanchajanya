<?php
    require "init.php";
    $invoice1 = $_POST['invoice1'];
    $invoice2 = $_POST['invoice2'];

    $res1 = mysqli_query($con, "select * from transactions where orderID='$invoice1'");
    $row1 = mysqli_fetch_assoc($res1);
    $status1 = $row1['status'];
    
    $res2 = mysqli_query($con, "select * from transactions where orderID='$invoice2'");
    $row2 = mysqli_fetch_assoc($res2);
    $status2 = $row2['status'];

    $check1 = "select groupid from event2 where member1='$invoice1' or member2='$invoice1'";
    $res1a = mysqli_query($con, $check1);
    $row1a = mysqli_fetch_assoc($res1a);
    $gp1 = $row1a['groupid'];

    $check2 = "select groupid from event2 where member1='$invoice2' or member2='$invoice2'";
    $res2a = mysqli_query($con, $check2);
    $row2a = mysqli_fetch_assoc($res2a);
    $gp2 = $row2a['groupid'];

    

    if($invoice1=="" || $invoice2=="")
        header("location:LaserMazer.php?msg=Enter%20both%20order%20ID");
    else if($invoice1 == $invoice2)
        header("location:LaserMazer.php?msg=Same%20invoice%20number");
    else if($status1!="TXN_SUCCESS" && $status!="TXN_SUCCESS")
            header("location:LaserMazer.php?msg=Please%20check%20your%20pyment%20status");
    else if($gp1=="" && $gp2=="")
        {
            $sql = "INSERT INTO event2(member1, member2) VALUES('$invoice1', '$invoice2')";
            mysqli_query($con, $sql);
            header("location:LaserMazer.php?msg=Team%20formation%20Successful");
        }
    
     else
            header("location:LaserMazer.php?msg=Team%20already%20exists");
    
    
?>