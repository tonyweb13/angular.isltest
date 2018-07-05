<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/lib/client.php";

if(isset($_SESSION['accessToken'])){
    $result = RestCurl::get("Finance.svc/token/{$_SESSION['accessToken']}/balance");

    if($result["status"] == 200){
        $message="success";
        echo json_encode(array("status"=>$result["status"],"message"=>$message,"result"=>$result["data"],'alert'=>false));
    }else{
        $message=$result["data"]->errorMessage;
        echo json_encode(array("status"=>$data["status"],"message"=>$message,"alert"=>true));
    }
}else{
    $message="Plese Login";
    echo json_encode(array("status"=>$data["status"],"message"=>$message,"alert"=>true));
}
