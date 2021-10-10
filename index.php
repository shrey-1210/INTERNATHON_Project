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
    <script src="jquery.js"></script>
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
    <div class="heading" style="text-transform:capitalize;">
    TRAVEL BUD         
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
        label{
            padding: 10px;
        }
        #desc{
            margin-bottom: 10px;
            /* height: 60px;
            text-align: left;
            text-overflow: ellipsis; */
        }
    </style>
    <div id="create">
        <!-- <div id="check" style="position: absolute;z-index:-50;">
        
        </div> -->
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div id="cross" onclick="closecreate()">X</div>
            <h2 style="text-align: center;padding-top: 13px;">Create Your Timeline</h2>
            <input type="text" placeholder="Enter Your Timeline Name" required id="name">
            <input type="text" placeholder="Enter Your Destination Name" required id="dest">
            <?php 
if(isset($_SESSION['username'])){
    echo '<input type="text" id="check" hidden value="1">';
    echo '<input type="text" id="uname" hidden  value="'.$_SESSION['username'].'">';
    echo '<input type="text" id="pname" hidden  value="'.$_SESSION['person'].'">';
}else{
    echo '<input type="text" id="check" hidden value="2">';
}
        ?>
            <label for="desc">Description for Timeline</label>
            <textarea id="desc" name="desc" rows="4" cols="50" required></textarea>
                <!-- <input type="text" name="desc" placeholder="Description for Timeline" id="desc"> -->
             <input type="submit" id="submit">
        </form>
    </div>
    <script>
        let cross = document.getElementById("cross");
        let create = document.getElementById("create")
        var lat ="";
        var long="";
        function showcreate() {
            create.style.display = "block";
        }

        function closecreate() {
            console.log("cross")
            create.style.display = "none";
        }
        
                document.getElementById("submit").addEventListener("click", function (event) {
                    event.preventDefault();
                    console.log("clicked");
                    let name =document.getElementById("name");
                    let submit =document.getElementById("submit");
                    let desc =document.getElementById("desc");
                    let dest =document.getElementById("dest");
                    let check =document.getElementById("check");
                    let uname =document.getElementById("uname");
                    let pname =document.getElementById("pname");
                    if(name.value=="" || desc.value==""){
                        alert("No Field Should be Empty");
                    }else{
                        if(check.value==1){
                            create.style.display = "none";
                            getLocation();
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
                                console.log(lat,long);
                                console.log("yes",uname.value,pname.value,dest.value);
                                let obj = { uname: uname.value, pname: pname.value,dest:dest.value,desc:desc.value,tname:name.value };
                                let myjson = JSON.stringify(obj);
                                $.ajax({
                                    url: "http://localhost/INTERNATHON_Project/first-creat.php",
                                    type: "POST",
                                    data: myjson,
                                    success: function (data) {
                                        if (data.status == true) {
                                            // alert("created")
                                            console.log(data);
                                        } else {
                                            alert("Try Again Getting Some Error");
                                        }
                                    }
                                });
                            }
                            
                        }else{
                            alert("please Login");
                        }
            }
});
    </script>
</body>

</html>