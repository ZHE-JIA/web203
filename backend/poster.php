<div class="rb tab" style="width:98%;box-sizing:border-box">
    <h3 class="ct" style="margin:0px;line-height:30px">預告片清單</h3>
    <div class ="ct" style="width:100%;display:flex">
        <div style="width:25%;margin:0 1px;background:#999">預告片海報</div>
        <div style="width:25%;margin:0 1px;background:#999">預告片片名</div>
        <div style="width:25%;margin:0 1px;background:#999">預告片排序</div>
        <div style="width:25%;margin:0 1px;background:#999">操作</div>
    </div>
    <form action="api/edit_poster.php" method="post">
    <div style="width:100%;height:200px;overflow:auto">
        <?php
        $posters=$Poster->all(" order by rank ");
        foreach($posters as $key => $poster ){

        ?>
        <div class ="ct" style="width:100%;display:flex;align-items:center;margin:1px 0;background:white">
            <div style="width:25%;margin:0 1px">
                <img src="img/<?=$poster['img']?>" style="width:80px">
            </div>
            <div style="width:25%;margin:0 1px;">
                <input type="text" name="name[]" value="<?=$poster['name']?>">
            </div>
            <div style="width:25%;margin:0 1px;">
            <?php
                if($key !=0){
            ?>
                    <input type="button" value="往上" onclick="sw(<?=$poster['id'];?>,<?=$posters[$key-1]['id'];?>)">
            <?php
                }
                if($key !=count($posters)-1){
            ?>
                    <input type="button" value="往下" onclick="sw(<?=$poster['id'];?>,<?=$posters[$key+1]['id'];?>)">
            <?php
                }
            ?>

            
            </div>
            <div style="width:25%;margin:0 1px;color:black">
                <input type="checkbox" name="sh[]" value="<?=$poster['id']?>" <?=($poster['sh']==1)?'checked':'';?>>顯示
                <input type="checkbox" name="del[]" value="<?=$poster['id']?>">刪除
                <select name="ani[]" >
                    <option value="1" <?=($poster['ani']==1)?"selected":'';?> >淡入淡出</option>
                    <option value="2" <?=($poster['ani']==2)?"selected":'';?> >滑入滑出</option>
                    <option value="3" <?=($poster['ani']==3)?"selected":'';?> >縮放</option>

                </select>
                <input type="hidden" name="id[]" value="<?=$poster['id']?>">
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
    </form>
    <hr>
    <form class="rb" action="api/add_poster.php" method="post" enctype="multipart/form-data">
    
    <h3 class="ct">新增預告片海報</h3>
    <table style="width:100%" class="rb">
        <tr>
            <td style="width:25%">預告片海報</td>
            <td style="width:25%"><input type="file" name="poster"></td>
            <td style="width:25%">預告片片名</td>
            <td style="width:25%"><input type="text" name="name"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
</div>

<script>
    //使用於往上往下按鈕
    function sw(idx,idy){
        $.post('api/sw.php',{table:'poster',idx,idy},function(){  //{table:'poster',idx,idy}此為js陣列 idx,y因用function輸入值  否則正常為idx:1 等等
            location.reload();
        })
    }

</script>
