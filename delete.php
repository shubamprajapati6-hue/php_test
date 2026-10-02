<?php
include "db.php";

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql=$conn->prepare('delete from user_data where id=?');
    $sql->bind_param('i',$id);
    if ($sql->execute()) {
        header("location:homepage.php");
    }
}
?>