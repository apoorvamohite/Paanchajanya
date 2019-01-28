<?php
    require "init.php";
    $invoice1 = $_POST['invoice1'];
    $invoice2 = $_POST['invoice2'];
    $invoice3 = $_POST['invoice3'];
    $invoice4 = $_POST['invoice4'];
    $invoice5 = $_POST['invoice5'];
    $invoice6 = $_POST['invoice6'];

    //Retrieving transaction status.

    $res1 = mysqli_query($con, "select * from transactions where orderID='$invoice1'");
    $row1 = mysqli_fetch_assoc($res1);
    $status1 = $row1['status'];
    
    $res2 = mysqli_query($con, "select * from transactions where orderID='$invoice2'");
    $row2 = mysqli_fetch_assoc($res2);
    $status2 = $row2['status'];

    $res3 = mysqli_query($con, "select * from transactions where orderID='$invoice3'");
    $row3 = mysqli_fetch_assoc($res3);
    $status3 = $row3['status'];

    $res4 = mysqli_query($con, "select * from transactions where orderID='$invoice4'");
    $row4 = mysqli_fetch_assoc($res4);
    $status4 = $row4['status'];

    $res5 = mysqli_query($con, "select * from transactions where orderID='$invoice5'");
    $row5 = mysqli_fetch_assoc($res5);
    $status5 = $row5['status'];
        
    $res6 = mysqli_query($con, "select * from transactions where orderID='$invoice6'");
    $row6 = mysqli_fetch_assoc($res6);
    $status6 = $row6['status'];

    //Checking whether team or team member already exists.

    $check1 = "select groupid from event5 where member1=$invoice1";
    $result1 = mysqli_query($con, $check1);
    $row1a = mysqli_fetch_assoc($result1);
    $gp1 = $row1a['groupid'];

    $check2 = "select groupid from event5 where member2=$invoice2";
    $result2 = mysqli_query($con, $check2);
    $row2a = mysqli_fetch_assoc($result2);
    $gp2 = $row2a['groupid'];

    $check3 = "select groupid from event5 where member2=$invoice3";
    $result3 = mysqli_query($con, $check3);
    $row3a = mysqli_fetch_assoc($result3);
    $gp3 = $row3a['groupid'];

    $check4 = "select groupid from event5 where member1=$invoice4";
    $result4 = mysqli_query($con, $check4);
    $row4a = mysqli_fetch_assoc($result4);
    $gp4 = $row1a['groupid'];

    $check5 = "select groupid from event5 where member1=$invoice5";
    $result5 = mysqli_query($con, $check5);
    $row5a = mysqli_fetch_assoc($result5);
    $gp5 = $row5a['groupid'];

    $check6 = "select groupid from event5 where member1=$invoice6";
    $result6 = mysqli_query($con, $check6);
    $row6a = mysqli_fetch_assoc($result6);
    $gp6 = $row6a['groupid'];

   if($invoice1=="" || $invoice2=="" || $invoice3=="" || $invoice4=="")
        header("location:TreasureHunt.php?msg=Enter%20minimum%20four%20order%20ID's");

    else if($invoice1 == $invoice2 || $invoice1 == $invoice3 || $invoice1 == $invoice4 || $invoice1 == $invoice5 || $invoice1 == $invoice6)
        header("location:TreasureHunt.php?msg=Please%20enter%20distinct%20number");
    else if($invoice2 == $invoice3 || $invoice2 == $invoice4 || $invoice2 == $invoice5 || $invoice2 == $invoice6)
        header("location:TreasureHunt.php?msg=Please%20enter%20distinct%20number");
    else if($invoice3 == $invoice4 || $invoice3 == $invoice5 || $invoice3 == $invoice6)
        header("location:TreasureHunt.php?msg=Please%20enter%20distinct%20number");
    else if($invoice4 == $invoice5 || $invoice4 == $invoice6)
        header("location:TreasureHunt.php?msg=Please%20enter%20distinct%20number");
    else if($invoice5 == $invoice6)
        header("location:TreasureHunt.php?msg=Please%20enter%20distinct%20number");

    else if($invoice5=="" && $invoioce6=="")
        {
            if($status1!="TXN_SUCCESS" && $status2!="TXN_SUCCESS" && $status3!="TXN_SUCCESS" && $status4!="TXN_SUCCESS")
                header("location:TreasureHunt.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($invoice5!="")
        {
            if($status1!="TXN_SUCCESS" && $status2!="TXN_SUCCESS" && $status3!="TXN_SUCCESS" && $status4!="TXN_SUCCESS" && $status5!="TXN_SUCCESS")
                header("location:TreasureHunt.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($invoice6!="")
        {
            if($status1!="TXN_SUCCESS" && $status2!="TXN_SUCCESS" && $status3!="TXN_SUCCESS" && $status4!="TXN_SUCCESS" && $status5!="TXN_SUCCESS" && $status6!="TXN_SUCCESS")
                header("location:TreasureHunt.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($gp1=="" && $gp2=="" && $gp3=="" && $gp4=="" && $gp5=="" && $gp6=="")
        {
            $sql = "INSERT INTO event4(member1, member2, member3, member4, member5, member6) VALUES('$invoice1', '$invoice2', '$invoice3', '$invoice4', '$invoice5', '$invoice6')";
            mysqli_query($con, $sql);
            header("location:TreasureHunt.php?msg=Team%20formation%20Successful");
        }
    
     else
            header("location:TreasureHunt.php?msg=Team%20already%20exists");
    
    
?>
