<?php include_once "../db.php";

//可以選擇md5編碼來避免密碼在資料庫端是明碼
$pw = md5($_POST['pw']);
echo $pw;

if (!empty($_POST) && $_POST['acc'] != "" && $_POST['pw'] != "") {
/*     $sql = "insert into `members` (`acc`,`pw`,`nickname`,`tel`,`email`) 
                          values('{$_POST['acc']}',
                                 '{$_POST['pw']}',
                                 '{$_POST['nickname']}',
                                 '{$_POST['tel']}',
                                 '{$_POST['email']}')";
    $pdo->exec($sql); */
    insert('members', [
        'acc' => $_POST['acc'],
        'pw' => $_POST['pw'],
        'nickname' => $_POST['nickname'],
        'tel' => $_POST['tel'],
        'email' => $_POST['email']
    ]);

    to("../index.php");
} else {
    to("../index.php?do=reg&error=1");
}
