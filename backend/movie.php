<div class="rb tab" style="width:98%;box-sizing:border-box">
    <button onclick="javascript:location.href='backend.php?do=add_movie'">新增電影</button> <!--此為js href寫法-->
    <hr>
    <?php
        $movies=$Movie->all(" order by rank ");
        foreach($movies as $key => $movie){
    ?>
    <div style="max-height:450px;overflow-y:auto">
    <div style="background:white;color:black;display:flex;">
        <div style="width:20%"><img src="img/<?=$movie['poster']?>" style="width:80px"></div>
        <div style="width:20%">分級: <img src="icon/<?=$movie['level']?>.png" style="width:25px;vertical-align:middle"></div>
        <div style="width:60%">
            <div style="display:flex">
                <div style="width:33%">片名: <?=$movie['name']?></div>
                <div style="width:33%">片長: <?=$movie['length']?></div>
                <div style="width:33%">上映時間: <?=$movie['year'].'/'.$movie['month'].'/'.$movie['day']?></div>
            </div>
            <div style="text-align:right;margin-right:1px">
            <button onclick="display('movie',<?=$movie['id'];?>)"><?=($movie['sh']==1)?'顯示':'隱藏';?></button>
                <?php
                if($key !=0){
            ?>
                    <button onclick="sw(<?=$movie['id'];?>,<?=$movies[$key-1]['id'];?>)">往上</button>
            <?php
                }
                if($key !=count($movies)-1){
            ?>
                    <button onclick="sw(<?=$movie['id'];?>,<?=$movies[$key+1]['id'];?>)">往下</button>
            <?php
                }
            ?>
                <button onclick="javascript:location.href='backend.php?do=edit_movie&id=<?=$movie['id']?>'">編輯電影</button>
                <button onclick="del('movie',<?=$movie['id'];?>)">刪除電影</button>
                
            </div>
            <div style="display:flex">
                <div>劇情介紹:<?=$movie['name']?></div> &nbsp&nbsp
                <div>劇情簡介: <?=$movie['intro']?></div>
            </div>

        </div>
    </div>

    </div>
    <?php
    }
    ?>
</div>

<script>
    //使用於往上往下按鈕
    function sw(idx,idy){
        $.post('api/sw.php',{table:'movie',idx,idy},function(){  //從poster複製過來
            location.reload();
        })
    }

    function del(table,id){
        $.post('api/del.php',{table,id},function(){
            location.reload();
        })
    }

    function display(table,id){
        $.post('api/display.php',{table,id},function(){
            location.reload();
        })
    }
</script>
