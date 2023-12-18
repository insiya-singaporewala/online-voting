<?php

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
include("connect.php");

$voterid = $_POST['voterid'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql =  "SELECT * FROM user WHERE voterid='$voterid' 
AND password='$password' AND role='$role'";
$result = mysqli_query($connect,$sql);

if($result){
$num =mysqli_num_rows($result);
if($num>0){

  $userdata = mysqli_fetch_array($result);
  $groups = mysqli_query($connect,"SELECT * FROM user WHERE role=2");
  $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

  $_SESSION['userdata']= $userdata;
  $_SESSION['groupsdata']= $groupsdata;


  echo 'successfully logged in ';
  header('location:dashboard.php');
}

else{
    echo  'invalid login credentials';
}
}
}
?>