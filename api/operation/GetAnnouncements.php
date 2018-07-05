<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/lib/client.php";

$p = array(
    "announceTypeCd" => 1,
    "incluedParent" => true,
    "isPopup" => true,
    //TODO::cmtech에서 수정후 $_SESSION이용으로 변경합시다.
    "languageNo" => $_SESSION["browserLanguageCd"]
);

$result = RestCurl::post("Operation.svc/announcements",$p);

if($result["status"] == 200){
    $message="success";
    echo json_encode(array("status"=>$result["status"],"message"=>$message,"result"=>$result["data"],'alert'=>false));
}else{
    $message=$result["data"]->errorMessage;
    echo json_encode(array("status"=>$data["status"],"message"=>$message,"alert"=>true));
}
