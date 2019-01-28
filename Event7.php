<?php
    require "init.php";
    $invoice1 = $_POST['invoice1'];
    $invoice2 = $_POST['invoice2'];
	$invoice3 = $_POST['invoice3'];
	$invoice4 = $_POST['invoice4'];

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
    $status2 = $row4['status'];

    $check1 = "select groupid from event7 where member1=$invoice1";
    $res5 = mysqli_query($con, $check1);
    $row1 = mysqli_fetch_assoc($res1);
    $gp1 = $row1['groupid'];

    $check2 = "select groupid from event7 where member2=$invoice2";
    $res6 = mysqli_query($con, $check2);
    $row6 = mysqli_fetch_assoc($res6);
    $gp2 = $row6['groupid'];
	
	$check3 = "select groupid from event7 where member3=$invoice3";
    $res7 = mysqli_query($con, $check3);
    $row7 = mysqli_fetch_assoc($res7);
    $gp3 = $row7['groupid'];
	
	$check4 = "select groupid from event7 where member4=$invoice4";
    $res8 = mysqli_query($con, $check4);
    $row8 = mysqli_fetch_assoc($res8);
    $gp4 = $row8['groupid'];

    
		
	if($invoice1 == $invoice2 || $invoice1 == $invoice3 || $invoice1 == $invoice4)
        header("location:ProjectExpo.php?msg=Please%20enter%20distinct%20number");
    else if($invoice2 == $invoice3 || $invoice2 == $invoice4)
        header("location:ProjectExpo.php?msg=Please%20enter%20distinct%20number");
    else if($invoice3 == $invoice4)
        header("location:ProjectExpo.php?msg=Please%20enter%20distinct%20number");
    else if($invoice2=="" && $invoioce3==""  && $invoice4=="")
        {
            if($status1!="TXN_SUCCESS")
                header("location:ProjectExpo.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($invoice2!="")
        {
            if($status1!="TXN_SUCCESS" && $status2!="TXN_SUCCESS")
                header("location:ProjectExpo.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($invoice3!="")
        {
            if($status1!="TXN_SUCCESS" && $status2!="TXN_SUCCESS" && $status3!="TXN_SUCCESS")
                header("location:ProjectExpo.php?msg=Please%20check%20your%20payment%20status");
        }
	else if($invoice4!="")
        {
            if($status1!="TXN_SUCCESS" && $status2!="TXN_SUCCESS" && $status3!="TXN_SUCCESS" && $status4!="TXN_SUCCESS")
                header("location:ProjectExpo.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($gp1=="" && $gp2=="" && $gp3=="" && $gp4=="")
        {
            $sql = "INSERT INTO event7(member1, member2, member3, member4) VALUES('$invoice1', '$invoice2', '$invoice3', '$invoice4')";
            mysqli_query($con, $sql);
            header("location:ProjectExpo.php?msg=Team%20formation%20Successful");
        }
    
     else
            header("location:ProjectExpo.php?msg=Team%20already%20exists");
    
    
?>