<?php
include '../config/db_config.php';
$id = $_GET['service_id'];
$sql = "delete from service where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: http://localhost/bu_medical/admin/view_service.php');
}