<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"),true);
$uname=$data['uname'];
$pname=$data['pname'];
$tname=$data['tname'];
$dest=$data['dest'];
$desc=$data['desc'];
include 'configure.php';
$sql = "INSERT into timeline(pname,tname,counter,destination,descp,uname) VALUES ('{$pname}','{$tname}',1,'{$dest}','{$desc}','{$uname}');";
if(mysqli_query($conn,$sql)){
    echo json_encode(array('status'=>true));
}else{
    echo json_encode(array('status'=>false));
}
    // echo json_encode(array('status'=>true,'message'=>$sql));











?>