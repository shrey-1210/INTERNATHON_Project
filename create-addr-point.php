<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"),true);
$lat=$data['lat'];
$long=$data['long'];
$addr=$data['addr'];
$counter=$data['counter'];
$tid=$data['tid'];
$post=$data['post'];
$addr_id=$data['addr_id'];
$district=$data['district'];
$state=$data['state'];
include 'configure.php';
$sql = "INSERT into addr_point VALUES ('{$addr_id}','{$lat}','{$long}','{$addr}','{$post}','{$counter}','{$tid}','not available','{$district}','{$state}');";
// if(mysqli_query($conn,$sql)){
//     echo json_encode(array('status'=>true));
// }else{
//     echo json_encode(array('status'=>false));
// }
    echo json_encode(array('status'=>true,'message'=>$sql));











?>