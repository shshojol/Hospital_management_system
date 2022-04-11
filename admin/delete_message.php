<?php
include '../config/db_config.php';
$id = $_GET['message_id'];
$sql = "delete from message where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: http://localhost/bu_medical/admin/view_message.php');
}