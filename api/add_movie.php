<?php
    include_once "../basetest.php";
    if(!empty($_FILES['trailer']['tmp_name'])){
        $_POST['trailer']=$_FILES['trailer']['name'];
        move_uploaded_file($_FILES['trailer']['tmp_name'],'../img/'.$_POST['trailer']);
    }
    if(!empty($_FILES['poster']['tmp_name'])){
        $_POST['poster']=$_FILES['poster']['name'];
        move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$_POST['poster']);
    }
    $_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $_POST['sh']=1;
    $_POST['rank']=$Movie->q("select max(rank) from movie")[0][0]+1;

    $Movie->save($_POST);

    to("../backend.php?do=movie");

?>