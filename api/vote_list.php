<?php
include_once "../db.php";
$log_chk=$pdo
        ->query("select `topic_id` from `logs` where `mem_id`='{$_SESSION['login']}'")
        ->fetchColumn();

echo $log_chk;


$log_chk=$pdo
        ->query("select `topic_id` from `logs` where `mem_id`='{$_SESSION['login']}'")
        ->fetchColumn();
if(isset($log_chk)){
        echo "您已投過此主題";
        echo "<a href='../index.php'>返回投票頁面</a>";

}else{