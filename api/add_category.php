<?php 
include_once "../db.php";

insert('categories',[
    'category'=>$_POST['category'],
    'description'=>$_POST['description']
]);

to("../index.php?do=category_list");