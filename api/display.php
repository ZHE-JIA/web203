<?php
    include_once "../basetest.php";

    $db=new DB ($_POST['table']);
    $row=$db->find($_POST['id']);

    // $row['sh']=($row['sh']+1)%2;
    $row['sh']=!$row['sh']; //切換0 1
    $db->save($row);

?>