
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrtion Form</title>
    <style>
        input[type=text]{
            width: 96%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius:5px;
            
            }
            .in{
                display:block;
            }
            input[type=submit]{
                background-color: #1f65e4;
                border: solid blue 1px;
                border-radius: 5px;
                color: white;
                padding: 10px 20px;
                font-size: 14px;
            }
            input[type=reset]{
                border: solid black 1px;
                border-radius: 5px;
                padding: 10px 20px;
                font-size: 14px;
            }
    </style>
</head>
<body>
    <div style="margin-left:63px;margin-right:63px">
    <h1 style="display: inline-block; ">User Registrtion Form</h1>
    
    <hr>
    <p>Please fill this form and submit to add user record to the database.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="POST">
    <b class="in" >Name</b>
    <input type="text" name="name" required>
    <b class="in">Email</b>
    <input type="text" name="email" required>
    <b class="in">Gender</b>
    <div class="in"><input type="radio" name="gender" value="Female" required><b>Female</b></div>
    <input type="radio" name="gender" value="Male"><b>Male</b><br><br>
    <input type="checkbox" name="status" ><b>Receive E-mails from us.</b><br><br>
    <input type="submit"name="submit" value="Submit">
    <input type="reset" value="Cancel">
        </form>
</div>
</body>
</html>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'users';
$link = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
if($link->connect_error){
    die("Connection failed:" . $link->connect_error);
   }
if(isset($_POST['submit'])){
if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['gender'])){
$uname=$_POST['name'];
$uemail =  $_POST['email'];
$ugender = $_POST['gender'];
$ustatus = isset($_POST['status']) ? 'Yes' : 'No';
$sql = "INSERT INTO user(user_name,user_email, gender, mail_status) 
VALUES ( '$uname', '$uemail', '$ugender','$ustatus')";

if($link->query($sql) === TRUE){
    // echo "Record Added Sucessfully";
   }
   else
   {
    echo "Error" . $sql . "<br/>" . $link->error;
   }

}
header('location: details.php');
}
unset($_POST);
mysqli_close($link);
?>