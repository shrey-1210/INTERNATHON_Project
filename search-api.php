<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"),true);
$search_value = $data['search'];         

//       
$search_value = trim($search_value); //for removing spaces from left amd right this is not in api topic
include "configure.php";
$sql="SELECT * from timeline LEFT JOIN addr_point ON timeline.id=addr_point.timeline_id LEFT JOIN media ON addr_point.addr_id=media.addr_id WHERE timeline.tname like '%{$search_value}%' or timeline.pname like '%{$search_value}%' or timeline.destination like '%{$search_value}%' or timeline.descp like '%{$search_value}%' or addr_point.address like '%{$search_value}%' or addr_point.postcode  like '%{$search_value}%';";

$result = mysqli_query($conn,$sql)or die("Query failed");
if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $json_data = json_encode($output);
    echo $json_data;

}else{
    echo json_encode(array('message'=>'No Record Found','status'=>false));
}
// echo json_encode(array('message'=>$sql,'status'=>false));


?>
