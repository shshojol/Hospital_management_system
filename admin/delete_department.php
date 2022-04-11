<?php
include '../config/db_config.php';
$id = $_GET['dept_id'];
$sql = "delete from department where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: http://localhost/bu_medical/admin/view_department.php');
}

