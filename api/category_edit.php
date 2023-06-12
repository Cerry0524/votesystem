<?php
include_once "../db.php";

update('categories',[
    'id'=>$_POST['category_id'],
    'category'=>$_POST['category'],
    'description'=>$_POST['description']
]);

to("../index.php?do=category_list");