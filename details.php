
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Details</title>
    <style>
.button {
  background-color: #4CAF50;
  border: solid green 1px;
  border-radius: 5px;
  color: white;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:870px;
  cursor: pointer;

  
}
table {
            margin: 0 auto;
            font-size: large;
            border-collapse: collapse;
            width:90%;
        }
       
 
        th,
        td {
            font-weight: bold;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        tr:nth-child(even){background-color: #f2f2f2;}
        tr:first-child{ border-bottom: 3px solid #ddd;}


 
        td {
            font-weight: lighter;
        }
</style>
</head>
<body>
    <h1 style="display: inline-block; margin-left:63px">Users Details</h1>
    <a href="form.php" class="button">Add New User</a>
    <hr style="width:90%;">
    

</body>
</html>

<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'users';
   $link = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);


$sql = 'SELECT * FROM user';
$result = mysqli_query($link,$sql );
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_error($link));
   }


   if (mysqli_num_rows($result) > 0) {
  

      echo "<table >
      <tr>
      <th >#</th>
        <th >Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Mail Status</th>
    </tr>";

      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["user_name"]. "</td><td> " . $row["user_email"]. "</td><td>". $row["gender"]. "</td><td> " . $row["mail_status"]. "</td></tr>";
      }
      echo "</table>";

    } else {
      echo "0 results";
    }

mysqli_close($link);
?>
