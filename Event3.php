<?php
    require "init.php";
    $invoice1 = $_POST['invoice1'];
    
    $res1 = mysqli_query($con, "select * from transactions where orderID='$invoice1'");
    $row1 = mysqli_fetch_assoc($res1);
    $status1 = $row1['status'];
    
    /*$res4 = mysqli_query($con, "select * from transactions where orderID='$invoice2'");
    $row4 = mysqli_fetch_assoc($res3);
    $status2 = $row4['status'];*/

    $check1 = "select memberid from event3 where invoice1=$invoice1";
    $res2 = mysqli_query($con, $check1);
    $row2 = mysqli_fetch_assoc($res1);
    $gp1 = $row2['groupid'];


    if($invoice1=="")
        header("location:BlindCoding.php?msg=Enter%20order%20ID");
    else if($status1!="TXN_SUCCESS")
            header("location:BlindCoding.php?msg=Please%20check%20your%20payment%20status");
    else if($gp1=="")
        {
            $sql = "INSERT INTO event3(member1) VALUES('$invoice1')";
            mysqli_query($con, $sql);
            header("location:BlindCoding.php?msg=Event%20registraion%20Successful");
        }
    
     else
            header("location:BlindCoding.php?msg=already%20registered");
    
    
?>
