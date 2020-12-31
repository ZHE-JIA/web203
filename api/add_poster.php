<?php
    include_once "../basetest.php";

    if(!empty($_FILES['poster']['name'])){
        $data=[];
        $filename=$_FILES['poster']['name'];  //此地方打成tmp_name 會導致路徑名稱錯誤 c:xampp....
        move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$filename);
        $data['img']=$filename;
        $data['name']=$_POST['name'];
        $data['sh']=1;
        $data['rank']=$Poster->q("select max(rank) from poster")[0][0]+1;
        $data['ani']=1;
        $Poster->save($data);
    }

    to("../backend.php?do=poster");
?>
  