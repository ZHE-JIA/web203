<?php
    include_once "../basetest.php";

    $movie=$Movie->find($_POST['id']);

    if(!empty($_FILES['trailer']['tmp_name'])){
        $_POST['trailer']=$_FILES['trailer']['name'];
        move_uploaded_file($_FILES['trailer']['tmp_name'],'../img/'.$_POST['trailer']);
    }
    if(!empty($_FILES['poster']['tmp_name'])){
        $_POST['poster']=$_FILES['poster']['name'];
        move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$_POST['poster']);
    }
    $_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    
    foreach($movie as $key =>$value){  
        if(isset($_POST[$key])){    
            if($value!=$_POST[$key]){   //有不一樣的資料才做更新
                $movie[$key]=$_POST[$key];
            }
        }
    }

    $Movie->save($movie);

    to("../backend.php?do=movie");

?>