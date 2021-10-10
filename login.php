<?php 
include 'configure.php';
if(isset($_SESSION['username'])){
    header("Location: {$hostname}/index.php");
}

?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIMELINE_TRACKER</title>
    <link rel="stylesheet" href="hack_style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div id="nav_bar">
        <div id="b1" class="b"><a href="index.php">HOME</a></div>
        <div id="b2" class="b"><a href="search.html">SEARCH</a></div>
        <div id="b3" class="b"><a href="create.html">CREATE</a></div>
        <div id="b5" class="b"> <a href="login.php"><?php 
if(isset($_SESSION['username'])){
    echo 'LOGOUT';
}else{
    echo 'LOGIN';
}
        ?> </a></div>
        <div id="b4" class="b"><a href="login.html">ABOUT</a></div>

    </div>
    <div id="login">
        <h2 style="text-align: center;">Login</h2>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="text" placeholder="UserName" name="uname">
            <input type="password" placeholder="Password" name="pwd">
            <input type="submit" name="submit">
        </form>
        <p style="padding-left: 30px;padding-top: 10px;">Don't have an Account <a href="signup.php" style="color: coral;cursor: pointer;padding-left: 5px;"> Create One</a></p>
        <?php
        if(isset($_POST['submit'])){
$uname = $_POST['uname'];
$password= md5($_POST['pwd']);

$sql = "SELECT * FROM user where uname='{$uname}' AND password='{$password}';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    session_start();
    $_SESSION['username']=$uname;
    header("Location: {$hostname}/index.php");
}else{
    echo '<p class="warning">Username and Password Not matched</p>';
}
}
?>
    </div>
</body>

</html>