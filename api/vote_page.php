<?php

include_once "../db.php";

$opt=$_POST['desc'];
/* 1.單選 $_POST['desc']=3;
   2.多選 $_POST['desc']=[1,3,6]; */

$subject_id = $_POST['subject_id'];
$subject_type=$pdo->query("select `type` from `topicsv` where `id`='$subject_id'")->fetchColumn();


switch($subject_type){
    case 0:
        $pdo->exec("update `optionsv` set `total`=`total`+1 where `id`='$opt'");
    break;
    case 1:
        foreach($opt as $opt_id){
            $pdo->exec("update `optionsv` set `total`=`total`+1 where `id`='$opt_id'");
        }
    break;
}

if(isset($_SESSION['login'])){
    $mem_id=$pdo->query("select `id` from `members` where `acc`='{$_SESSION['login']}'")->fetchColumn();
}else{
    $mem_id=0;
}
$topic_id=$_POST['subject_id'];
$vote_time=date("Y-m-d H:i:s");

$records=serialize([$_POST['subject_id']=>$opt]);

insert('logs',[
    'mem_id'=>$mem_id,
    'topic_id'=>$topic_id,
    'vote_time'=>$vote_time,
    'records'=>$records
]);


to("../index.php?do=vote_result&id=$subject_id");