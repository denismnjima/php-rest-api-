<?php
require './db.php';
header("Content-Type:application/json");
$method = $_SERVER['REQUEST_METHOD'];

if($method =='GET'){
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM event WHERE id=$id";
    }else{
        $sql = "SELECT event.*,
                     event_extra.* 
                     FROM event
                     LEFT JOIN event_extra on event_extra.event_id = event.id";
    }

    $result = mysqli_query($conn, $sql);
    $colors = [];
    $data = null;
    // echo json_encode($events,MYSQLI_ASSOC);
    while($row = mysqli_fetch_assoc($result)){
        $data  = [
            'id'=>$row['id'],
            'colors'=>[]
        ];

        if($row['event_id']){
            $colors[]=[
                'color'=>$row['color']
            ];
        }
    }
    if($data){
        $data['colors']=$colors;
    }
    echo json_encode($data?$data:['message'=>'User nt found']);


}else{
    echo json_encode(["message"=>"Invalid request method"]);
}