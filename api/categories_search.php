<?php include_once "./db.php"; 

$category_id = $_GET['category_id']??"";

$sql_categories= "select * from `categories`";
$categories=$pdo->query($sql_categories)->fetchAll(PDO::FETCH_ASSOC);

$sql_categories_select = "SELECT `summary`.`effective_time` as '日期',
                             `summary`.`class` as '屬性',
                             `summary`.`project` as '項目',
                             `summary`.`details` as '細節',
                             `categories`.`category` as '類別',
                             `summary`.`amount` as '數量',
                             `summary`.`price` as '金額',
                             `summary`.`private` as '公開/私人',
                             `summary`.`continuous` as '持續性',
                             `summary`.`created_time` as '登載時間'
                      FROM `summary`, `categories`
                      WHERE `summary`.`category_id` = `categories`.`id` ".
                      (($category_id=="")?"":"AND `summary`.`category_id` = '$category_id'");


$categories_select=$pdo->query($sql_categories_select)->fetchAll(PDO::FETCH_ASSOC);