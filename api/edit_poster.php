<?php
    include_once "../basetest.php";
    print_r($_POST);   //如果value打錯 會導致陣列的value變成on
    foreach($_POST['id'] as $key =>$id){
        
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Poster->del($id);
            
            
        }else{
            
            $poster=$Poster->find($id);
            $poster['name']=$_POST['name'][$key];
            $poster['ani']=$_POST['ani'][$key];
            $poster['sh']=in_array($id,$_POST['sh'])?1:0;
            $Poster->save($poster);
            
            print_r($poster);
        }
        
    }
    to("../backend.php?do=poster");
    
    
?>

