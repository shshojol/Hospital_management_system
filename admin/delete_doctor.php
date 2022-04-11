<?php
include '../config/db_config.php';
$id = $_GET['doctor_id'];
$sql = "delete from doctor where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: view_doctor.php');
}