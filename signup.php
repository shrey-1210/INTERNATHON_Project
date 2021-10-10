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
    <link rel="stylesheet" href="hack_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div id="nav_bar">
        <div id="b1" class="b"><a href="index.php">HOME</a></div>
        <div id="b2" class="b"><a href="search.html">SEARCH</a></div>
        <div id="b3" class="b"><a href="create.html">CREATE</a></div>
        <div id="b5" class="b"> <a href="login.php"> LOGIN</a></div>
        <div id="b4" class="b"><a href="login.html">ABOUT</a></div>

    </div>
    <div id="signup">
        <h2 style="text-align: center;">Create Your Account</h2>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="text" placeholder="Enter Your Name" name="name">
            <input type="text" placeholder="Enter Your UserName" name="uname">
            <input type="password" placeholder="Enter Your Password" name="pwd">
            <input type="submit" name="submit">
        </form>
        <p style="padding-left: 30px;padding-top: 10px;">Already have an Account <a href="login.php" style="color: coral;cursor: pointer;padding-left: 5px;"> Login</a></p>
        <?php
        if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $password= md5($_POST['pwd']);
        $name= $_POST['name'];

        $sql = "SELECT * FROM user where uname='{$uname}';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            echo '<p class="warning">Username Already Exist</p>';
        }else{
            $sql1 = "INSERT into user VALUES ('{$name}', '{$uname}', '{$password}');";
            if(mysqli_query($conn,$sql1)){
                session_start();
                $_SESSION['username']=$uname;
                header("Location: {$hostname}/index.php");
            }else{
                echo '<h1>Query failed</h1>';
            }

        }
        }
?>
    </div>


</body>

</html>