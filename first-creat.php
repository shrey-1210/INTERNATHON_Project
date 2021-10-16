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
    $sql1="SELECT id FROM timeline where uname='{$uname}' AND destination ='{$dest}' AND tname = '{$tname}' AND descp='{$desc}';";
    $result=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo json_encode(array('status'=>true,'tid'=>$row['id']));
    }else{
    echo json_encode(array('status'=>false));
    }
}else{
    echo json_encode(array('status'=>false));
}
    // echo json_encode(array('status'=>true,'message'=>$sql));











?>