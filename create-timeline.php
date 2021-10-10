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
        <h1>TRAVEL TIMELINE</h1>
        <p class="leader">List of journeys.</p>
        <div class="demo-card-wrapper">
            <div class="demo-card demo-card--step1">
                <div class="head">
                    <div class="number-box">
                        <span>01</span>
                    </div>
                    <h2><a href="">Khair, Uttar Pradesh<span class="small">Khair, Aligarh, Uttar Pradesh, 202138, India</a></span>
                    </h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="image.jpg" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step2">
                <div class="head">
                    <div class="number-box">
                        <span>02</span>
                    </div>
                    <h2> <a href=""> Central Delhi, Delhi<span class="small">Vidhan Sabha Metro Gate No 1, Mahatma Gandhi Road, Civil Lines, Civil Lines Tehsil, Central Delhi, Delhi, 110054, India</span></a> </h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="image.jpg" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step3">
                <div class="head">
                    <div class="number-box">
                        <span>03</span>
                    </div>
                    <h2>Central Delhi, Delhi<span class="small">Vidhan Sabha Metro Gate No 1, Mahatma Gandhi Road, Civil Lines, Civil Lines Tehsil, Central Delhi, Delhi, 110054, India</span></h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="image.jpg" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step4">
                <div class="head">
                    <div class="number-box">
                        <span>04</span>
                    </div>
                    <!-- <h2><span class="small">Subtitle</span> Consistency</h2> -->
                    <h2>Central Delhi, Delhi<span class="small">Vidhan Sabha Metro Gate No 1, Mahatma Gandhi Road, Civil Lines, Civil Lines Tehsil, Central Delhi, Delhi, 110054, India</span></h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="image.jpg" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step5">
                <div class="head">
                    <div class="number-box">
                        <span>05</span>
                    </div>
                    <!-- <h2><span class="small">Subtitle</span> Conversion</h2> -->
                    <h2>Central Delhi, Delhi<span class="small">Vidhan Sabha Metro Gate No 1, Mahatma Gandhi Road, Civil Lines, Civil Lines Tehsil, Central Delhi, Delhi, 110054, India</span></h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="image.jpg" alt="Graphic">
                </div>
            </div>

        </div>
    </section>
    <div style="margin-top: 50px;">yes</div>
</body>

</html>