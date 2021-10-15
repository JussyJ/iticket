<?php
    $dir = "app/iticket/page/user/attachment/";
    move_uploaded_file($_FILES["image"]["tmp_name"], $dir. $_FILES["image"]["name"]);
?>