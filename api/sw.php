<?php
    include_once "../basetest.php";

    $table=$_POST['table'];
    $db=new DB($table);
    $idx=$_POST['idx'];
    $idy=$_POST['idy'];

    $idx=$db->find($_POST['idx']);
    $idy=$db->find($_POST['idy']);
    $tmp=$idx['rank'];
    $idx['rank']=$idy['rank'];
    $idy['rank']=$tmp;
    $db->save($idx);
    $db->save($idy);

?>