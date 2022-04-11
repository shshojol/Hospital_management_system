<?php
include '../config/db_config.php';
$id = $_GET['gallery_id'];
$sql = "delete from gallery where id = '{$id}' ";
if(mysqli_query($conn, $sql))
{
    header('Location: http://localhost/bu_medical/admin/view_gallery.php');
}