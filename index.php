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
        <div id="b5" class="b">  <?php 
if(isset($_SESSION['username'])){
    echo '<a href="logout.php">LOGOUT';
}else{
    echo '<a href="login.php">LOGIN';
}
        ?></a></div>
        <div id="b4" class="b"><a href="login.html">ABOUT</a></div>

    </div>
    <div class="heading" style="text-transform:capitalize;">
        Name of the project
    </div>
    <div id="menu">
        <div onclick="showcreate()">CREATE TIMELINE</div>
        <div>SEARCH TIMELINE</div>
    </div>
    <style>
        #cross {
            position: relative;
            top: -7px;
            left: 50%;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            cursor: pointer;
            transition: all 0.1s;
        }
        
        #cross:hover {
            transform: scale(1.15);
        }
    </style>
    <div id="create">
        <form action="">
            <div id="cross" onclick="closecreate()">X</div>
            <h2 style="text-align: center;padding-top: 13px;">Create Your Timeline</h2>
            <input type="text" placeholder="Enter Your Timeline Name">
            <input type="submit">
        </form>
    </div>
    <script>
        let cross = document.getElementById("cross");
        let create = document.getElementById("create")

        function showcreate() {
            create.style.display = "block";
        }

        function closecreate() {
            console.log("cross")
            create.style.display = "none";
        }
    </script>
</body>

</html>