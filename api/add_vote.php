<?php
include_once "../db.php";

$chk=_count('topicsv',['subject'=>$_POST['topic']]);

if($chk>0){
    echo "此主題已被使用過,請修改主題內容";
    echo "<a href='../back/add_vote.php'>返回新增主題</a>";
}else{
    $img_name='';
    $img_id='';

    if ($_FILES['img']['error'] == 0) {

        $img_name = $_FILES["img"]["name"];

        move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $img_name);

        insert('images',[
            'img'=>$img_name,
            'type'=>$_FILES['img']['type'],
            'size'=>$_FILES['img']['size']
        ]);

        echo "圖片上傳成功";
    }


    insert('topicsv', [
        'subject'=>$_POST['topic'],
        'open_time'=>$_POST['open_time'],
        'close_time'=>$_POST['close_time'],
        'type'=>$_POST['type'],
        'private'=>$_POST['private']
        ]);

    $subject_id=find('topicsv',[
        'subject'=>$_POST['topic']
        ]);

    dd($subject_id);
    
    foreach($_POST['description'] as $key => $value){
        if($value!=''){
            insert('optionsv',[
                'description'=>$value,
                'subject_id'=>$subject_id['id']
            ]);
        }
    }

    $img_id=find('images',[
        'img'=>$img_name
        ]);

    dd($img_id);

    $log=insert('logs',[
        'mem_id'=>"",
        'img_id'=>$img_id['id'],
        'topic_id'=>$subject_id['id']
    ]);

    dd($log);

}