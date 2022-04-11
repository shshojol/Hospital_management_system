<?php
include '../config/db_config.php';
$id = $_GET['job_id'];
$sql = "delete from job_post where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: view_job.php');
}