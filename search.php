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
    <style>
        html {
            background: none;
        }
    </style>

    <div class="Search">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="text" placeholder="Search Timeline" name="" id="search">
        </form>
    </div>
    <div class="result">
        
    </div>
    <div class="back-img">
        <img src="hack_image.jpg" alt="">
    </div>
    <script>
        let title_limit = (e) => {
                    if (e.length > 50) {
                        return e.substring(0, 50).concat("...");
                    } else {
                        return e;
                    }
                }
        $('#search').on('keyup', function () {
        var text = $(this).val();
        var search_obj = {
            search: text
        }
        // 
        console.log("yes")
        var search_json = JSON.stringify(search_obj);
        $(".result").html("");
        $.ajax({
            url: "http://localhost/INTERNATHON_Project/search-api.php",
            type: "POST",
            data: search_json,
            success: function (data) {
                console.log("yes")
                // $("#nav-bar #search #search-table").html("");
                if (data.status == false) {
                    console.log(data);
                    alert(data.message)
                    // $("#nav-bar #search #search-table").append("<tr><td><h2>" + data.message + "</h2></td></tr>");
                } else {
                    console.log(data);
                    $.each(data, function (key, value) {
                        let imaged="";
                        if(value.image===null){
                            imaged="media/image.jpg";
                        }else{
                            let images = value.image.split("`");
                             imaged=images[0];
                        }
                        $(".result").append("<div class='card'><img class='card-img-top' src='"+imaged+"' alt='Card image cap'><div class='card-body'><p class='card-title'>"+title_limit(value.tname)+"</p><p>Destination: <span> "+title_limit(value.destination)+"</span></p><p class='card-text'>"+title_limit(value.tname)+"</p><h4>Created By: <span> "+title_limit(value.pname)+"</span></h4><a href='timeline.php?tid="+value.timeline_id+"' class='btn'>View Timeline</a></div></div>"

                        );
                        // "<tr><td><a   href='one-post.php?post=" + value.post_id +
                            // "'>" + title_limit(value.title) +
                            // "</a></td></tr>"
                    });
                }
                // alert(data.message)
            }
        });

    });
    </script>
</body>

</html>