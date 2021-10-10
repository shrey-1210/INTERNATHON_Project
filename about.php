<?php 
include 'configure.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT US</title>
    <link rel="stylesheet" href="hack_style.css">
</head>

<body>
    <div id="nav_bar">
        <div id="b1" class="b"><a href="index.php">HOME</a></div>
        <div id="b2" class="b"><a href="search.php">SEARCH</a></div>
        <div id="b3" class="b"><a href="#">CREATE</a></div>
        <div id="b5" class="b">
            <?php 
if(isset($_SESSION['username'])){
    echo '<a href="logout.php">LOGOUT';
}else{
    echo '<a href="login.php">LOGIN';
}
        ?></a>
        </div>
        <div id="b4" class="b"><a href="about.php">ABOUT</a></div>

    </div>
    <div style="color: rgb(204, 171, 26); font-size:40px;text-align:center;"><b>TRAVEL BUD</b></div>
    <p style="font-size: 30px ; color:rgb(128, 27, 77)"> Travel Bud is a easy to website which makes travelling easier. We beleive nothing should come between your happiness. This website enables users to get information about various places such as location, images , videos. Users can post their journey
        timeline and even see journey timeline posted by other users.

    </p>
    <div style="color: rgb(248, 144, 8); font-size:40px;text-align:center;">CREATORS</div>
    <p style="font-size: 30px ; color:rgb(128, 27, 77)">
        </pstyle>This website is created by the joint efforts of: <br> 1.Vishal Singh<br> 2.Shrey Kumar Prajapati
    </p>
</body>

</html>