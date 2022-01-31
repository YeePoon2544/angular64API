<?php
require('header.php');
// กรณีเพิ่มข้อมูล ใช้ค่า max(userid) กรณีแก้ไข ให้ userid ที่ส่งมา
if($_POST["userid"]==""){ // เพิ่ม
$sql=$con->query("SELECT MAX(userid) AS userid FROM tbuser");
$result=$sql->fetch_array();
$userid=$result["userid"];
}else{ // แก้ไข
    $userid = $_POST["userid"];

}


//upload
if ($_FILES["pictur"]){
    $name=$_FILES["picture"]["name"];
    $tmp_name=$_FILES["picture"]["tmp_name"];
    //เปลี่ยนชื่อไฟล์
    $f=explode(".",$name); // f[0]=ชื่อ f[1]=นามสกุลไฟล์
    $newname=$userid.".".$f[1];
    if (move_uploaded_file($tmp_name,"images/$newname")){
        exit(json_encode(["status"=>"upload success"]));
    }else{
        exit(json_encode(["status"=>"upload error"]));
    }
} 

?>