<?php
    include_once "../basetest.php";

    $db=new DB ($_POST['table']);
        $db->del($_POST['id']);


?>