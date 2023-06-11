<?php
include_once "../db.php";

$pdo->exec("delete from `topicsv` where `id`='{$_POST['subject_id']}'");
$pdo->exec("delete from `optionsv` where `subject_id`='{$_POST['subject_id']}'");

to("../index.php?do=vote_list");