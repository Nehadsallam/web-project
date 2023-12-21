<?php
$username=$_REQUEST['username'];
$password=$_REQUEST['psw'];
$email=$_REQUEST['email'];

if(isset($_POST['btnlogin']))
{
    $host="localhost";
    $user="root";
    $password="";
    $db="user_info";

    $conn = mysqli_connect($host,$user,$password,$db);
    $query = "SELECT * FROM information WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        
        echo"<script>alert('Username already exists. Please choose another username.')</script>";}
        else{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert="insert into information (username,password,email) values('$username','$hashedPassword' ,'$email')";
    mysqli_query($conn,$insert);
    if($conn){
        echo"<script>alert('Welcome to Stay Advisor')</script>";
    }
    else{
       echo"<script>alert('try again')</script>";
    }
    
}
}


?>





