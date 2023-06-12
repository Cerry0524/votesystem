<?php
include_once "../db.php";

del('topicsv',['id'=>$_POST['subject_id']]);
del('optionsv',['subject_id'=>$_POST['subject_id']]);

to("../index.php?do=vote_list");