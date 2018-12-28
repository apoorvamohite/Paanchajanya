<?php
require "../init.php";

session_start();

$old = $_POST['old'];
$new = $_POST['new'];
$rep = $_POST['rep'];

$sql = "SELECT password FROM changepass";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
$passdb = $row['password'];

if($old==$passdb)
{
    if($new==$rep)
    {
        $sql1 = "UPDATE changepass SET password='$new'";
        $res1 = mysqli_query($con, $sql1);
        header("location:changepass.php?msg=Password%20changed%20successfully");
    }
    else header("location:changepass.php?msg=New%20and%20repeat%20does%20not%20match");
}
else
    echo header("location:changepass.php?msg=Old%20password%20is%20wrong");
?>