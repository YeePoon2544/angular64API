<?php
require('header.php');
// เขียนคำสั่ง php เพื่อเพิ่ม แก้ไข ลบ แสดง ข้อมูล
// เชื่อมต่อ MySQL 
// เขียนคำสั่งเพื่อดึงข้อมูล
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sql = $con->query("SELECT * FROM tbstatus");
    if ($sql) {
        while ($data = $sql->fetch_assoc()) {
            $datas[] = $data;
        }
        exit(json_encode($datas));
    } else {
        exit(json_encode(['status' => 'error']));
    }
}