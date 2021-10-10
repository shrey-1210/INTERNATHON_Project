<?php
include 'configure.php';
session_start();
if(isset($_SESSION['username'])){

}else{
    // header("Location: {$hostname}/index.php");
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
    <style>
        .point {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            width: 80%;
            box-shadow: 0 0 10px 5px rgb(206, 204, 204);
            margin: auto;
            border-radius: 5px;
            padding: 40px 10px 10px 10px;
            margin-top: 40px;
        }
        
        html {
            background: none;
        }
        
        .point .tophead {
            /* border: 1px solid red; */
            width: 90%;
            padding: 10px;
            border-bottom: 1.6px solid rgb(102, 101, 101);
            display: flex;
            justify-content: space-between;
        }
        
        .point .tophead>span {
            /* display: block; */
        }
        
        .point .tophead>span:nth-last-child(2) {
            font-size: 24px;
            color: rgb(250, 89, 31);
        }
        
        .point .tophead>span:nth-last-child(1) {
            font-size: 17px;
            color: red;
        }
        
        .point .tophead>span:nth-last-child(1) span {
            color: black;
            font-size: 20;
            font-weight: bold;
        }
        
        .point .media {
            display: flex;
            flex-direction: column;
        }
        
        .point .media .image {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .point .media .image img,
        .point .media .image video {
            width: 100%;
        }
        
        .point .media .image .img {
            width: 40%;
            margin: 10px;
        }
        
        .point .desc {
            width: 95%;
            margin: auto;
        }
        
        .point .desc p {
            padding: 10px;
            color: rgb(65, 64, 64);
        }
        
        .point .desc p:nth-child(1) {
            padding-bottom: 0;
            margin-bottom: 0;
            color: black;
            font-weight: bold;
            font-size: 18px;
        }
        
        .point .desc p:nth-child(2) {
            padding-top: 0;
        }
        
        .point .media p:nth-child(1) {
            padding-bottom: 0;
            margin-bottom: 0;
            color: black;
            font-weight: bold;
            font-size: 18px;
            padding-left: 30px;
            padding-bottom: 10px;
        }
        
        .point .map {
            width: 90%;
        }
    </style>

    <div class="point">
        <?php
            $tid=$_GET['tid'];
            $order=$_GET['counter'];
            $sql="SELECT * from addr_point where timeline_id='{$tid}' AND order_number='{$order}';";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);


?>
        <div class="tophead">
            <!-- <span>Address in words</span> -->
            <span><?php echo $row['address']; ?></span>
            <span>Checkpoint: <span><?php echo $order; ?></span> </span>
        </div>
        <?php 
        $addr_id=$_GET['addr_id'];
        $sql1="SELECT * from media where addr_id='{$addr_id}';";
        // echo $sql1;
        // die();
        $result1=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
            $row1=mysqli_fetch_assoc($result1);
            ?>
        <div class="desc">
            <p>Description About this Checkpoint</p>
            <p><?php echo $row1['description']; ?></p>
        </div>
        <div class="media">
            <p>Media of this Checkpoint</p>
            <div class="image">
                <?php
                
                        
                        $imgstr=$row1['image'];   //media images 
                            $images = explode("`",$imgstr);
                        echo '<div class="img"><img src="'.$images[0].'" alt=""></div>';


?>
                
            </div>
        </div>
        <?php 
        }else{
            echo '<div class="media"><div class="image"><div class="img"><img src="media/image.jpg" alt=""></div></div></div>';
        }
        ?>
        <!-- <div class="map">
            <iframe src="https://www.google.com/maps/place/27.939196+77.842445/@27.939196,77.842445,17z" frameborder="0" width="100%"></iframe>
        </div> -->


        <?php
            }
            ?>
    </div>
    <div class="back-img">
        <img src="hack_image.jpg" alt="">
    </div>
    <div style="margin-top: 50px;">
        yes
    </div>
</body>

</html>