<?php

session_start();
if(!isset($_SESSION['userdata'])){
    header("location:../");
}

$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status='<b style="color:red">Not Voted </b>';
}
else{ 
    $status='<b style="color:green">Voted </b>';
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System-Dashboard</title>
    <link  rel="stylesheet" href="style.css">
</head>
<body>

<style>
    #backbtn{
        padding: 10px;
font-size: 15px;
background-color: #d4897c ;
color: white;
border-radius: 10px;
float:left; 
}

    #logbtn{
        padding: 10px;
font-size: 15px;
background-color: #d4897c ;
color: white;
border-radius: 10px;
float: right;
    }

  #profile{
    background-color :white;
    width:30%;
    padding:20px;
    float:left;
  }  

#group{
    background-color :white;
    width:60%;
    padding:20px;
    float:right;
    text-align: left;
}

#votebtn{
    padding: 10px;
font-size: 15px;
background-color: #d4897c ;
color: white;
border-radius: 10px;
float:left; 
}

#mainpanel{
padding:10px;
}

#headersec{

}

</style>

<div id="mainsec">
    <center>
    <div id="headersec">
    <a href=".../"><button id="backbtn">Back</button></a>
    <a href="logout.php"><button id="logbtn">Logout</button></a>
    <br><br>
    <h1>Online Voting System</h1>
</div>
</center>
    <hr>

    <div id="mainpanel">
    <div id="profile">
        <b>Name:</b> <?php echo $userdata['name']?> <br><br>
        <b>voterid:</b> <?php echo $userdata['voterid'] ?><br><br>
        <b>Adress:</b> <?php echo $userdata['address'] ?><br><br>
        <b>Status:</b> <?php echo $status ?><br><br>
</div>

<div id="group">
<?php 
   if($_SESSION['groupsdata']){
     for($i=0; $i<count($groupsdata); $i++){
           ?>
           <div>
            <b>Group Name: </b> <?php echo $groupsdata[$i]['name']?><br><br>
            
        <form action="vote.php" method="POST">
                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                <input type="submit" name="votebtn" value="vote" id="votebtn">
        </form>
           </div>       
           <hr>
           <?php
     }
   }
   else{
   }
?>
</div>

</div>
    


  
</body>
</html>