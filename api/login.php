<?php include_once "../db.php";

// $sql="select count(*) from `members` where `acc`='{$_POST['acc']}' && `pw`='{$_POST['pw']}'";
// $chk=$pdo->query($sql)->fetchColumn();
$chk=_count('members',[
    'acc' => $_POST['acc'],
    'pw' => $_POST['pw']
]);

if($chk){
    $_SESSION['login']=$_POST['acc'];

    if(isset($_SESSION['postion'])){
        to($_SESSION['position']);
        unset($_SESSION['postion']);
        exit();
    };

    to("../index.php");
}else{
    to("../index.php?do=login&&error=1");
    
}

