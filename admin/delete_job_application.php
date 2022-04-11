<?php
include '../config/db_config.php';
$id = $_GET['job_id'];
$sql = "delete from application where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: view_job_application.php');
}