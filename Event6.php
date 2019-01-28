<?php
    require "init.php";
    $invoice1 = $_POST['invoice1'];
    $invoice2 = $_POST['invoice2'];

    $res1 = mysqli_query($con, "select * from transactions where orderID='$invoice1'");
    $row1 = mysqli_fetch_assoc($res3);
    $status1 = $row1['status'];
    
    $res2 = mysqli_query($con, "select * from transactions where orderID='$invoice2'");
    $row2 = mysqli_fetch_assoc($res3);
    $status2 = $row2['status'];

    $check1 = "select groupid from event6 where member1=$invoice1";
    $res3 = mysqli_query($con, $check1);
    $row3 = mysqli_fetch_assoc($res1);
    $gp1 = $row3['groupid'];

    $check2 = "select groupid from event6 where member2=$invoice2";
    $res4 = mysqli_query($con, $check2);
    $row4 = mysqli_fetch_assoc($res2);
    $gp2 = $row4['groupid'];

    

    if($invoice1=="")
        header("location:IdeaPresentation.php?msg=Please%20enter%20order%20ID");
    else if($invoice1 == $invoice2)
        header("location:IdeaPresentation.php?msg=Same%20order%20ID's");
    else if($invoice2=="")
        {       
            if($status1!="TXN_SUCCESS")
                header("location:IdeaPresentation.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($invoice2!="")
        {       
            if($status1!="TXN_SUCCESS")
                header("location:IdeaPresentation.php?msg=Please%20check%20your%20payment%20status");
        }
    else if($gp1=="" && $gp2=="")
        {
            $sql = "INSERT INTO event6(member1, member2) VALUES('$invoice1', '$invoice2')";
            mysqli_query($con, $sql);
            header("location:IdeaPresentation.php?msg=Team%20formation%20Successful");
        }
    
     else
            header("location:IdeaPresentation.php?msg=Team%20or%20member%20already%20exists");
    
    
?>
