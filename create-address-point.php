<?php
include 'configure.php';
session_start();
if(isset($_SESSION['username'])){

}else{
    header("Location: {$hostname}/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="timeline.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="hack_style.css?v=<?php echo time(); ?>">
    <script src="jquery.js"></script>
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
        #timeline .demo-card:nth-child(even) {
        /* margin-left: 45px; */
        /* right: -50%; */
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
        <!-- <button onclick="getLocation()">click</button> -->
        <p class="leader">List of journeys.</p>
        <div class="demo-card-wrapper">
            <!-- <div class="demo-card demo-card--step1">
                <div class="head">
                    <div class="number-box">
                        <span>01</span>
                    </div>
                    <h2><a href="">Khair, Uttar Pradesh<span class="small">Khair, Aligarh, Uttar Pradesh, 202138, India</a></span>
                    </h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="media/image.jpg" alt="Graphic">
                </div>
            </div> -->

            

        </div>
    </section>
    <form>
    <?php 
if(isset($_SESSION['username'])){
    echo '<input type="text" id="check" hidden value="1">';
    echo '<input type="text" id="uname" hidden  value="'.$_SESSION['username'].'">';
    echo '<input type="text" id="pname" hidden  value="'.$_SESSION['person'].'">';
    echo '<input type="text" id="tid" hidden  value="'.$_GET['tid'].'">';
}else{
    echo '<input type="text" id="check" hidden value="2">';
}
        ?>
    </form>
    <div style="margin-top: 50px;">yes</div>
    <script>
        let oldlat="";
        let oldlong="";
        let counter=1;
        let tid =document.getElementById("tid");
        let check =document.getElementById("check");
        let uname =document.getElementById("uname");
        let pname =document.getElementById("pname");
        function distance(lat1,lat2, lon1, lon2){    // The math module contains a function
            // named toRadians which converts from
            // degrees to radians.
            lon1 =  lon1 * Math.PI / 180;        
            lon2 = lon2 * Math.PI / 180;        
            lat1 = lat1 * Math.PI / 180;        
            lat2 = lat2 * Math.PI / 180;         // Haversine formula
                    
            let dlon = lon2 - lon1;        
            let dlat = lat2 - lat1;        
            let a = Math.pow(Math.sin(dlat / 2), 2)                  + Math.cos(lat1) * Math.cos(lat2)                  * Math.pow(Math.sin(dlon / 2), 2);        
            let c = 2 * Math.asin(Math.sqrt(a));         // Radius of earth in kilometers. Use 3956 for miles
                    
            let r = 6371;         // calculate the result
            console.log(c * r);
            if ((c * r) > 10) {
                return 1;
            } else {
                return 0;
            }
        }
        function getLocation() {
                                // alert()
                                if (navigator.geolocation) {
                                    // x.innerHTML = "Supporting"
                                    navigator.geolocation.getCurrentPosition(showPosition);
                                    return 1;
                                } else {
                                    alert("Not supporting Geolocation update your browser");
                                }
                                
                            }
        function showPosition(position) {
            lat= position.coords.latitude;
            long= position.coords.longitude;
            if(counter==1){
                d=1;
            }else{
                // calculate d
                d=0;
                if(distance(lat, oldlat, long, oldlong)){
                    d=1;
                }else{
                    d=0;
                }
            }
            if(d==1){
                var addr_id=tid.value+"_"+counter;
                var locAPI = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" + lat + "&lon=" + long + "&zoom=18&addressdetails=1";
                $.get({
                    url: locAPI,
                    success(data) {
                        console.log(data);
                        console.log(lat,long,counter,tid.value,data.display_name,data.address.postcode,addr_id);
                        oldlat=lat;
                        oldlong=long;
                        let tidval=tid.value;
                        let addrval=data.display_name;
                        let postval=data.address.postcode;
                        let district = data.address.county; 
                        let state = data.address.state; 
                        let obj = { lat: lat, long: long,counter:counter,tid:tid.value,addr:data.display_name,post:data.address.postcode,addr_id:addr_id,district:district,state:state };
                                let myjson = JSON.stringify(obj);
                                $.ajax({
                                    url: "http://localhost/INTERNATHON_Project/create-addr-point.php",
                                    type: "POST",
                                    data: myjson,
                                    success: function (data) {
                                        if (data.status == true) {
                                            // alert("created")
                                            var toappend = $('.demo-card-wrapper');
                                            toappend.append('<div class="demo-card demo-card--step'+counter+'"><div class="head"><div class="number-box"><span>'+counter+'</span></div><h2><a href="addr_point.php?tid='+tidval+'&adrr_id='+addr_id+'&counter='+counter+'">'+district+', '+state+'<span class="small">'+addrval+'</a></span></h2></div><div class="body"><p></p><img src="media/image.jpg" alt="Graphic"></div></div>');
                                            console.log(data);
                                            counter=counter+1;
                                        } else {
                                            alert("Try Again Getting Some Error");
                                        }
                                    }
                                });
                    }
                });
            }

        }
        // setTimeout(getLocation(), 300000);
        getLocation();
        setInterval(function(){
            getLocation()
        }, 300000);
        // setInterval(function(){
        //     getLocation()
        // }, 1000);
    </script>
</body>

</html>