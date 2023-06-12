<?php
include_once "../db.php";

del('categories',['id'=> $_POST['category_id']]);

to("../index.php?do=category_list");