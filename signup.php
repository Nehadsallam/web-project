<?php
$pswrepeat=$_REQUEST['psw-repeat'];
$password=$_REQUEST['psw'];
$email=$_REQUEST['email'];

if(isset($_POST['signupbtn']))
{
    $host="localhost";
    $user="root";
    $password="";
    $db="user_info";

    $con = mysqli_connect($host,$user,$password,$db);
    $query = "SELECT * FROM information2 WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        
        echo"<script>alert('email already exists. Please choose another email.')</script>";}
        else{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert="insert into information2 (psw-repeat,password,email) values('$hashedPassword','$hashedPassword' ,'$email')";
    mysqli_query($con,$insert);
    if($con){
        echo"<script>alert('Welcome to Stay Advisor')</script>";
    }
    else{
       echo"<script>alert('try again')</script>";
    }
    
}
}


?>