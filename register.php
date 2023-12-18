<?php

include("connect.php");

$name = $_POST['name'];
$voterid = $_POST['voterid'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$role = $_POST['role'];

if($password==$cpassword){

    $insert = mysqli_query($connect,"INSERT INTO user (name,voterid,address,password,role,status,votes) VALUES 
    ('$name','$voterid','$address','$password','$role',0,0)");
    if($insert){
        echo '
    <script>
        alert("Insert Successfull") ;
        window.location = "index.html";
    </script>';
    }
    else{
        echo '
        <script>
              alert("Some error occured!");
              window.location = "routes/register.html";
        </script>';
    }
}
else{
    echo '
    <script>
          alert("Password and Confirm password does not match!");
          window.location = "routes/register.html";
    </script>';
}
?>