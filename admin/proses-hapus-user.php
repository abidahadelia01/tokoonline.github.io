<?php

include '../db.php';

if(isset($_GET['id'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_user WHERE user_id = '".$_GET['id']."'");
    echo '<script>window.location="data_user.php"</script';
}
?>