<?php include_once "../db.php";

//可以選擇md5編碼來避免密碼在資料庫端是明碼
$pw=md5($_POST['pw']);
echo $pw;

if(!empty($_POST) && $_POST['acc']!="" && $_POST['pw']!=""){
    $sql="insert into `members` (`acc`,`pw`,`nickname`,`tel`,`email`) 
                          values('{$_POST['acc']}',
                                 '{$_POST['pw']}',
                                 '{$_POST['nickname']}',
                                 '{$_POST['tel']}',
                                 '{$_POST['email']}')";
$pdo->exec($sql);
    header("location:../index.php");
}else{
    header("location:../index.php?do=reg&error=1");
}