<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    require "init.php";
    $sql = "Select * from event1 order by groupid";
    $res = mysqli_query($con, $sql);
?>
<div class="container">
  <h3>Event1 : </h3>
                                                                                          
  <div class="table-responsive">          
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Group ID</th>
        <th>Member1</th>
        <th>Member2</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($row=mysqli_fetch_assoc($res)){
				echo "<tr>";
				echo "<td>".$row['groupid']."</td>";
				echo "<td>".$row['member1']."</td>";
				echo "<td>".$row['member2']."</td>";
				echo "</tr>";
        }
        ?>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
