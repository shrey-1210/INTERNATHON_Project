<?php
include 'configure.php';
// session_start();
// if(isset($_SESSION['username'])){

// }else{
//     header("Location: {$hostname}/index.php");
// }
$tid=$_GET['tid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="timeline.css">
    <link rel="stylesheet" href="hack_style.css">
</head>

<body>
    <style>
        html {
            background: none;
        }
        
        .back-img img {
            width: 100vw;
            height: 100vh;
            filter: blur(5px) opacity(0.7);
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
    <div class="back-img">
        <img src="hack_image.jpg" alt="">
    </div>
    <div id="nav_bar">
        <div id="b1" class="b"><a href="index.php">HOME</a></div>
        <div id="b2" class="b"><a href="search.php">SEARCH</a></div>
        <div id="b3" class="b"><a href="#">CREATE</a></div>
        <div id="b5" class="b">  <?php 
if(isset($_SESSION['username'])){
    echo '<a href="logout.php">LOGOUT';
}else{
    echo '<a href="login.php">LOGIN';
}
        ?></a></div>
        <div id="b4" class="b"><a href="about.php">ABOUT</a></div>

    </div>


    <section id=timeline>
        <?php
            $sql="SELECT * FROM timeline where id='{$tid}'";
            $result = mysqli_query($conn,$sql) or die ('<h1> Timeline Not Available</h1>');
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
        ?>
        <h1><?php echo $row['tname'] ?></h1>
        <p class="leader">List of journeys.</p>
        <div class="demo-card-wrapper">
            <?php
                $sql1 = "SELECT * FROM addr_point where timeline_id='{$tid}' order by order_number;";
                $result1=mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result1)){
                    while($row=mysqli_fetch_assoc($result1)){
                        $addr_id=$tid."_".$row['order_number'];

            ?>
            <div class="demo-card demo-card--step<?php echo $row['order_number']  ?>">
                <div class="head">
                    <div class="number-box">
                        <span><?php echo $row['order_number']  ?></span>
                    </div>
                    <h2><a href="addr_point.php?tid=<?php echo $tid.'&addr_id='.$addr_id.'&counter='.$row['order_number'];  ?>"><?php echo $row['district']  ?>, <?php echo $row['state']  ?><span class="small"><?php echo $row['address']  ?></a></span>
                    </h2>
                </div>
                <div class="body">
                    <?php
                        $sql2="SELECT * FROM media where addr_id='$addr_id';";
                        $result2=mysqli_query($conn,$sql2);
                        if(mysqli_num_rows($result2)>0){
                            $row2=mysqli_fetch_assoc($result2)
                            ?>
                    <p><?php echo $row2['description']  ?></p>
                    <?php
                        $imgstr=$row2['image'];   //media images 
                        $images = explode("`",$imgstr);
                    ?>
                    <img src="<?php echo $images[0]; ?>" alt="Graphic">
                    <?php 
                }else{
                    echo '<p>No Description Available</p><img src="media/image.jpg" alt="Graphic">';
                }
                    ?>
                </div>
            </div>


            <?php 
                    }
                }
                ?>
        </div>
        <?php
            }
        ?>
    </section>
    <div style="margin-top: 50px;">yes</div>
</body>

</html>